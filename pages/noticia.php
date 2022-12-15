<?php
    //recuperar o id enviado por get
    $id = $_GET["id"] ?? NULL;

    //echo $id;
    //verificar se o id está em branco
    if ( empty ( $id ) ) {
        echo "<p>Notícia inválida</p>";
    } else {
        //sql para consultar a noticia
        $sql = "select *, date_format(data, '%d/%m/%Y') data 
            from noticia where id = {$id}";
        //executar o comando sql
        $consulta = mysqli_query( $con, $sql );
        //separar os dados para mostrar na tela
        $dados = mysqli_fetch_array( $consulta );

        //separar os dados
        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $data = $dados["data"];
        $texto = $dados["texto"];

        echo "<h1>{$titulo}</h1>";
        echo "<p>Data da Postagem: {$data}</p>";
        echo nl2br($texto);
    }
