<h1 class="center">Cadastro de Usuários</h1>
<p class="center">
    <a href="index.php?acao=cadastrar&tabela=usuario" class="btn">Novo Cadastro</a>
    <a href="index.php?acao=listar&tabela=usuario" class="btn">Listar Usuários</a>
</p>
<hr>
<?php
    if (isset($_GET["id"])) {
        $id = (int)$_GET["id"];

        $sql = "select * from usuario where id = {$id}";
        $consulta = mysqli_query($con, $sql);
        $dados = mysqli_fetch_array($consulta);
    }

    $id = $dados["id"] ?? NULL;
    $nome = $dados["nome"] ?? NULL;
    $login = $dados["login"] ?? NULL;
    $email = $dados["email"] ?? NULL;
?>

<form method="post" action="index.php?acao=salvar&tabela=usuario" name="formCadastro">
    <label for="id">ID:</label>
    <input type="text" readonly name="id" class="campo" value="<?=$id?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" class="campo" value="<?=$nome?>" required>
  
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" class="campo" value="<?=$login?>" required>
  
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email" class="campo" value="<?=$email?>" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" class="campo">

    <label for="senha2">Confirme a Senha</label>
    <input type="password" name="senha2" id="senha2" class="campo">

    <br>
    <button type="submit">Gravar Dados</button>

</form>