<?php
    $id = trim($_POST["id"] ?? NULL);
    $login = trim($_POST["login"] ?? NULL);
    $nome = trim($_POST["nome"] ?? NULL);
    $email = trim($_POST["email"] ?? NULL);
    $senha = trim($_POST["senha"] ?? NULL);
    $senha2 = trim($_POST["senha2"] ?? NULL);

    if ( empty ($nome)) {
        mensagem("Preencha o nome");
    } else if ( empty($login)){
        mensagem("Preencha o login");
    } else if (!filter_var($email,  FILTER_VALIDATE_EMAIL)){
        mensagem("Preencha um e-mail válido");
    } else if ( $senha != $senha2){
        mensagem("As senhas não coincidem");
    } 

    //insert or update

    if ( empty ( $id )) {
        //insert 
        if ( empty ($senha)) {
            mensagem("Digite uma senha");
        }
        // criptografar a senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario VALUES (NULL, '{$nome}', '{$email}', '{$login}','{$senha}')";
    } else if (empty ( $senha )) {
        // update sem senha
        $sql = "UPDATE usuario set nome = '{$nome}', email = '{$email}', login = '{$login}' where id = '{$id}' limit 1";
    } else {
        //update incluindo a senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        
        $sql = "UPDATE usuario set nome = '{$nome}', email = '{$email}', login = '{$login}', senha = '{$senha}' where id = '{$id}' limit 1";
    }

    //salvar realmente
    if (mysqli_query($con, $sql)) {
        mensagem("Registro salvo com sucesso");
    } else {
        mensagem("Erro ao salvar registro");
    }
?>