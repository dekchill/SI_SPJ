<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/spjsitubondofix/index.php?target=";
        $data = [
            array('text' => 'HOME', 'link' => $base . 'home'),
            array('text' => 'SPJ PERJADIN', 'link' => $base . 'spjperjadin'),
            array('text' => 'SPJ NARASUMBER', 'link' => $base . 'spj_narasumber'),
            array('text' => 'SPJ MAMIN', 'link' => $base . 'spjmamin')
        ];
        return $data;
    }
}
