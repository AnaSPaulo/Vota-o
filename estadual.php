<?php
session_start();

$candidatos = [
"33011"=>["João Pereira","PSTU"],
"45678"=>["Maria Silva","MDB"],
"12345"=>["Carlos Andrade","PT"]
];

if (!isset($_SESSION['votos'])) {
    $_SESSION['votos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $acao = $_POST['acao'] ?? '';
    $numero = $_POST['numero'] ?? '';

    if ($acao === 'branco') {
        $_SESSION['votos']['Deputado Estadual'] = 'Branco';
        header('Location: federal.php');
        exit;
    }

    if ($acao === 'confirmar' && isset($candidatos[$numero])) {
        $_SESSION['votos']['Deputado Estadual'] = $numero;
        header('Location: federal.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Deputado Estadual</title>
<link rel="stylesheet" href="estilo.css">
</head>

<body>

<header>
<h1>Urna Eletrônica</h1>
<p>Simulação de votação</p>
</header>

<main class="urna">

<section class="tela">

<h2>Deputado Estadual</h2>

<div class="cargo-tela">
Digite o número do candidato:
</div>

<div id="numero" class="numero-digitado"></div>

<div id="candidato" class="candidato-info"></div>

<div id="status" class="status"></div>

</section>

<form method="post" id="formVoto">

<input type="hidden" name="numero" id="numeroInput">
<input type="hidden" name="acao" id="acao">

<div class="teclado">

<button type="button" class="tecla" onclick="digitar('1')">1</button>
<button type="button" class="tecla" onclick="digitar('2')">2</button>
<button type="button" class="tecla" onclick="digitar('3')">3</button>

<button type="button" class="tecla" onclick="digitar('4')">4</button>
<button type="button" class="tecla" onclick="digitar('5')">5</button>
<button type="button" class="tecla" onclick="digitar('6')">6</button>

<button type="button" class="tecla" onclick="digitar('7')">7</button>
<button type="button" class="tecla" onclick="digitar('8')">8</button>
<button type="button" class="tecla" onclick="digitar('9')">9</button>

<button type="button" class="tecla" onclick="digitar('0')">0</button>

</div>

<div class="acoes">

<button type="button" class="acao branco" onclick="branco()">
BRANCO
</button>

<button type="button" class="acao corrige" onclick="corrigir()">
CORRIGE
</button>

<button type="submit" id="confirmar" class="acao confirma" disabled>
CONFIRMA
</button>

</div>

</form>

</main>

<script>

const candidatos = {
"33011": {
nome:"João Pereira",
partido:"PSTU"
},
"45678": {
nome:"Maria Silva",
partido:"MDB"
},
"12345": {
nome:"Carlos Andrade",
partido:"PT"
}
};

const totalDigitos = 5;

let numero = "";

const numeroTela = document.getElementById("numero");
const candidatoTela = document.getElementById("candidato");
const statusTela = document.getElementById("status");
const confirmar = document.getElementById("confirmar");
const numeroInput = document.getElementById("numeroInput");
const acao = document.getElementById("acao");

function atualizar(){

numeroTela.textContent = numero;

numeroInput.value = numero;

confirmar.disabled = !candidatos[numero];

if(numero.length === 0){

candidatoTela.textContent = "";
statusTela.textContent = "";
statusTela.className = "status";

return;

}

if(numero.length < totalDigitos){

candidatoTela.textContent = "";

statusTela.textContent = "NÚMERO INCOMPLETO";

statusTela.className = "status invalido";

return;

}

if(candidatos[numero]){

candidatoTela.innerHTML =
"<strong>"+candidatos[numero].nome+"</strong><br>Partido: "+
candidatos[numero].partido;

statusTela.textContent = "NÚMERO VÁLIDO";

statusTela.className = "status valido";

}else{

candidatoTela.textContent = "";

statusTela.textContent = "NÚMERO INVÁLIDO";

statusTela.className = "status invalido";

}

}

function digitar(n){

if(numero.length < totalDigitos){

numero += n;

atualizar();

}

}

function corrigir(){

numero = "";

atualizar();

}

function branco(){

numero = "";

numeroInput.value = "";

acao.value = "branco";

document.getElementById("formVoto").submit();

}

document.getElementById("formVoto").addEventListener("submit", function(e){

if(!candidatos[numero]){

e.preventDefault();

atualizar();

return;

}

acao.value = "confirmar";

});

atualizar();

</script>

</body>
</html>