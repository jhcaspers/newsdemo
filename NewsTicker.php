<?php
/**
 * Created by PhpStorm.
 * User: jh
 * Date: 15.07.2018
 * Time: 12:30
 */

namespace JhNewsTicker;


class NewsTicker
{

    /**
     * NewsTicker constructor.
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function run()
    {
        if (isset($_POST['getnews'])) $this->_doAjaxGetNews();
    }

    /**
     * @return string
     */
    public function getCurrentNews()
    {
        /** @var string $news This is the news text (as it's an demo I skip the database and use fixed text)*/
        $news = "<div>
        <b>Erster Eintrag</b><br />
        Dieser Eintrag wird mit der index.php beim Laden der Seite aufgerufen.
        </div>";
        return $news;
    }

    /**
     * @return false|string
     */
    public function getLastDate()
    {
        /** @var string $lastdate  This is the last Date (as it's an demo we use now)*/
        $lastdate = date("d.m.Y H:i");
        return $lastdate;
    }

    /**
     *  Function to safely end the execution
     */
    public function stop()
    {
        exit();
    }

    /**
     *  Handles the Ajax request
     */
    private function _doAjaxGetNews() {
        $lastId = (int)$_POST['getnews'];
        $answer = array(
            'lastdate'=>date("d.m.Y H:i"),
            'time'=>date('H:i'),
            'newnews'=>0,
            'newstext'=>'',
            'lastid'=>++$lastId
        );
        $this->_getNews($lastId,$answer);
        /* send Header so browser knows it's json*/
        header('Content-Type: application/json');
        /* send data as JSON string, this will be parsed by the browser into an js object */
        echo json_encode($answer);
        /* terminate execution here */
        $this->stop();
    }


    /**
     * Get news (normally form database) and update the result array
     * @param $lastId
     * @param $answer
     */
    private function _getNews($lastId, &$answer) {
        if ($lastId==2) {
            $answer['newnews']=1;
            $answer['newstext']='<div><b>Ajax Nummer 1</b><br />Der erste Artikel per Ajax</div>';
        }
        if ($lastId==5) {
            $answer['newnews']=1;
            $answer['newstext']='<div><b>Ajax Nummer 2</b><br />Der noch ein Artikel per Ajax</div>';
        }
    }

}