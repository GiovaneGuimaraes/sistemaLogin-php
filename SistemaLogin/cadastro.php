<?php session_start();

require_once(__DIR__."/model/User.php");

if(!isset($_SESSION['user'])){
    if(isset($_POST["nome"]) and !empty($_POST["nome"] and $_POST["login"]) and !empty($_POST["login"]
    and $_POST["senha"]) and !empty($_POST["senha"]) ) {
        $nome = $_POST["nome"];        
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $dataHoraAtual = date('Y/m/d H:i:s');

        if (!User::existe($login)){
            $resultado = User::cadastrar($nome,$login,$senha, $dataHoraAtual);
            if($resultado) {
                echo "<p>Cadastro realizado com sucesso!</p>";
            } else {
                echo "<p>Falha no cadastro</p>";
            }        
        } else {
            echo "<p>Usuario ja cadastrado</p>";
        }
    }
}
else{
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página simples</title>

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
                    <label class="label">Nome</label>
                    <div class="control">
                        <input type="text" class="input" name="nome" placeholder="José da Silva" required>
                    </div>
                </div>

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
                        <button class="button is-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>