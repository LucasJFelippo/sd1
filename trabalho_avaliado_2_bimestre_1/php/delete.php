<?php
    include_once 'mediDAO.php';

    $mediDAO = new MediDAO();
    $id = explode("=", $_SERVER['REQUEST_URI'])[1];
    $mediDAO->delete($id);
?>