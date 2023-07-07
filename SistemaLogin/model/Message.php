
<?php

require_once(__DIR__."/../configs/BancoDeDados.php");

class Message {

    public static function cadastrarMSG($id, $text, $dataHoraAtual ) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("INSERT INTO msg(userId, text, date) VALUES (:userId, :text, :date)");
    
            $stmt->execute(
                [
                    "userId" => $id,
                    "text" => $text,
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

    public static function listar($id) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM msg WHERE userId LIKE ? ORDER BY date");
            $stmt->bindParam(1 , $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

}