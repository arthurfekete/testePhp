<?php
session_start();
include ('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Menu</title>
    <style>
        body {
            background-color: #7d63bf;
        }

        .container-custom {
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 50px;
            border-radius: 20px;
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-custom {
            width: 150px;
            height: 100px;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            text-align: center;
            padding: 0;
        }

        .btn-custom h4 {
            margin: 0;
            font-size: 1.25rem;
        }

        .row {
            width: 100%;
        }

        .row>.col-md-6 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .row>.col-md-6 h4 {
            margin-bottom: 20px;
        }

        .btn-custom {
            margin: 10px 0;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container container-custom">
        <h3 class="display-8">Menu</h3>
        <p class="lead">Seja bem-vindo(a), <?php echo $_SESSION['nome']; ?>!</p>
        <div class="row">
            <div class="col-md-6">
                <h4>Entrada</h4>
                <button class="btn btn-custom">
                    Pessoas
                </button>
                <button class="btn btn-custom">
                    Entradas
                </button>
            </div>
            <div class="col-md-6">
                <h4>Saídas</h4>
                <button class="btn btn-custom">
                    Fornecedores
                </button>
                <button class="btn btn-custom">
                    Saídas
                </button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Consultas</h4>
                <button class="btn btn-custom">
                    Consulta Geral
                </button>
                <button class="btn btn-custom">
                    Dashboard
                </button>
            </div>
            <div class="col-md-6">
                <h4>Usuários</h4>
                <a href="cliselect.php" class="btn btn-custom">
                    Usuários
                </a>
            </div>
        </div>
        <br>
        <a href="logout.php" class="btn btn-danger mt-3">Sair</a>
    </div>
</body>

</html>