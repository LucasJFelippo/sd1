<?php
    try {
        $login = login($_POST['name'], $_POST['email']);
        if (!$login) {
            setcookie("status", true, time() + 5, "/");
            header('Location: ../login.html');
        } else {
            session_destroy();
            session_start();
            $user = trim($_POST['name']);
            $email = trim($_POST['email']);
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
            setcookie("user", $user, time() + 300, "/");
            setcookie("email", $email, time() + 300, "/");
            header('Location: ../arqform.html');
        }
    } catch (Exception $th) {
        echo 'Exceção capturada: ', $th->getMessage(), "\n";
    }
    function login($name, $email){
        $dologin = false;
        $arq = '../server/userlist.txt';
        $open = fopen($arq, "r");
        $cont = fread($open, filesize($arq));
        fclose($open);
        $contarray = explode(";", $cont);
        $limit = count($contarray)-1;
        $userlist = array();
        for ($cont=0; $cont < $limit; $cont+=2) {
            $user = array($contarray[$cont], $contarray[$cont+1]);
            array_push($userlist, $user);
        }
        $limit = count($userlist);
        for ($cont=0; $cont < $limit; $cont+=1) { 
            if (trim($userlist[$cont][0]) == $name && $userlist[$cont][1] == $email) {
                $dologin = true;
                break;
            }
        }
        if ($dologin) {
            return true;
        } else {
            return false;
        }
    }
    function sessionverify(){
        if(isset($_SESSION['user'])){
            return true;
        } else {
            return false;
        }
    }
?>