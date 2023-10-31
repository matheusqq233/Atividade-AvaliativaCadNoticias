<?php
    class Noticia{
        //Atributos
        private $idNoticia;
        private $titulo;
        private $texto;
        private $data;
        private $hora;

        public function __construct(){

        }

        public function noticia(){

        }

        public function __get($atrib){
            return $this->$atrib;
        }

        public function __set($atrib, $valor){
            $this->$atrib = $valor;
        }

        public function __toString(){
            return '<br>Código: '.$this->idNoticia.
                   '<br>Título: '.$this->titulo.
                   '<br>Texto: '.$this->texto.
                   '<br>Data: '.$this->data.
                   '<br>Hora: '.$this->hora;
        }
    }