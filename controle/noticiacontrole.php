<?php
    session_start();
    include '../modelo/noticia.class.php';
    include '../util/validacao.class.php';
    include '../dao/noticiadao.class.php';
    
    
    if( isset($_GET['op']) ){
                    
     switch($_GET['op']) {

        case 'cadastrar':
            //Cadastro com validação - testando se existem
            if( isset($_POST['txttitulo']) &&
                isset($_POST['txttexto']) &&
                isset($_POST['txtdata']) &&
                isset($_POST['txthora']) ) {

                    //fazendo a validação
                    $erros = array();

                    if(!Validacao::testarTitulo($_POST['txttitulo']) ){
                        $erros[] = 'Titulo inválido!';
                    }

                    if(!Validacao::testarTexto($_POST['txttexto']) ){
                        $erros[] = 'Texto inválido!';
                    }

                    if(!Validacao::testarData($_POST['txtdata']) ){
                        $erros[] = 'Data inválida!';
                    }

                    if(!Validacao::testarHora($_POST['txthora']) ){
                        $erros[] = 'Hora inválida!';
                    }

                    if( count($erros) == 0){
                        $n = new Noticia();
                        $n->titulo = $_POST['txttitulo'];
                        $n->texto = $_POST['txttexto'];
                        $n->data = $_POST['txtdata'];
                        $n->hora = $_POST['txthora'];

                        /*Enviar o objeto $n para o banco de dados */
                        $nDAO = new NoticiaDAO();
                        $nDAO->cadastrarNoticia($n);

                        $_SESSION['noticia']=serialize($n);
                        $_SESSION['msg'] = 'Noticia cadastrada com sucesso!';

                        header("location:../visao/guiresposta.php");
                    }else{
                        $e = serialize($erros);
                        header("location:../visao/guierro.php?erros=$e");
                    }//fecha o if do count
            }else{
            echo 'Variaveis inválidas!';
            }//fecha o isset

        break; 

        case 'consultar':
            $nDAO = new NoticiaDAO();

            $array = array();
            $array = $nDAO->buscarNoticia();

            $_SESSION['noticia'] = serialize($array);
            header("location:../visao/guilistanoticia.php");
        break; //

        default: echo 'Erro no switch';
        break;//fecha case cadastrar
    }//fecha o switch
}else{
    echo 'Variavel não existe';
}
    ?>