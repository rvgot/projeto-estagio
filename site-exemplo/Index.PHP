<!DOCTYPE html> <!-- Escopo receber CEP, Rua, Bairro e Estado -->
<html lang="pt-br"> <!-- Declaração idioma português brasileiro -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade mobile -->
    <title>Meu CEP</title>
</head>
<body>
    <form action="index.php" method="post"> <!-- Erro action="idex.php" -->
        <label> Insira o CEP: </label>
		    <input type="text" name="cep">
            <input type="submit" value="Enviar"> <br />
        <label>Rua:
            <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
            <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Estado:
            <input name="uf" type="text" id="uf" size="2" /></label><br />
    </form> <!-- Fechamento tag /form -->
    <?php
        if (!empty($_POST['cep'])) {
        $cep = $_POST['cep'];
        $address = (get_address($cep));  // Erro (get_address($cp) 
        echo "<br><br>CEP Informado: $cep<br>";
        echo "Rua: $address->logradouro<br>"; // Erro Rua: $addres->logradoro<br>
        echo "Bairro: $address->bairro<br>";
        echo "Estado: $address->uf<br>"; // Erro Estado: $adress->uf<br>
    }
    function get_address($cep) {
        $cep = preg_replace("/[^0-9]/", "", $cep); // formatar CEP removendo caracteres não numéricos
        $url = "http://viacep.com.br/ws/$cep/xml/"; // Erro http://viacep.com.br/ws$cep/xml/
        $xml = simplexml_load_file($url);
        return $xml;
    }
    ?>
</body>
</html>
<!-- f) Descreva o que você mudaria no código para melhorá-lo. Não é necessário implementar o código das melhorias. R: Montar o Layout do Formulário com Bootstrap -->