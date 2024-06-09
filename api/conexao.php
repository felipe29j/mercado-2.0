<?php
$host = 'localhost';
$port = '5432'; // Altere para a porta correta, se necessário porta padrão: 5432 afim de testes fiz na porta 8080
$dbname = 'mercado';
$username = 'seu_username';
$password = 'seu_password';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
