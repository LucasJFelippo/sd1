<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Farm</title>
    </head>
    <body>
        <h2>Listar:</h2>
        <form action="php/search.php" method="post">
            <label>Nome:</label>
            <input type="text" name="name"><br>
            <select name="type">
                <option value="0">Seleciona um tipo</option>
                <option value="1">Controlado</option>
                <option value="2">Pouco estoque</option>
            </select>
            <select name="order">
                <option value="0">Selecione uma ordem</option>
                <option value="1">Preco</option>
                <option value="2">Quantidade</option>
            </select>
            <button type="submit">Pesquisar</button>
        </form>
        <h2>Adicionar:</h2>
        <form action="php/add.php" method="post">
            <label>Nome:</label>
            <input type="text" name="name"><br>
            <label>Produtor:</label>
            <input type="text" name="producer"><br>
            <label>Controlado:</label>
            <select name="control">
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select><br>
            <label>Quantidade:</label>
            <input type="number" name="quant"><br>
            <label>Price:</label>
            <input type="number" name="price"><br>
            <button type="submit">Adicionar</button>
        </form>
    </body>
</html>