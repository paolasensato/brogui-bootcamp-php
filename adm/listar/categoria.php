<h1 class="center">Listar Categorias</h1>
<table>
    <thead>
        <tr>
            <td width="10%">
                ID
            </td>
            <td width="60%">
                Categoria
            </td>
            <td width="30%">
                Opções
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
            // selecionar as categorias
            $sql = "SELECT * FROM categoria ORDER BY categoria";
            // executar o sql
            $consulta = mysqli_query( $con, $sql );
            // laço de repetição para retirar os resultados
            while ( $dados = mysqli_fetch_array( $consulta ) ) {
                //separar os dados
                $id = $dados["id"];
                $categoria = $dados["categoria"];

                ?>
                <tr>
                    <td><?=$id?></td>
                    <td><?=$categoria?></td>
                    <td>
                        <a href="index.php?acao=cadastrar&tabela=categoria&id=<?=$id?>">
                            Editar
                        </a>

                        <a href="javascript:excluir(<?=$id?>)">
                            Excluir
                        </a>
                    </td>
                </tr>
                <?php

            } // fechamento do while
        ?>
    </tbody>
</table>
<script>
    //funcao em javascript para perguntar se quer excluir
    function excluir( id ) {
        if ( confirm ( "Deseja realmente excluir este registro?" ) ){
            //chamar a tela de excluir e passar o id
            location.href="index.php?acao=excluir&tabela=categoria&id=" + id;
        }
    }
</script>