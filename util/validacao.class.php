<?php
class Validacao{

    public static function testarTitulo($valor){
        $exp='/[a-zA-Z0-9áéíóúâêîôûãõàèìòùäëïöüç@_]{3,50}$/u';
        if(preg_match($exp,$valor) ){
            return true;
        }else{
            return false;
        }//fecha o else
    }//fecha o método

    public static function testarTexto($valor){
        $exp='/^[a-zA-Z0-9áéíóúâêîôûãõàèìòùäëïöüç@_]{3,255}$/u';
        if(preg_match($exp,$valor) ){
            return true;
        }else{
            return false;
        }//fecha o else
    }//fecha o método

    public static function testarData($valor){
        $exp = '/^\d{4}-\d{2}-\d{2}$/';
        if(preg_match($exp,$valor) ){
            return true;
        }else{
            return false;
        }//fecha o else
    }//fecha o método
    
    public static function testarHora($valor){
        $exp='/^\d{2}:\d{2}$/';
        if(preg_match($exp,$valor) ){
            return true;
        }else{
            return false;
        }//fecha o else
    }//fecha o método

}//fecha a classe validacao
?>