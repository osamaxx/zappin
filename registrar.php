<form method="GET" action="registrar.php">
Código Pais(Ex.:<b>55</b>):<br>
<input type="text" name="cc"><br><br>
CC+DDD+Telefone(Ex.:<b>8499552565</b>):<br>
<b>Aqui não se usa o 9 adicional.</b></br>
<input type="text" name="phone"><br><br>
Codigo (digitar somente os números. Ex.: <b>243568</b>):<br>
<input type="text" name="codigo"><br><br>
<input type="submit" name="Enviar" value="Registrar - Whatsapp"><br><br>

Após clickar no botão de registrar será executado um comando remoto. Aguarde o resultado e anote o login e pw.
Exemplo do que irá aparecer e o que deve ser anotado em negrito.
<pre>
<i>
INFO:yowsup.common.http.warequest:b'{"status":"ok","login":"558498007498","type":"new","pw":"8rnYUlAF7/lEFBMSXFm5UI+wLtk=","expiration":4444444444.0,"kind":"free","price":"$0.99","cost":"0.99","currency":"USD","price_expiration":1512330408}\n'
status: b'ok'
login: b'<b>558498007498</b>'
pw: b'<b>8rnYUlAF7/lEFBMSXFm5UI+wLtk=</b>'
type: b'new'
expiration: 4444444444.0
kind: b'free'
price: b'$0.99'
cost: b'0.99'
currency: b'USD'
price_expiration: 1512330408
</i>
</pre>
<b>Resultado do comando no servidor:</b><br>
</form>

<?php
if (isset($_GET["Enviar"])){
$result = shell_exec("sudo yowsup-cli registration --phone " .$_GET["phone"] ." --cc " .$_GET["cc"] ." --register ". $_GET["codigo"] ." | tail -n 10");
echo "<pre>$result</pre>";
}
?>
