<?php
session_start();

$votos = $_SESSION['votos'] ?? [];

$cargos = [
"Deputado Estadual",
"Deputado Federal",
"1° Senador",
"2° Senador",
"Governador",
"Presidente"
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Comprovante de Votação</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>

<h1>Comprovante de Votação</h1>

<p>Simulação de eleição</p>

</header>

<main class="card recebido">

<h1>Seus votos computados:</h1>

<?php foreach($cargos as $cargo): ?>

<div class="voto">

<span>
<?=htmlspecialchars($cargo)?>
</span>

<strong>

<?php if (($votos[$cargo] ?? '') === 'Branco'): ?>

Branco

<?php else: ?>

n°<?=htmlspecialchars($votos[$cargo] ?? '')?>

<?php endif; ?>

</strong>

</div>

<?php endforeach; ?>

<a class="link" href="index.php">
Voltar ao início
</a>

</main>

</body>

</html>