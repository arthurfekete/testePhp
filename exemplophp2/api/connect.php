<?php
$host = getenv('POSTGRES_HOST'); // ep-lingering-union-a41cw3i9-pooler.us-east-1.aws.neon.tech
$port = getenv('5432'); // 5432
$dbname = getenv('POSTGRES_DATABASE'); // verceldb
$user = getenv('POSTGRES_USER'); // default
$password = getenv('POSTGRES_PASSWORD'); // DUatHxTFC4m9

$dsn = 'pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname;

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!"; // Comentar essa linha após o teste
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
