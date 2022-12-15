<h1>Categorias de Notícias</h1>
<ul>
    <?php
        //selecionar as categorias
        $sql = "select * from categoria order by
        categoria";
        //executar a consulta
        $consulta = mysqli_query( $con, $sql );

        //separar os resultados
        while ( $dados = mysqli_fetch_array( $consulta ) ) {
            $id = $dados["id"];
            $categoria = $dados["categoria"];

            echo "
            <li>
                <a href='index.php?pagina=categoria&id={$id}'>
                    {$categoria}
                </a>
            </li>
            ";
        }
    ?>
</ul>