<?php


namespace Core;


class Helper
{
    public static function redirectToHome()
    {
        header('HTTP/1.1 200 OK');
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
    }

    public static function redirectBack($seconds = 1)
    {
        header( "Refresh:$seconds; url=".$_SERVER['HTTP_REFERER'], true, 303);
    }
}