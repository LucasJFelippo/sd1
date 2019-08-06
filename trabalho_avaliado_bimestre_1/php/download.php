<?php
    session_start();
    $file = '../server/'.$_SESSION['user']."/".$_POST['filename'];
    if (file_exists($file)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
    header('Location: ../arqlist.html');
?>