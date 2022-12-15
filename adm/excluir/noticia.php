<?php 
    $id = $_GET["id"] ?? NULL;

    if (empty ($id)) {
        mensagem("Registro Inválido");
    } else {
        $id = (int)$id;

        $sql = "SELECT id FROM noticia WHERE categoria_id = {$id}";
        $consulta = mysqli_query($con, $sql);
        $dados = mysqli_fetch_array($consulta);

        $sql = "DELETE FROM noticia WHERE id = {$id} LIMIT 1";

        if ( mysqli_query($con, $sql)){
            mensagem("Registro Excluído");
        } else {
            mensagem("Erro ao excluir registro");
        }
    }
?>