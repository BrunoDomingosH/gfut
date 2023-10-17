<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="teste.css">
</head>
<body>
<?php
include("conecta.php");
$comando = $pdo->prepare("SELECT * FROM jogos_gerais ");
$resultado = $comando->execute();
echo("<div class=\"divp4\">");

$count = 0; // contador para controlar o número de elementos por linha

while ($linhas = $comando->fetch()) {
    
  
    $dados_imagem1 = $linhas["time_casa"];
    $dados_imagem = $linhas["time_adv"];
    $time_casa = base64_encode($dados_imagem1);
    $time_adv = base64_encode($dados_imagem);
    $especificacao = $linhas['especificacao'];
   

    if ($count % 2 === 0) {
        // Início da linha
        echo "<div class=\"row\">";
    }

    echo ("
    <div class=\"a1\">
    <div class=\"a2\">$especificacao</div>
        <a href=\"espc_jogo.php\">
        <div class=\"a4\">
            <div class=\"a5\"> <img src='data:image/jpeg;base64,$time_casa' width='40px'></div>
            <div class=\"a6\"><div class=\"x\">X</div></div>
            <div class=\"a5\"> <img src='data:image/jpeg;base64,$time_adv' width='40px'></div>
        </div>
        </a>
    </div>
    <br>");

    $count++;

    if ($count % 2 === 0 || $count === $resultado) {
        // Fim da linha
        echo "</div>";
    }
}

echo("</div>");
?>
</body>
</html>