<?php
namespace App\config;

class Config{

    public function getDB(){
        return parse_ini_file(dirname(__DIR__).'/database.ini');   //aqui devuelve un objeto con la informacion del archivo database.ini 
    }
}