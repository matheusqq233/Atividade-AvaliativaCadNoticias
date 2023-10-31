<?php
include '../persistencia/conexaobanco.class.php';
class NoticiaDAO{
    private $conexao=null;

    public function __construct(){
        $this->conexao = ConexaoBanco::getInstancia();
    }//fecha o construtor

    public function cadastrarNoticia($n){
        try{
            $stat = $this->conexao->prepare("INSERT INTO `noticia` (`idNoticia`, `titulo`, `texto`, `data`, `hora`) VALUES(null,?,?,?,?)" );

            $stat->bindValue(1,$n->titulo);
            $stat->bindValue(2,$n->texto);
            $stat->bindValue(3,$n->data);
            $stat->bindValue(4,$n->hora);

            $stat->execute();

            //Encerrando a conexao
            $this->conexao=null;
            
        }catch(PDOException $e){
            echo 'Erro ao cadastrar noticia';
        }//fecha o catch
    }//fecha o método

    public function buscarNoticia(){
        try{
            $stat = $this->conexao->query("select * from noticia" );

            $array = array();
            $array =$stat->fetchAll(PDO::FETCH_CLASS, 'noticia');

            //Encerrando a conexao
            $this->conexao=null;
            return $array;
            
        }catch(PDOException $e){
            echo 'Erro ao buscar noticia!';
        }//fecha o catch
    }//fecha o método


}//fecha a classe NoticiaDAO
?>