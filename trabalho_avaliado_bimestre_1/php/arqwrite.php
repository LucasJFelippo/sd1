<?php
    session_start();
    $dir = "../server/".$_SESSION['user']."/".basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $dir)) {
        header("Location: ../arqform.html");
    } else {
        echo "Desculpe mas não foi possivel enviar seu arquivo\n";
        echo "<a href=".'"../arqform.html"'.">Voltar</a>";
    }
?>