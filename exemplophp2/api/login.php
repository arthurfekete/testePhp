<?php
session_start();
include('connect.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

try {
    $query = $pdo->prepare("SELECT email, nome, master FROM usuario WHERE email = :email AND senha = :senha");
    $query->bindParam(':email', $email);
    $query->bindParam(':senha', $senha);
    $query->execute();

    $valores = $query->fetch(PDO::FETCH_ASSOC);

    if ($valores) {
        $_SESSION['nome'] = $valores['nome'];
        $_SESSION['email'] = $valores['email'];
        $_SESSION['master'] = $valores['master'];
        header('Location: menu.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
} catch (PDOException $e) {
    die('Query Failed: ' . $e->getMessage());
}
?>
