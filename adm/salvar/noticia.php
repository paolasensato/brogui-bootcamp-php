<?php
    $id = trim($_POST["id"] ?? NULL);
    $titulo = trim($_POST["titulo"] ?? NULL);
    $texto = trim($_POST["texto"] ?? NULL);
    $data = trim($_POST["data"] ?? NULL);
    $categoria_id = trim($_POST["categoria_id"] ?? NULL);

    if ( empty ($titulo)) {
        mensagem("Preencha o título");
    } else if ( empty($texto)) {
        mensagem("Preencha o texto da notícia");
    } else if ( empty($data)) {
        mensagem("Preencha a data da publicação");
    }else if ( empty($categoria_id)) {
        mensagem("Selecione uma categoria");
    }
    // gravar os dados ou atualizar no banco
    if ( !empty($id)) {
        // insert
        $sql = "INSERT INTO noticia VALUES (NULL,'{$titulo}', '{$texto}', '{$data}', '{$categoria_id}')";
    } else {
        // update
        $sql = "UPDATE noticia SET titulo = '{$titulo}, 
            texto = '{$texto}',
            data = '{$data}',
            categoria_id = '{$categoria_id}'
                WHERE id = {$id} LIMIT 1";
    }

    //executar o sql
    if (mysqli_query($con, $sql)) {
        mensagem("Registro salvo com sucesso");
    } else {
        mensagem("Erro ao salvar registro");
    }
?>