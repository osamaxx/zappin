<?php header("Content-type: text/html; charset=utf-8");
$usuario=($_REQUEST["u"]);
$senha=($_REQUEST["p"]);
$to=($_REQUEST["to"]);
$msg=($_REQUEST["msg"]);

$mensagem=$msg;
$mensagem=(trim($mensagem));
$mensagem=(ucfirst($mensagem));

$destino=(substr($to,0,4)).(substr($to,5,8));

// Envio da mensagem pelo whatsapp.
$result = shell_exec("sudo yowsup-cli demos -l $usuario:$senha --send $destino \"$mensagem\"");
sleep(rand(7,30));
?>
