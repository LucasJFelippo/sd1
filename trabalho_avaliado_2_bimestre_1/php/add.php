<?php
    include_once 'mediDAO.php';
    include_once 'medi.php';

    $mediDAO = new MediDAO();

    $medi = new Medi($_POST['name'], $_POST['producer'], $_POST['control'], $_POST['quant'], $_POST['price']);

    $mediDAO->add($medi);
?>