<?php
session_start();

$candidatos = [
"676"=>["Luiza Ferreira","PSOL"],
"100"=>["Marcos Ribeiro","PDT"],
"455"=>["Sofia Mendes","UNIÃO"]
];

if (!isset($_SESSION['votos'])) {
    $_SESSION['votos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $acao = $_POST['acao'] ?? '';
    $numero = $_POST['numero'] ?? '';

    if ($acao === 'branco') {
        $_SESSION['votos']['2° Senador'] = 'Branco';
        header('Location: governador.php');
        exit;
    }

    if ($acao === 'confirmar' && isset($candidatos[$numero])) {
        $_SESSION['votos']['2° Senador'] = $numero;
        header('Location: governador.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>2° Senador</title>
<link rel="stylesheet" href="estilo.css">
</head>

<body>

<header>
<h1>Urna Eletrônica</h1>
<p>Simulação de votação</p>
</header>

<main class="urna">

<section class="tela">

<h2>2° Senador</h2>

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

<button type="button" class="acao branco" onclick="branco()">BRANCO</button>
<button type="button" class="acao corrige" onclick="corrigir()">CORRIGE</button>
<button type="submit" id="confirmar" class="acao confirma" disabled>CONFIRMA</button>

</div>

</form>

</main>

<script>

const candidatos = {
"676":{nome:"Luiza Ferreira",partido:"PSOL"},
"100":{nome:"Marcos Ribeiro",partido:"PDT"},
"455":{nome:"Sofia Mendes",partido:"UNIÃO"}
};

const totalDigitos = 3;

let numero = "";

function atualizar(){

document.getElementById("numero").textContent = numero;

document.getElementById("numeroInput").value = numero;

let candidato = document.getElementById("candidato");
let status = document.getElementById("status");
let confirmar = document.getElementById("confirmar");

confirmar.disabled = !candidatos[numero];

if(numero.length === 0){

candidato.textContent = "";
status.textContent = "";
return;

}

if(numero.length < totalDigitos){

candidato.textContent = "";
status.textContent = "NÚMERO INCOMPLETO";
status.className = "status invalido";
return;

}

if(candidatos[numero]){

candidato.innerHTML =
"<strong>"+candidatos[numero].nome+"</strong><br>Partido: "+
candidatos[numero].partido;

status.textContent = "NÚMERO VÁLIDO";
status.className = "status valido";

}else{

candidato.textContent = "";
status.textContent = "NÚMERO INVÁLIDO";
status.className = "status invalido";

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

document.getElementById("acao").value = "branco";
document.getElementById("formVoto").submit();

}

document.getElementById("formVoto").addEventListener("submit",function(e){

if(!candidatos[numero]){

e.preventDefault();
return;

}

document.getElementById("acao").value = "confirmar";

});

atualizar();

</script>

</body>
</html>