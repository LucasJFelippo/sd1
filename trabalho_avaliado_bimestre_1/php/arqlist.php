<?php
    session_start();
    $dir = "../server/".$_SESSION['user'];
    $files = scandir($dir, 1);
    for ($cont=0; $cont < 2; $cont++) { 
        array_pop($files);
    }
    $files = array_reverse($files);
    $size = array();
    for ($cont=0; $cont < count($files); $cont++) { 
        array_push($size, filesize($dir."/".$files[$cont]));
    }
?>
<script>
    localStorage.setItem('user', <?php echo json_encode($_SESSION['user'])?>);
    localStorage.setItem('files', <?php echo json_encode($files)?>);
    localStorage.setItem('size', <?php echo json_encode($size)?>);
    window.location.href = "../arqlist.html"
</script>