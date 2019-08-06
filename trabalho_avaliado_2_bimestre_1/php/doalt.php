<?php
    include_once 'mediDAO.php';
    include_once 'medi.php';

    $mediDAO = new MediDAO();

    $medi = $mediDAO->search($_POST['id']);

    if ($_POST['name'] != "") {
        $medi->setName($_POST['name']);
    }
    if ($_POST['producer'] != "") {
        $medi->setProducer($_POST['producer']);
    }
    $medi->setControl($_POST['control']);
    if ($_POST['quant'] != "") {
        $medi->setQuant($_POST['quant']);
    }
    if ($_POST['price'] != "") {
        $medi->setPrice($_POST['price']);
    }

    $mediDAO->alt($medi);
?>