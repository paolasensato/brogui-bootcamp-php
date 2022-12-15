<h1 class="center">Cadastro de Categoria</h1>
<p class="center">
    <a href="index.php?acao=cadastrar&tabela=categoria" class="btn">
        Novo Cadastro
    </a>

    <a href="index.php?acao=listar&tabela=categoria" class="btn">
        Listar Cadastros
    </a>
</p>
<hr>
<?php
    // recuperar o ID
    $id = $_GET["id"] ?? NULL;
    $categoria = NULL;
    
    //verificar se existe um ID sendo enviado
    if ( !empty ( $id ) ) {
        $id = (int)$id;
        //echo "O ID é: {$id}";

        //sql para trazer os dados do id
        $sql = "SELECT * FROM categoria WHERE id = {$id} ";
        //executar o sql
        $consulta = mysqli_query( $con, $sql );
        //separar os dados
        $dados = mysqli_fetch_array( $consulta );

        $id = $dados["id"] ?? NULL;
        $categoria = $dados["categoria"] ?? NULL;
    }
    

?>
<form name="formCadastro" method="post" 
action="index.php?acao=salvar&tabela=categoria">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" class="campo" readonly value="<?=$id?>">
    
    <label for="categoria">Digite a Categoria:</label>
    <input type="text" name="categoria" id="categoria" class="campo" required value="<?=$categoria?>">
    
    <br>
    <button type="submit">Gravar Dados</button>
</form>