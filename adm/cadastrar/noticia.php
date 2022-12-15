<h1 class="center">Cadastro de Notícias</h1>
<p class="center">
    <a href="index.php?acao=cadastrar&tabela=noticia" class="btn"> Novo Cadastro</a>
    <a href="index.php?acao=listar&tabela=noticia" class="btn">Listar Cadastros</a>
</p>
<hr>
<?php
    if (isset ($_GET["id"])) {
        $id = (int)$_GET["id"];

        $sql = "SELECT * FROM noticia WHERE id = {$id}";
        $consulta = mysqli_query($con, $sql);
        $dados = mysqli_fetch_array($consulta);    
    }

    $id = $dados["id"] ?? NULL;
    $titulo = $dados["titulo"] ?? NULL;
    $texto = $dados["texto"] ?? NULL;
    $data = $dados["data"] ?? NULL;
    $categoria_id = $dados["categoria_id"] ?? NULL;

?>
<form name="formCadastro" method="post" action="index.php?acao=salvar&tabela=noticia">
    <label for="id">ID:</label>
    <input type="text" readonly name="id" id="id" class="campo" value="<?=$id?>">
    
    <label for="titulo">Título da Notícia</label>
    <input type="text" name="titulo" id="titulo" class="campo" required value="<?=$titulo?>">
    
    <label for="texto">Texto da Notícia</label>
    <textarea name="texto" id="texto" required rows="6" class="campo"><?=$texto?></textarea>

    <label for="data">Data de Publicação</label>
    <input type="date" name="data" required class="campo" id="data" value="<?=$data?>">

    <label for="categoria_id">Selecione uma Categoria</label>
    <select name="categoria_id" id="categoria_id" required class="campo">
        <option value=""></option>
            <?php 
                //selecionar categorias
                $sql = "select * from categoria order by categoria";

                $consulta = mysqli_query($con, $sql);

                while ( $dados = mysqli_fetch_array($consulta)) {
                    // recuperar os valores 
                    $id = $dados["id"];
                    $categoria = $dados["categoria"];

                    echo "<option value='{$id}'>{$categoria}</option>";
                }
            ?>
    </select>
    <br>
    <button type="submit">Gravar Dados</button>
</form>

<script>
    document.querySelector("#categoria_id").value = "<?=$categoria_id?>";
</script>