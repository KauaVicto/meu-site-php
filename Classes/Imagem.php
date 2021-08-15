<?php

class Imagem {
    private $num;
    private $categoria;
    private $src;

    public function __construct($num, $cat, $src){
        $this->setNum($num);
        $this->setCategoria($cat);
        $this->setSrc($src);
    }

    public function getNum(){
        return $this->num;
    }
    public function setNum($n){
        $this->num = $n;
    }

    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($d){
        $this->categoria = $d;
    }

    public function getSrc(){
        return $this->src;
    }
    public function setSrc($s){
        $this->src = $s;
    }
}