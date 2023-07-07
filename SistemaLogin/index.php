<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens</title>
</head>

<body>

    <?php
    require_once(__DIR__."/model/User.php");
    require_once(__DIR__."/model/Message.php");


    if (!isset($_SESSION['user'])) {
        echo "<header class='has-text-centered'>
            <h1 >Mensagem secreta!</h1>
            <h2 >Por que os segredos devem ser só teus!</h2>
        </header>
        <div>
            <h3 >Você ainda não está logado!</h3>
            <h3>
                Você deve fazer o <a href='login.php'>login aqui</a> ou <a href='cadastro.php'>cadastre-se</a> antes
                de usar este serviço
            </h3>
        </div>";
    }
    else{
    
    $user = $_SESSION['user'];
    $name = (User::getName($user))[0]['name'];
    $id = (User::getID($user))[0]['id'];

    echo "
    <header>
        <h1>Mensagem secreta!</h1>
        <h2>Por que os segredos devem ser só teus!</h2>
    </header>";

    echo "Bem-vindo, " .  $name  . "!";

    echo '<form method="post">

    <label for="mensagem">Mensagem:</label>
    <textarea name="text" id="mensagem" required></textarea>

    <button type="submit">Enviar mensagem</button>
    </form>
    <form method="post" action="logout.php">
    <button type="submit">Logout</button>
    </form>';

    if(isset($_POST["text"]) and !empty($_POST["text"]) ) {
        $text = $_POST["text"];
        $dataHoraAtual = date('Y/m/d H:i:s');
        $resultado = Message::cadastrarMSG($id,$text, $dataHoraAtual);
        if($resultado) {
            echo "<script>alert('Mensagem cadastrada com sucesso!'); </script>";
        } else {
            echo "<p>Falha no cadastro</p>";
        }        
    }
            
    $listaMensagens = Message::listar($id);
    foreach($listaMensagens as $msg) {
        echo "<div>";
        echo "<h3>Mensagem postada em: ".$msg['date']."</h3>";
        echo "<p>".$msg["text"]."</p>";
        echo "</div>";
    }

    }
    
    ?>
</body>

</html>