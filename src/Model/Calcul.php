<?php


namespace App\Model;


class Calcul
{

    public $data1;
    public $data2;
    public $data3;

    public function result(){
        return ((int) $this->data1 + (int) $this->data2 + (int) $this->data3) ;
    }

}