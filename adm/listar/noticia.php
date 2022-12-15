<h1 class="center">Listar Notícias</h1>
<table>
    <thead>
        <tr>
            <td width="10%">
                ID
            </td>
            <td width="60%">
                Notícia
            </td>
            <td width="30%">
                Opções
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
            //select
            $sql = "SELECT * FROM noticia ORDER BY titulo";

            //executar 
            $consulta = mysqli_query($con, $sql);

            //retirar resultados
            while ($dados = mysqli_fetch_array($consulta)) {
                //separar os dados
                $id = $dados["id"];
                $titulo = $dados["titulo"];
                
                ?>
                <tr>
                    <td><?=$id?></td>
                    <td><?=$titulo?></td>
                    <td>
                        <a href="index.php?acao=cadastrar&tabela=noticia&id=<?=$id?>">
                            Editar
                        </a>
                        <a href="javascript:excluir(<?=$id?>)">
                            Excluir
                        </a>
                    </td>
                </tr>
                <?php
            
            }
        ?>
    </tbody>
</table>
<script>
    // Perguntar se quer excluir
    function excluir( id ) {
        if (confirm("Deseja realmente excluir esse registro")){
            // chamar a tela de excluir passando id
            location.href="index.php?acao=excluir&tabela=noticia&id="+id;
        }
    }
</script>