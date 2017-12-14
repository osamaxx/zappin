<form method="GET" action="manual.php">

Login[Whatsapp Origem]:<br>
<input type="text" name="login"><br><br>
Senha:<br>
<input type="text" name="senha"><br><br>
Destino[Substituir XXXXXXXX] [Não usar 9 adicional]:<br>
<input type="text" name="destino" value="5584XXXXXXXX"><br><br>
Mensagem:<br>
<input type="text" name="mensagem" value=""><br><br>

<input type="submit" name="Enviar" value="Enviar"><br><br>
Resultado:<br>

</form>

<?php header("Content-type: text/html; charset=utf-8");
if (isset($_GET["Enviar"])){
$result = shell_exec("sudo yowsup-cli demos -l " .$_GET["login"] .":" .$_GET["senha"] ." --send " .$_GET["destino"] ." \"" .$_GET["mensagem"] ."\"");
echo "<pre>$result</pre>";
}
?>
