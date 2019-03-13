<?php
    require 'produto.php';
    require('../conexao.php');
    $db = new Db;

    $passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

    switch($passo){
        case 'excluir' : { excluir($db); break; }
        case 'alterar' : { alterar($db); break; }
        case 'cadastrar' : { cadastrarjogo($db); break;}
        case 'dados' : { dados($db); brak; }
        default : { listarjogos($db); break; }
    }

    function excluir($db){
        $idjogo = (int)$_GET['idjogo'];
        
        $sql = sprintf('DELETE FROM 
                            produtos
                        WHERE
                            idjogo = :IDJOGO');
        $consulta = $db->conexao->prepare($sql);
        $consulta->bindParam(':IDJOGO', $idjogo);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Nenhum registro excluído"
                            );
            
        } else {
        
            $retorno = array(
                            "erro"=>false, 
                            "msg" => "Registro excluído"
                            );
            
        }
        
        response($retorno);
    }

    function alterar($db){
        $idjogo = (int)$_POST['idjogo'];
        $nome = trim($_POST['nome']);
        $preco = trim($_POST['preco']);
        $quantidade = trim($_POST['quantidade']);
        $marca = trim($_POST['marca']);
        $plataforma = trim($_POST['plataforma']);
        
        
        if($idjogo==0){
            response(array(
                "erro"=>true,
                "msg"=>"ID jogo inválido"
            ));   
        }
        
        if($nome==""){
            response(array(
                "erro"=>true,
                "msg"=>"O nome deve ser preenchido"
            ));
        }
        if($preco==""){
            response(array(
                "erro"=>true,
                "msg"=>"O preco deve ser preenchido"
            ));
        }
        if($quantidade==""){
            response(array(
                "erro"=>true,
                "msg"=>"O quantidade deve ser preenchido"
            ));
        }
        if($marca==""){
            response(array(
                "erro"=>true,
                "msg"=>"O marca deve ser preenchido"
            ));
        }
        if($plataforma==""){
            response(array(
                "erro"=>true,
                "msg"=>"O plataforma deve ser preenchido"
            ));
        }
        
        
        $sql = sprintf('UPDATE produtos
                        SET
                            nome = :NOME,
                            preco = :PRECO,
                            quantidade = :QUANTIDADE,
                            marca = :MARCA,
                            plataforma = :PLATAFORMA
                        WHERE
                            idjogo = :IDJOGO');
        $consulta = $db->conexao->prepare($sql);
        $consulta->bindParam(':NOME', $nome);
        $consulta->bindParam(':PRECO', $preco);
        $consulta->bindParam(':QUANTIDADE', $quantidade);
        $consulta->bindParam(':MARCA', $marca);
        $consulta->bindParam(':PLATAFORMA', $plataforma);
        $consulta->bindParam(':IDJOGO', $idjogo);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Nenhum registro alterado"
                            );
            
        } else {
        
            $retorno = array(
                            "erro"=>false, 
                            "msg" => "Registro alterado"
                            );
            
        }
        
        response($retorno);
        
    }

    function cadastrarjogo($db){
    
        $nome = trim($_POST['nome']);
        $preco = trim($_POST['preco']);
        $quantidade = trim($_POST['quantidade']);
        $marca = trim($_POST['marca']);
        $plataforma = trim($_POST['plataforma']);
        
        if($nome==""){
            response(array(
                "erro"=>true,
                "msg"=>"O nome deve ser preenchido"
            ));
        }
        if($preco==""){
            response(array(
                "erro"=>true,
                "msg"=>"O preco deve ser preenchido"
            ));
        }
        if($quantidade==""){
            response(array(
                "erro"=>true,
                "msg"=>"O quantidade deve ser preenchido"
            ));
        }
        if($marca==""){
            response(array(
                "erro"=>true,
                "msg"=>"O marca deve ser preenchido"
            ));
        }
        if($plataforma==""){
            response(array(
                "erro"=>true,
                "msg"=>"O plataforma deve ser preenchido"
            ));
        }

        
        $sql = sprintf('INSERT INTO `produtos`
                        (`nome`, `preco`, `quantidade`, `marca`, `plataforma`)
                        VALUES
                        (:NOME, :PRECO, :QUANTIDADE, :MARCA, :PLATAFORMA)');
        $consulta = $db->conexao->prepare($sql);
        $consulta->bindParam(':NOME', $nome);
        $consulta->bindParam(':PRECO', $preco);
        $consulta->bindParam(':QUANTIDADE', $quantidade);
        $consulta->bindParam(':MARCA', $marca);
        $consulta->bindParam(':PLATAFORMA', $plataforma);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Nenhum registro cadastrado"
                            );
            
        } else {
        
            $retorno = array(
                            "erro"=>false, 
                            "msg" => "Registro cadastrado"
                            );
            
        }
        
        response($retorno);
        
    }

    function dados($db){
        $idjogo = (int)$_GET['idjogo'];
        
        $sql = sprintf('SELECT 
                            idjogo, 
                            nome,
                            preco,
                            quantidade,
                            marca,
                            plataforma
                        FROM
                            produtos
                        WHERE
                            idjogo = :IDJOGO');
        $consulta = $db->conexao->prepare($sql);
        $consulta->bindParam(':IDJOGO', $idjogo);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }

    function listarjogos($db){
        
        $sql = sprintf('SELECT 
                           idjogo,
                           nome,
                           preco,
                           quantidade,
                           marca,
                           plataforma
                        FROM
                            produtos');
        $consulta = $db->conexao->prepare($sql);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }

    function response($dados){
        header("Content-type: application/json");
        echo json_encode($dados);
        exit;
    }
