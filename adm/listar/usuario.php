<h1 class="center"> Listar Usuários</h1>
<p class="center">
    <a href="index.php?acao=cadastrar&tabela=usuario" class="btn">Novo Cadastro</a>
    <a href="index.php?acao=listar&tabela=usuario" class="btn">Listar Usuários</a>
</p>
<hr>
<br>
<table>
    <thead>
        <tr>
            <td width="5%">
                ID
            </td>
            <td width="25%">
                Nome
            </td>
            <td width="25%">
                E-mail
            </td>
            <td width="25%">
                Login
            </td>
            <td width="15%">
                Opções
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM usuario ORDER BY nome";

            $consulta = mysqli_query ($con, $sql);

            while ($dados = mysqli_fetch_array($consulta)) {
                $id = $dados["id"]; 
                $nome = $dados["nome"];
                $email = $dados["email"];
                $login = $dados["login"];
                
                ?>
                <tr>
                    <td style="text-align: center;"><?=$id?></td>
                    <td><?=$nome?></td>
                    <td><?=$email?></td>
                    <td><?=$login?></td>
                    <td>
                        <a href="index.php?acao=cadastrar&tabela=usuario&id=<?=$id?>">
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
            location.href="index.php?acao=excluir&tabela=usuario&id="+id;
        }
    }
</script>