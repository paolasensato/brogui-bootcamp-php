<?php

    // recuperar os dados digitados
    $id = trim ( $_POST["id"] ?? NULL );
    $categoria = trim ( $_POST["categoria"]?? NULL );

    // print_r( $_POST );

    // verificar se o campo categoria esta preenchido
    if ( empty ( $categoria ) ) {
        mensagem("Preencha a categoria");
    }

    // se o id esta vazio - se estiver vazio INSERT - senao UPDATE
    if ( empty ( $id ) ) {
        // insert no banco - pois o ID esta vazio
        $sql = "INSERT INTO categoria VALUES ( NULL, '{$categoria}' )";

        //echo $sql;
    } else {
        // update no banco - pois o ID não esta vazio
        $sql = "UPDATE categoria SET categoria = '{$categoria}'
        WHERE id = '{$id}'";
    }

    //executar um dos SQL para gravar ou atualizar
    if ( mysqli_query( $con, $sql ) ) {
        mensagem("O registro foi salvo com sucesso!");
    } else {
        mensagem("Erro ao salvar registro");
    }