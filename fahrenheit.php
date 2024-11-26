<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Celsius para Fahrenheit</title>
</head>
<body>
    <h1>Conversor de Temperatura</h1>
    <form action="" method="POST">
        <label for="celsius">Temperatura em Celsius:</label>
        <input type="number" id="celsius" name="celsius" step="0.01" required>
        <button type="submit">Converter</button>
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o valor enviado do formulário
    $celsius = $_POST['celsius'];

    // Verifica se o valor foi enviado e é numérico
    if (is_numeric($celsius)) {
        // Realiza a conversão para Fahrenheit
        $fahrenheit = ($celsius * 9 / 5) + 32;

        // Exibe o resultado
        echo "<h1>Resultado da Conversão</h1>";
        echo "<p>{$celsius}°C equivale a {$fahrenheit}°F</p>";
    } else {
        // Mensagem de erro caso o valor não seja válido
        echo "<p>Por favor, insira um valor numérico válido.</p>";
    }
} else {
    // Exibe uma mensagem se o script for acessado diretamente sem o formulário
    echo "<p>Acesse este script por meio do formulário HTML.</p>";
}
?>
