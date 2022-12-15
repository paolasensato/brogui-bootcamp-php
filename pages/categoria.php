<?php
    //recuperar o id da categoria
    $id = $_GET["id"] ?? NULL;
    //transformar o id em inteiro
    $id = (int)$id;

    //verificar se esta em branco
    if ( empty ( $id ) ) {
        echo "<p>Categoria não encontrada</p>";
    } else {

        //pegar a categoria
        $sql = "select * from categoria
        where id = {$id}";
        //executar a consulta
        $consulta = mysqli_query( $con, $sql );
        //separar os resultados
        $dados = mysqli_fetch_array( $consulta );

        //verificar se a categoria existe
        if ( empty ( $dados["categoria"] ) ) {
            echo "<p>Categoria inexistente</p>";
        } else {

            $categoria = $dados["categoria"];

            echo "<h1>Notícias da categoria {$categoria}</h1>";

            //mostrar as noticias desta categoria
            $sql = "select *, date_format(data,'%d/%m/%Y') data
            from noticia where categoria_id = {$id} order by data desc";

            //executar o sql
            $consulta = mysqli_query( $con, $sql );

            //separar os dados - while
            while ( $dados = mysqli_fetch_array( $consulta ) ) {
                $id = $dados["id"];
                $titulo = $dados["titulo"];
                $data = $dados["data"];

                //mostrar na tela
                echo "<h2>{$titulo}</h2>
                <p>Data da Postagem: {$data}</p>
                <p>
                    <a href='index.php?pagina=noticia&id={$id}'>
                    Ler mais
                    </a>
                </p>
                <hr>";
            }

        }

    }