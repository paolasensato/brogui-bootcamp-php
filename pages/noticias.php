<h1>Todas as Notícias</h1>
<?php
    //sql para buscar as 5 ultimas noticias
    $sql = "select id, titulo, date_format(data, '%d/%m/%Y') data
        from noticia order by data desc";
    //executar o sql
    $consulta = mysqli_query( $con, $sql );

    //separar os dados do sql
    while ( $dados = mysqli_fetch_array( $consulta ) ) {
        $id = $dados["id"];
        $titulo = $dados["titulo"];
        $data = $dados["data"];

        echo "
            <h2>{$titulo}</h2>
            <p>Postado em: {$data}</p>
            <p>
                <a href='index.php?pagina=noticia&id={$id}'>
                    Ler Notícia
                </a>
            </p>
            <hr>
        ";
    }