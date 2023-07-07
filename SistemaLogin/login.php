<?php session_start(); 
    require_once(__DIR__."/model/User.php");

    if(!isset($_SESSION['user'])){
        if(isset($_POST['login']) and !empty($_POST['login']) and isset($_POST['senha']) and !empty($_POST['senha'])){
            $user = User::getUser($_POST['login'], $_POST['senha']);
            if($user){  
                $_SESSION['user'] = $_POST['login'];
                header('Location:index.php');
                exit;
            } else {
                echo '<p>Login ou senha incorretos!</p>';
            }
        }
    } else{
        header('Location:index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="has-text-centered">
        <h1 class="title is-1">Mensagem secreta!</h1>
        <h2 class="subtitle is-6">Por que os segredos devem ser só teus!</h2>
    </header>
    <div class='has-text-centered'><a href='index.php'>Voltar à página inicial</a></div>
    <div class="columns is-centered my-5">
        <div class="column is-6">
            <form method="POST">
                <div class="field">
                    <label class="label">Login</label>
                    <div class="control">
                        <input type="email" class="input" name="login" placeholder="exemplo@email.com" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Senha</label>
                    <div class="control">
                        <input type="password" class="input" name="senha" required>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>



</html>