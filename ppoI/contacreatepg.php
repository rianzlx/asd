<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$url = 'http://localhost/trabalho/';
require_once('topo/conexao.php');
require_once('classes/pessoa.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($conn);
    $cliente = new Pessoa($conn);

    $cliente->setnome_pessoa($_POST['nome_pessoa']);
    $cliente->setemail_pessoa($_POST['email_pessoa']);
    $cliente->setcpf_pessoa($_POST['cpf_pessoa']);
    $cliente->setsenha_pessoa($_POST['senha_pessoa']);
    $cliente->settelefone_pessoa($_POST['telefone_pessoa']);
    $cliente->insert();
    $_SESSION['logado'] = true;
}
if ($_SESSION['logado']) {
    header('location: index.php');
    $_SESSION['logado'] = false;
}

?>

<!DOCTYPE html>
<html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>Cadastro</title>

    <!-- links de fontes -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- links de arquivos -->

    <link rel="stylesheet" href="css/principal.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/contacreatepg.css'>
    <script async defer src='js/home.js'></script>

</head>

<body>

    <div class="peixes">
        <video src="imagens/peixes2.mp4" autoplay muted loop></video>
    </div>

    <a class="dada">CADASTRO</a>

    <section class="page1">
        <form action="" method="post" name="form" enctype="multipart/form-data">
            <div class="login">
                <div class="usuario">
                    <input type="text" name="nome_pessoa" placeholder="Nome de usuário " autofocus>
                </div>

                <div class="email">
                    <input type="text" name="email_pessoa" placeholder="Informe seu email " autofocus>
                </div>

                <div class="cpf">
                    <input type="text" name="cpf_pessoa" placeholder="Informe seu CPF " autofocus>
                </div>

                <div class="senha">
                    <input type="password" name="senha_pessoa" placeholder="Sua senha " autofocus>
                </div>

                <div class="telefone">
                    <input type="text" name="telefone_pessoa" placeholder="Seu telefone " autofocus>
                </div>

                <div class="entrar">
                    <button class="botao" name="register">Criar conta</button>
                </div>
            </div>
        </form>
    </section>


</body>

</html>