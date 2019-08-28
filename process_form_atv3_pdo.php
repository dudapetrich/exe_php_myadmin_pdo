<?php
//Obtém os valores do formulário
$fabricante = $_POST['fabricante'];
$ano_fabricacao = $_POST['ano_fabricacao'];
$quilometragem = $_POST['quilometragem'];
//Conectar–se ao BD
$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_duda_prt_043_bd';
try {
    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
   
//Cria a Query SQL
$query = "INSERT INTO autos (fabricante, ano_fabricacao, quilometragem) VALUES ('$fabricante', '$ano_fabricacao', '$quilometragem')";
 //Executa a Query
 $conx->exec($query);
 echo "Registro inserido com sucesso";
 //Fecha a conexão
 $conx = null;
 } catch (PDOException $e) {echo "Conexão falhou: " . $e->getMessage();
 }