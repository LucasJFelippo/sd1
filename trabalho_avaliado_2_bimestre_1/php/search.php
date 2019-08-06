<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>lista</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Produtor</th>
                <th>Controlado</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th></th>
            </tr>
            <?php
                include_once 'mediDAO.php';
                include_once 'medi.php';

                $mediDAO = new MediDAO();
                $res = $mediDAO->list($_POST['name'], $_POST['type'], $_POST['order']);
                foreach ($res as $e) {
                    echo '<tr>
                            <td>'.$e->getId().'</td>
                            <td>'.$e->getName().'</td>
                            <td>'.$e->getProducer().'</td>
                            <td>'.$e->getControl().'</td>
                            <td>'.$e->getQuant().'</td>
                            <td>'.$e->getPrice().'</td>
                            <td><button><a href="delete.php?id='.$e->getId().'">Deletar</a></button></td>
                            <td><button><a href="alt.php?id='.$e->getId().'">Alterar</a></button></td>
                        </tr>';
                }
                unset($e)
            ?>
            <a href="../">Voltar</a>
        </table>
    </body>
</html>