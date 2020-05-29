<?php


namespace Content\Controller;


class PageController
{
    public function index($params1, $param2, $param3)
    {
       echo $params1;
       echo $param2;
       echo $param3;
    }

    public function test()
    {
        echo 'Hello world!';
    }
}