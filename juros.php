<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Juros Simples</title>
</head>
<body style="background-color: black; color: white;">
    <div>
        <h1>JUROS SIMPLES</h1>
        <p> Não inserir o dado do campo que será calculado </p>
        <form method="get" action="">
            <input name="juros" placeholder="Juros" type="number" step="0.01"><br><br>
            <input name="capital" placeholder="Capital" type="number" step="0.01"><br><br>
            <input name="prazo" placeholder="Prazo (EM MESES)" type="number" step="0.01"><br><br>
            <input name="taxa" placeholder="Taxa" type="number" step="0.01"><br><br>
            <fieldset>
                <legend>Operações</legend>
                <input type="radio" name="operacao" value="juros" checked> JUROS<br>
                <input type="radio" name="operacao" value="capital"> CAPITAL<br>
                <input type="radio" name="operacao" value="prazo"> PRAZO<br>
                <input type="radio" name="operacao" value="taxa"> TAXA<br>
            </fieldset><br>
            <input class="botao" type="submit" value="Calcular">
        </form>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $juros = isset($_GET['juros']) ? floatval($_GET['juros']) : null;
    $capital = isset($_GET['capital']) ? floatval($_GET['capital']) : null;
    $prazo = isset($_GET['prazo']) ? floatval($_GET['prazo']) : null;
    $taxa = isset($_GET['taxa']) ? floatval($_GET['taxa']) : null;
    $operacao = $_GET['operacao'] ?? null;

    // Funções para cálculos
    function calculoJuros($capital, $prazo, $taxa) {
        return $capital * $prazo * $taxa;
    }

    function calculoCapital($juros, $prazo, $taxa) {
        return $juros / ($prazo * $taxa);
    }

    function calculoPrazo($juros, $capital, $taxa) {
        return $juros / ($capital * $taxa);
    }
    
    function calculoTaxa($juros, $capital, $prazo) {
        return $juros / ($capital * $prazo);
    }

    // Verifica a operação e calcula
    if ($operacao) {
        switch ($operacao) {
            case 'juros':
                if ($capital && $prazo && $taxa) {
                    $resultado = calculoJuros($capital, $prazo, $taxa);
                    echo "<h1>Seus juros são de: " . number_format($resultado, 2) . "</h1>";
                } else {
                    echo "<h1>Preencha Capital, Prazo e Taxa!</h1>";
                }
                break;
            case 'capital':
                if ($juros && $prazo && $taxa) {
                    $resultado = calculoCapital($juros, $prazo, $taxa);
                    echo "<h1>Seu capital é de: " . number_format($resultado, 2) . "</h1>";
                } else {
                    echo "<h1>Preencha Juros, Prazo e Taxa!</h1>";
                }
                break;
            case 'prazo':
                if ($juros && $capital && $taxa) {
                    $resultado = calculoPrazo($juros, $capital, $taxa);
                    echo "<h1>Seu prazo é de: " . number_format($resultado, 2) . "</h1>";
                } else {
                    echo "<h1>Preencha Juros, Capital e Taxa!</h1>";
                }
                break;
            case 'taxa':
                if ($juros && $capital && $prazo) {
                    $resultado = calculoTaxa($juros, $capital, $prazo);
                    echo "<h1>Sua taxa é de: " . number_format($resultado, 2) . "</h1>";
                } else {
                    echo "<h1>Preencha Juros, Capital e Prazo!</h1>";
                }
                break;
        }
    }
}
?>
</body>
</html>
