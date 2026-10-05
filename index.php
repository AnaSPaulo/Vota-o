<?php
$candidatos = [
"Deputado Estadual"=>[
["33011","João Pereira","PSTU","Professor e defensor de políticas públicas voltadas à educação e aos trabalhadores."],
["45678","Maria Silva","MDB","Advogada com atuação em projetos comunitários e defesa dos serviços públicos."],
["12345","Carlos Andrade","PT","Economista que trabalha com propostas de desenvolvimento social e geração de empregos."]
],
"Deputado Federal"=>[
["3311","Ana Costa","PT","Professora e pesquisadora, com propostas voltadas à educação e à ciência."],
["4567","Bruno Lima","PSDB","Administrador público que atua em projetos de modernização e transparência."],
["2299","Fernanda Souza","PL","Empresária e defensora de iniciativas para pequenos negócios e empreendedorismo."]
],
"1° Senador"=>[
["777","Ricardo Alves","MDB","Engenheiro e gestor público com experiência em projetos de infraestrutura."],
["202","Patrícia Gomes","PSL","Advogada dedicada a propostas de segurança, cidadania e eficiência administrativa."],
["131","Henrique Dias","PT","Sociólogo e professor que defende políticas de inclusão e desenvolvimento regional."]
],
"2° Senador"=>[
["676","Luiza Ferreira","PSOL","Assistente social com atuação em direitos humanos e políticas de inclusão."],
["100","Marcos Ribeiro","PDT","Servidor público e especialista em administração municipal e desenvolvimento local."],
["455","Sofia Mendes","UNIÃO","Jornalista e gestora de projetos voltados à inovação e à participação cidadã."]
],
"Governador"=>[
["76","Tarcísio Neto","Republicanos","Empresário e gestor com propostas para infraestrutura, saúde e desenvolvimento estadual."],
["13","Lúcia Santos","PT","Professora e ex-secretária municipal, com foco em educação e políticas sociais."],
["45","Roberto Castro","PSDB","Economista e administrador com experiência em planejamento e gestão pública."]
],
"Presidente"=>[
["67","Felipe Andrade","Cidadania","Professor universitário e pesquisador que defende educação, inovação e responsabilidade fiscal."],
["13","Marina Lopes","PT","Médica e gestora pública que apresenta propostas para saúde e redução das desigualdades."],
["22","Décio Ramos","PL","Empresário do setor industrial com propostas para economia, infraestrutura e emprego."]
]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Eleição Nacional 2026</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
<h1>Sistema de Votação</h1>
<p>Eleição Nacional — candidatos fictícios</p>
</header>

<main class="container">

<section class="card">
<h2>Informações sobre a eleição</h2>
<p class="info">
Esta é uma simulação de votação inspirada no funcionamento da urna eletrônica brasileira.
Todos os candidatos e partidos apresentados neste sistema são fictícios.
O eleitor deverá votar nos cargos na ordem indicada e, ao final, receberá um comprovante com os votos registrados.
</p>
</section>

<?php foreach($candidatos as $cargo=>$lista): ?>

<section class="card">

<h2><?=htmlspecialchars($cargo)?></h2>

<div class="cargos">

<?php foreach($lista as $c): ?>

<article class="candidato">

<h3><?=htmlspecialchars($c[1])?></h3>

<p class="numero">
Número: <?=htmlspecialchars($c[0])?>
</p>

<p class="partido">
Partido: <?=htmlspecialchars($c[2])?>
</p>

<p>
<?=htmlspecialchars($c[3])?>
</p>

</article>

<?php endforeach; ?>

</div>

</section>

<?php endforeach; ?>

<a class="link" href="estadual.php">Iniciar votação</a>

</main>

</body>
</html>                                                                                                                                 