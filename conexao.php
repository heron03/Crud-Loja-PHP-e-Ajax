<?php

class Db {
    
    public $conexao;
    
    public function __construct(){
        $this->conexao = new PDO('mysql:host=localhost;dbname=loja;charset=utf8','root','');
    }
    
}