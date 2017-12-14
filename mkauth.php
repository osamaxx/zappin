<?php header("Content-type: text/html; charset=utf-8");

/* function tratarmsg($str) {
    $retorno = preg_replace('/[áàãâä]/ui', 'a', $str);
    $retorno = preg_replace('/[éèêë]/ui', 'e', $str);
    $retorno = preg_replace('/[íìîï]/ui', 'i', $str);
    $retorno = preg_replace('/[óòõôö]/ui', 'o', $str);
    $retorno = preg_replace('/[úùûü]/ui', 'u', $str);
    $retorno = preg_replace('/[ç]/ui', 'c', $str);
    //$retorno = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
    $retorno = preg_replace('/[^a-z0-9]/i', '_', $str);
    $retorno = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
    return $retorno;
}
*/

// Definição de variáveis.
$usuario=($_REQUEST["u"]);
$senha=($_REQUEST["p"]);
$to=($_REQUEST["to"]);
$msg=($_REQUEST["msg"]);

// Tratamento da mensagem para evitar erros no envio.
//$mensagem=(tratarmsg($msg));
$mensagem=$msg;
//$mensagem=iconv("UTF-8" , "ASCII//TRANSLIT//IGNORE" , $mensagem);
$mensagem=(trim($mensagem));
$mensagem=(ucfirst($mensagem));

// Tratamento do destino: remoção do número 9 adicional.
$destino=(substr($to,0,4)).(substr($to,5,8));

// Envio da mensagem pelo whatsapp.
$result = shell_exec("sudo yowsup-cli demos -l $usuario:$senha --send $destino \"$mensagem\"");
sleep(rand(7,30));
?>
