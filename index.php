<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php

if (isset($_GET["requisitarcodigo"])){
//$result=shell_exec("sudo yowsup-cli registration -E android --requestcode voice --phone " .$_GET["telefone"] ." --cc " .$_GET["cc"] ."");

$fp = fopen("./requestcod.log", "r");
$resultado = "";
while (!feof($fp)){
$resultado .= fgets($fp);
}
fclose($fp);
$resultado = explode('"',$resultado);
$resultado = "login: ".$resultado[3]."  Status: ".$resultado[7]." Motivo:" .$resultado[11]."";

echo("<script language='JavaScript'>
  var width = 900;
  var height = 200;

  var left = 99;
  var top = 99;
  janela = window.open('requestcod.log','status', 'width='+width+', height='+height+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
</script>
");
/*
echo("<script language=\"javascript\">");
echo("window.alert(' " .$char. " ')");
echo("</script>");
*/
}
?>

<?php
if (isset($_GET["registrar"])){
//$result=shell_exec("sudo yowsup-cli registration -E android --phone " .$_GET["telefone"] ." --cc " .$_GET["cc"] ." --register " .$_GET["codigo_whats"] ." | tail -n 10");
//$arquivo="`date +%d%m%Y%H%M`.log";
//exec("echo >> registrar-".$arquivo."\.log");
$result=" " .$_GET["telefone"] ." --cc " .$_GET["cc"] ." --register " .$_GET["codigo_whats"] ."";
}
?>

<?php
if (isset($_GET["enviar_msg"])){
// Definição de variáveis.
$usuario=($_REQUEST["id"]);
$senha=($_REQUEST["pw"]);
$to=($_REQUEST["to"]);
$msg=($_REQUEST["msg"]);

// Tratamento da mensagem para evitar erros no envio.
//$mensagem=(tratarmsg($msg));
$mensagem=$msg;
//$mensagem=iconv("UTF-8" , "ASCII//TRANSLIT//IGNORE" , $mensagem);
$mensagem=(trim($mensagem));
$mensagem=(ucfirst($mensagem));

// Tratamento do destino: remoção do número 9 adicional.
//$destino=(substr($to,0,4)).(substr($to,5,8));

// Envio da mensagem pelo whatsapp.
$result = shell_exec("sudo yowsup-cli demos -l $usuario:$senha --send $to \"$mensagem\"");
sleep(rand(1,3));
}
?>

<html>
	<head>
		<title>C-3PO - Whatsapp</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner" style="background: color url('./images/pic01.jpg')">
					<nav>
						<ul>
							<li><a href="#intro">Bem vindo!</a></li>
							<li><a href="#one">Primeiro passo</a></li>
							<li><a href="#two">Último passo</a></li>
							<li><a href="#three">Funcionou?</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">



				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Cadastro de novo chip GSM para utilizar Whatsapp no servidor C-3PO.</h1>
							<p style="text-align: justify;">Com auxílio deste sítio, você poderá cadastrar número móvel (chip GSM) no serviço oficial do Whatsapp. No final você terá um <b>login</b> e uma <b>senha</b> disponíveis para utilizar no MK-AUTH.</p>
						</div>
					</section>



				<!-- Requisitar código -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<div class="content">
								<div class="inner">
									<h2>Requisitar código de verificação</h2>
									<p style="text-align: justify;"> 1º Ligar celular com chip GSM que você deseja ativar o Whats.<br>
									2º Preencher código do país (Ex.: <b>55</b>) e o nº do telefone (Ex.<b> 5584999552565</b>). <b>Somente nesse passo utilize o 9 adicional.</b><br>
									3º Click em <b>Requisitar código</b>. Aguarde um minuto para efetuar nova tentativa caso SMS não seja entregue. Diante de negativas de entrega, considere o chip bloqueado ou algum tipo de problema/configuração no celular/operadora.<br>
								<section>
									<form method="get" action="index.php" onsubmit="abrir()">
										<div class="field">
											<ul class="row">
												<label for="name">Código do país. Ex.: <b>55</b></label>
												<input type="text" name="cc" id="cc" value="55" />
												<label for="telefone">Número do telefone: Ex.: <b>5584988547430</b></label>
												<input type="text" name="telefone" id="telefone" />
											</ul>
										</div>
										<div class="field full">
											<ul class="actions">
												<li><input type="submit" value="Requisitar código" class="field first special" name="requisitarcodigo"/></li>
												<li><input type="reset" value="Limpar" class="field last special"/></li>
											</ul>
										</div>	
									</form>
								</section>
									</p>
								</div>
							</div>
						</section>
					</section>

				<!-- Registrar serviço WHATSAPP-->
					<section id="two" class="wrapper style2 spotlights">
						<div class="inner">
							<h2>Ativando Whatsapp no chip GSM</h2>
							<p style="text-align: justify;">De posse do código, preencher formulário. Atenção: <b>Dessa vez não adicionar o número 9 ao celular.</b><br>Ex. Código do país = <b>55</b> Telefone: <b> 558488547430</b> Código Whatsapp = <b>624857</b>.</p>
						<section>
							<form method="get" action="index.php">
								<div class="field">
									<ul class="row">
										<label for="name">Código do país. Ex.: <b>55</b></label>
										<input type="text" name="cc" id="cc" value="55" />
										<label for="telefone">Número do telefone: Ex.: <b>558488547430</b></label>
										<input type="text" name="telefone" id="telefone" />
										<label for="telefone">Código: Ex.:<b>684758</b></label>
										<input type="text" name="codigo_whats" id="codigo_whats" />
									</ul>
								</div>
								<div class="field full">
									<ul class="actions">
										<li><input type="submit" value="Registrar" class="field first special" name="registrar" id="registrar"/></li>
										<li><input type="reset" value="Limpar" class="field last special"/></li>
									</ul>
								</div>	
							</form>
						</section>
						</div>
					</section>

				<!-- Enviar mensagem -->
					<section id="three" class="wrapper style1 fullscreen fade-down">
						<div class="inner">
							<h2>Enviando mensagem</h2>
							<div class="split style1">
								<section>
									<form method="get" action="index.php">
										<div class="field half first">
											<label for="name">Login</label>
											<input type="text" name="id" id="id" />
										</div>
										<div class="field half">
											<label for="pw">Senha</label>
											<input type="text" name="pw" id="pw" />
										</div>
										<div class="field">
											<label for="message">Mensagem</label>
											<textarea name="msg" id="msg" rows="3" /></textarea>
										</div>
										<div class="field full">
											<label for="to">Destino (Ex. 558488547430)</label>
											<input type="text" name="to" id="to" />
										</div>
										<div class="field full">
											<ul class="actions">
												<input type="submit" value="Enviar" class="field first special" name="enviar_msg" id="enviar_msg"/>
												<input type="reset" value="Limpar" class="field last special"/>
											</ul>
										</div>	
									</form>
								</section>
							<p style="text-align: justify;">Evitar utilização de caracteres especiais no texto da mensagem. Preecher o formulário com <b>login</b> e <b>senha</b>. Não use 9 adicional no Login nem no número de destino. Ex.: <b>558488547430</b></p>
						</div>
					</section>

			</div>

			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>