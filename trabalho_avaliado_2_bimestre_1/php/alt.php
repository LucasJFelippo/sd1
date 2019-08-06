<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Alterar</title>
        <style>
            #invisible {
                display: none;
            }
        </style>
        <?php
            include_once 'mediDAO.php';
            include_once 'medi.php';

            $mediDAO = new MediDAO();
            $id = explode("=", $_SERVER['REQUEST_URI'])[1];
            
            $medi = $mediDAO->search($id);
        ?>
    </head>
    <body>
        <form action="doalt.php" method="post">
            <label>Id: <?php echo $id?></label><br>
            <select name="id" id="invisible">
                <option value="<?php echo $id?>"></option>
            </select>
            <label>Nome: <?php echo $medi->getName()?></label><br>
            <input type="text" name="name"><br>
            <label>Produtor: <?php echo $medi->getProducer()?></label><br>
            <input type="text" name="producer"><br>
            <label>Controlado: <?php echo $medi->getControl()?></label><br>
            <select name="control">
                <?php
                    if ($medi->getControl() == "S") {
                        echo '<option value="S">Sim</option>
                            <option value="N">Não</option>';
                    } else {
                        echo '<option value="N">Não</option>
                            <option value="S">Sim</option>';
                    }
                ?>
            </select><br>
            <label>Quantidade: <?php echo $medi->getQuant()?></label><br>
            <input type="number" name="quant"><br>
            <label>Preco: <?php echo $medi->getPrice()?></label><br>
            <input type="number" name="price"><br>
            <button type="submit">Alterar</button>
        </form>
    </body>
</html>