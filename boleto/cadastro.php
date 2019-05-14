<?php
$banco = $_POST['banco'];
if ($banco == ""){
echo"<script language='javascript'>alert('Escolha um Banco');history.go(-1);</script>";
}
?>
<title>Dados do Documento</title>
<body bgcolor="#cccccc">
<center>
<font color="#002244" size=4 face="verdana">Dados do Documento</font><P>
<table border=0 width=30%>
<tr>
<td>
<form method=POST action="boleto_<? echo"$banco"; ?>.php">
Valor do Boleto:<br>
<input type=text name=valor size=20><br>
Nome:<br>
<input type=text name=nome size=40><br>
RG:<br>
<input type=text name=rg size=40><br>
Endereço:<br>
<input type=text name=endereco size=40><br>
Cidade:<br>
<input type=text name=cidade size=40><br>
Estado:<br>
<select name="estado" class="textobox"><option value="">Escolha aqui</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="RS">RS</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
</select><br>
CEP:<br>
<input type=text name=cep><p>
<center><input type=submit value="GERAR BOLETO"></center>
</form>
</td>
</tr>
</table>
</center>
</html>