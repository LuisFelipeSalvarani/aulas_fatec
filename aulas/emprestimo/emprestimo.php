<?php

$nome = $_POST['nome'];
$radio = $_POST['radio'];
$score = $_POST['score'];
$valor = $_POST['valor'];
$parcelas = $_POST['parcelas'];
$seguro = $_POST['seguro'];
$juros = 0;
$taxa = 0 ;
$iof = $valor * 0.0038;
$valor_parcelas = 0;

if($radio == 's'){

    $juros = $valor * 0.03;
    $taxa = 3;

}else{

    if($score < 300){
        $juros = $valor * 0.2;
        $taxa = 20;
    }elseif($score < 500){
        $juros = $valor * 0.15;
        $taxa = 15;
    }elseif($score < 700){
        $juros = $valor * 0.1;
        $taxa = 10;
    }else{
        $juros = $valor * 0.05;
        $taxa = 5;
    }
    
    $valor = $valor + 35;
}

$valor_final = $valor + $juros + $iof;

if($seguro == 1){
    $valor_final = $valor_final + 49.90;
}

$valor_parcelas = $valor_final / $parcelas;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Simulaçäo</title>
    <link rel="stylesheet" href="../aulas/emprestimo.css">
</head>

<body>
    <div class="box_volta">
        <h1>Seja bem-vindo(a) ao Mybank</h1>
        <h3>RESULTADO DA SIMULAÇÄO</h3>
        <div class="info">
            <div class="resultado">
                <P class="bold">Valor das parcelas: R$<?= number_format($valor_parcelas, 2); ?> </P>
                <p class="bold">Quantidade de parcelas: <?= $parcelas; ?></p>
                <p class="juros">Taxa de juros: <?= $taxa; ?>%</p>
                <p class="bold">Custo Efetivo Total: R$ <?= number_format($valor_final, 2); ?></p>
            </div>
        </div>
    </div>
</body>

</html>