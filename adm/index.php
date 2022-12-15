<?php
    //iniciar a sessao
    session_start();
    //conectar com o banco de dados
    include "../config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin do Sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //verificar se não esta logado
        if ( !isset ( $_SESSION["brogui"] ) ) {
            //tela de login
            include "login.php";
        } else {
            //login do usuário registro
            $login = $_SESSION["brogui"]["login"];
            ?>
            <header>
                <a href="index.php" class="logo">
                    ADMINISTRADOR
                </a>

                <nav>
                    <ul>
                        <li>
                            <a href="index.php?acao=cadastrar&tabela=categoria">Categoria</a>
                        </li>
                        <li>
                            <a href="index.php?acao=cadastrar&tabela=noticia">Notícia</a>
                        </li>
                        <li>
                            <a href="index.php?acao=cadastrar&tabela=usuario">Usuário</a>
                        </li>
                        <li>
                            <a href="sair.php">
                                Olá <?=$login?>, Sair.
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <main>
                <?php
                    //recuperar a acao e a tabela
                    $acao = $_GET["acao"] ?? "paginas";
                    $tabela = $_GET["tabela"] ?? "home";

                    // acao = cadastrar e tabela = categoria
                    // cadastrar/categoria.php
                    $arquivo = "{$acao}/{$tabela}.php";

                    // echo $arquivo;
                    // verificar se o arquivo existe
                    if ( file_exists( $arquivo ) ) {
                        include $arquivo;
                    } else {
                        include "paginas/erro.php";
                    }
                ?>
            </main>
            <footer>
                <p class="center">
                    Desenvolvido por Sensato
                    
                </p>
            </footer>
            <?php
        }
    ?>
</body>
</html>