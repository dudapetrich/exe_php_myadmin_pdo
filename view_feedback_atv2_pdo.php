<!DOCTYPE html>

<html> <head>
<meta charset="utf-8" />

<title>Tabela</title>

</head> <body>
<h1>Tabela</h1>

<?php
//Database connection details to mySQL
$dbhost = 'localhost';
$dbuser = 'aluno'; 
$dbpassword = 'aluno'; 
$dbname = 'atv_duda_prt_042_bd';
try {
//Efetua a conexão com BD
$conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
//Create the SQL query
$query = "SELECT user_id, testID, nome, idade FROM teste1";
//Executa a Query
$consulta = $conx->query($query);
while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $table[] = $row;
    }
    ?>

<table>
<tr>
<td><strong>Test ID</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Nome</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Idade</strong></td>
<td width="10">&nbsp;</td>

</tr>
<?php
//Verifica se há linhas para exibir
if ($table) {
    //Recupera cada elemento da array
    foreach($table as $d_row) {
    
    ?>

<tr>
<td><?php echo($d_row["testID"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["nome"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["idade"]); ?></td>
<td width="10">&nbsp;</td>
</tr>

<?php
}
}
?>
</table>
<?php
$number_regs = $consulta->rowCount();
?>
<p>Número de Registros : <?php echo $number_regs; ?></p>

<?php
//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}
?>
</body>
</html>