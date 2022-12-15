<?php
    //iniciar a sessao
    session_start();
    //desregistrar a sessao brogui
    unset( $_SESSION["brogui"] );
    //enviar para a página index
    echo "<script>location.href='index.php'</script>";