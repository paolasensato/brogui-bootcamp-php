<?php
    //iniciar a sessao
    session_start();
    //incluir o arquivo do banco de dados
    include "../config.php";

    //recuperar os dados digitados no formulário
    $login = trim ( $_POST["login"] ?? NULL );
    $senha = trim ( $_POST["senha"] ?? NULL );
    //trim - retira os vários espaços em branco

    //verificar se os campos estão preenchidos
    if ( empty ( $login ) ) {
        mensagem("Preencha o campo Login");
    } else if( empty ( $senha ) ) {
        mensagem("Preencha o campo Senha");
    }

    //sql para selecionar o usuário e ver se ele existe
    $sql = "select * from usuario where login = '{$login}' ";
    //echo $sql;
    $consulta = mysqli_query( $con, $sql );
    $dados = mysqli_fetch_array( $consulta );

    //verificar se o usuário existe
    $id = $dados["id"] ?? NULL;

    if ( empty ( $id ) ) {
        mensagem("Usuário ou senha inválidos");
    } else if ( !password_verify( $senha, $dados["senha"] ) ) {
        mensagem("Usuário ou senha inválidos");
    }

    //registrar o usuário e direcionar para a tela de menu
    $_SESSION["brogui"] = array("id"=>$id,
                            "login"=>$dados["login"]);
    //direcionar para a tela de menu
    echo "<script>location.href='index.php'</script>";
