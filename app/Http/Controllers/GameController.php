<?php

namespace Nst\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Sunra\PhpSimple\HtmlDomParser;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class GameController extends Controller
{
    const TITLE = 0;
    const JP_RELEASE_DATE = 5;
    const NA_RELEASE_DATE = 6;
    const PAL_RELEASE_DATE = 7;

    protected function convertQDate($q_date)
    {
        return $q_date;

        $date = explode(' ',$q_date);

        if(count($date) === 2) {
            switch($date[0]) {
                case 'Q1':
                    $date = new \DateTime($date[1].'-01-01');
                    break;
                case 'Q1/Q2':
                    $date = new \DateTime($date[1].'-01-01');
                    break;
                case 'Q2':
                    $date = new \DateTime($date[1].'-04-01');
                    break;
                case 'Q3':
                    $date = new \DateTime($date[1].'-07-01');
                    break;
                case 'Q4':
                    $date = new \DateTime($date[1].'-10-01');
                    break;
                default:
                    throw new InvalidParameterException('Parametro non corretto! '.$date[0]);
            }

            return $date->format('Y-m-d');

        } else {
            return $date[0];
        }
    }

    protected function convertTextDate($text_date)
    {
        $date = new \DateTime(strip_tags($text_date));
        return $date->format('Y-m-d');
    }

    protected function getGameTitle($row)
    {
        $title = $row->childNodes(self::TITLE)
            ->childNodes(0);

        if(!is_object($title)) {
            return $row->childNodes(self::TITLE)->plaintext;
        }

        return html_entity_decode($title);
    }

    protected function getReleaseDate($row, $place)
    {
        $span = $row->childNodes($place)
            ->find('span');

        //complete date ex. 13 march 2017
        if(count($span) === 2) {
            $date = $row->childNodes($place)
                ->childNodes(1);

            return $this->convertTextDate($date);
        }

        //Q date
        if(count($span) === 1) {
            $date = $row->childNodes($place)
                ->find('text', 1);

            return $this->convertQDate($date);
        }

        //TBA date
        if(!count($span)) {
            return $row->childNodes($place);
        }

        throw new \Exception('Some problem occurred while parsing the rows! Element not recognized');
    }

    public function getCountries()
    {
        return array(
            'jp',
            'na',
            'pal'
        );
    }

    /**
     * Crawls the games page
     *
     * @param Request $request
     * @return array
     */
    public function crawlGames(Request $request)
    {
        $html = file_get_contents('https://en.wikipedia.org/wiki/List_of_Nintendo_Switch_games');

        $dom = HtmlDomParser::str_get_html($html);

        $games_table_body = $dom->getElementById("softwarelist tbody");

        $countries = array();

        //table rows
        $rows = $games_table_body->childNodes();
        foreach($rows as $row_index => $tr) {

            //skip header
            if($row_index > 1) {

                $title = $this->getGameTitle($tr);

                //jp
                $jp_release_date = $this->getReleaseDate($tr, self::JP_RELEASE_DATE);
                $countries['jp'][] = array(
                    'title' => strip_tags($title),
                    'date' => strip_tags($jp_release_date)
                );

                //na
                $na_release_date = $this->getReleaseDate($tr, self::NA_RELEASE_DATE);
                $countries['na'][] = array(
                    'title' => strip_tags($title),
                    'date' => strip_tags($na_release_date)
                );

                //pal release
                $pal_release_date = $this->getReleaseDate($tr, self::PAL_RELEASE_DATE);
                $countries['pal'][] = array(
                    'title' => strip_tags($title),
                    'date' => strip_tags($pal_release_date)
                );
            }
        }
        usort($countries['jp'], array('self','cmp'));
        usort($countries['na'], array('self','cmp'));
        usort($countries['pal'], array('self','cmp'));

        $tba_games = array();
        $q_games = array();
        $complete_date_games = array();
        $single_date_games = array();
        $result = array();

        //per ogni country scorro tutti i games e definisco l'array di games creando un oggetto
        foreach($countries as $country_code => $country_games) {
            foreach($country_games as $game) {

                if(count(explode('-', $game['date'])) > 1) {
                    $date = new \DateTime($game['date']);

                    $complete_date_games[$country_code][$date->format('F Y')]['name'] = $date->format('F Y');
                    $complete_date_games[$country_code][$date->format('F Y')]['games'][] = array(
                        'title' => $game['title'],
                        'date' => $game['date']
                    );
                }

                if(strlen($game['date']) === 4 && count(explode('-', $game['date'])) === 1) {
                    $single_date_games[$country_code][$game['date']]['name'] = $game['date'];
                    $single_date_games[$country_code][$game['date']]['games'][] = array(
                        'title' => $game['title'],
                        'date' => $game['date']
                    );
                }

                if($game['date'] === 'TBA') {
                    $tba_games[$country_code]['tba']['name'] = 'tba';
                    $tba_games[$country_code]['tba']['games'][] = array(
                        'title' => $game['title'],
                        'date' => $game['date']
                    );
                }

                if(strpos($game['date'], 'Q') === 0) {
                    $q_games[$country_code][$game['date']]['name'] = $game['date'];
                    $q_games[$country_code][$game['date']]['games'][] = array(
                        'title' => $game['title'],
                        'date' => $game['date']
                    );
                }
            }
        }

        $countries = $this->getCountries();

        foreach ($countries as $country) {
            foreach($complete_date_games[$country] as $game) {
                $result[$country][] = $game;
            }
            foreach($single_date_games[$country] as $game) {
                $result[$country][] = $game;
            }
            foreach($tba_games[$country] as $game) {
                $result[$country][] = $game;
            }
            foreach($q_games[$country] as $game) {
                $result[$country][] = $game;
            }
        }

        //return $result;

        return view('index', ['games' => json_encode($result) ]);
    }

    public static function cmp($a, $b)
    {
        if ($a['date'] === $b['date']) {
            return 0;
        }
        return ($a['date'] < $b['date']) ? -1 : 1;
    }
}
