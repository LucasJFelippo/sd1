<?php
    try {
        $singin = singin($_POST['name'], $_POST['email']);
    } catch (Exception $th) {
        echo 'Exceção capturada: ', $th->getMessage(), "\n";
    }
    function singin($name, $email) {
        $verify = singinverify($name);
        if ($verify) {
            header('Location: ../login.html');
            return false;
        } else {
            $doc = "{$name};{$email};\n";
            $arq = '../server/userlist.txt';
            $open = fopen($arq, "a+");
            $gravar = fwrite($open, $doc);
            fclose($open);
            mkdir("../server/".$name, 0777);
            if($gravar) {
                setcookie("user", $user, time() + 300, "/");
                setcookie("email", $email, time() + 300, "/");
                header('Location: ../arqform.html');
            } else {
                throw new Exception('Não gravado!');
            }
        }
    }
    function singinverify($name) {
        $areadysingin = false;
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
            if ($userlist[$cont][0] == $name) {
                $areadysingin = true;
                break;
            }
        }
        if ($areadysingin) {
            return true;
        } else {
            return false;
        }
    }
?>