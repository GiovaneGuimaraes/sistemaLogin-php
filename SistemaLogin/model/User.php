<?php

require_once(__DIR__."/../configs/BancoDeDados.php");

class User {

    public static function cadastrar($nome, $usuario, $senha, $dataHoraAtual) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("INSERT INTO user(name,login,password,date) VALUES (:name, :login, :password, :date)");
    
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
    
            $stmt->execute(
                [
                    "name" => $nome,
                    "login" => $usuario,
                    "password" => $senhaCriptografada,
                    "date" => $dataHoraAtual
                ]
            );
            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }            
    
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function getUser($login, $senha) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM `user` WHERE `login` = ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($senha, $user['password'])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
        
    public static function existe($id) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT COUNT(*) FROM user WHERE id = ?");
            $stmt->execute([$id]);

            if($stmt->fetchColumn() > 0) {
                return true;
            } else {

                return false;
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function getName($user) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT `name` FROM user WHERE `login` = ?");
            $stmt->execute([$user]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function getID($user) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT `id` FROM user WHERE `login` = ?");
            $stmt->execute([$user]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

}