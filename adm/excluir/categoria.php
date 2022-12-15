<?php

    // recuperar o id
    $id = $_GET["id"] ?? NULL;

    //verificar se o id esta em branco
    if ( empty ( $id ) ) {
        mensagem("Registro inválido");
    } else {

        //transformar o ID para inteiro
        $id = (int)$id;
        
        //verificar se existe uma noticia cadastrada com esta categoria
        $sql = "SELECT id FROM noticia WHERE categoria_id = {$id} LIMIT 1";
        $consulta = mysqli_query( $con, $sql );
        $dados = mysqli_fetch_array( $consulta );

        //verifico se o id não esta vazio - tem uma noticia cadastrada
        if ( !empty ( $dados["id"] ) ) {
            mensagem("Você não pode exluir este registro, pois existe uma notícia cadastrada com ele.");
        }


        //sql para excluir
        $sql = "DELETE FROM categoria WHERE id = {$id} LIMIT 1";
        //executar o SQL
        if ( mysqli_query( $con, $sql ) ) {
            mensagem("Registro Excluído");
        } else {
            mensagem("Erro ao excluir registro");
        }

    }