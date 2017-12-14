<form method="GET" action="requisitarcodigo.php">
Código do Pais (Ex.: <b>55</b>):<br>
<input type="text" name="cc"><br><br>
DDD+Telefone (Ex.:<b>84999552565</b>):<br>
<input type="text" name="phone"><br>
Obs.: Aqui deve ser usar o 9 adicional.<br>
Você precisa receber um SMS!<br>
<br><br>
<input type="submit" name="Enviar" value="Solicitar Código"><br><br>
<i><b>Após clickar em solicitar código veja se recebeu um SMS no celular que está com o chip GSM. Caso não tenha chegado, aguarde pelo menos 60 segundos para
efetuar nova tentativa.</b></i><br>

<br><b>Resultado:</b><br>
</form>

<?php
if (isset($_GET["Enviar"])){
$result = shell_exec("sudo yowsup-cli registration --requestcode sms --phone " .$_GET["phone"] ." --cc " .$_GET["cc"] ." | tail -n 4");
echo "<pre>$result</pre>";
}
?>
