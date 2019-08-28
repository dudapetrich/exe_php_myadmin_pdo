<?php
//Obtém os valores do formulário
$testID = $_POST['testID'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
//Conectar–se ao BD
$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_duda_prt_042_bd';
try {
    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    //Cria a Query SQL
    $query = "INSERT INTO teste1 (nome, testID, idade) VALUES ('$nome', '$testID', '$idade')";
   //Executa a Query
   $conx->exec($query);
   echo "Registro inserido com sucesso";
   //Fecha a conexão
   $conx = null;
   } catch (PDOException $e) {echo "Conexão falhou: " . $e->getMessage();
   }