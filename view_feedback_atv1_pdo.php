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
$dbname = 'atv_duda_prt_041_bd';
try {
    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
//Create the SQL query
$query = "SELECT Membros.Nome, Membros.Email, Membros.Escola, Escola.Estado, Membros.Funcao, Equipes.Nome_Equipe FROM Membros, Equipes, Escola Where Membros.Escola=Escola.Nome_Escola and Membros.Nome_Equipe=Equipes.Nome_Equipe";
 //Executa a Query
 $consulta = $conx->query($query);
 while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
     $table[] = $row;
     }
     ?>

<table>
<tr>
<td><strong>Nome</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Email</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Escola</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Estado</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Função</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Nome da Equipe</strong></td>
<td width="10">&nbsp;</td>
</tr><?php
//Verifica se há linhas para exibir
if ($table) {
//Recupera cada elemento da array
foreach($table as $d_row) {
?>

<tr>
<td><?php echo($d_row["Nome"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["Email"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["Escola"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["Estado"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["Funcao"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["Nome_Equipe"]); ?></td>
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