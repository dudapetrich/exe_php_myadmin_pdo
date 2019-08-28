<?php
//Obtém os valores do formulário
$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Escola = $_POST['Escola'];
$Estado = $_POST ['Estado'];
$Funcao = $_POST ['Funcao'];
$Nome_Equipe = $_POST ['Nome_Equipe'];
//Conectar–se ao BD
$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_duda_prt_041_bd';
try {
    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    //Cria a Query SQL
    $query = "INSERT INTO Membros (Nome, Email, Escola, Estado, Funcao, Nome_Equipe) VALUES ('$Nome', '$Email', '$Escola', '$Estado', '$Funcao', '$Nome_Equipe')";
    //Executa a Query
    $conx->exec($query);
    echo "Registro inserido com sucesso";
    //Fecha a conexão
    $conx = null;
    } catch (PDOException $e) {echo "Conexão falhou: " . $e->getMessage();
    }
