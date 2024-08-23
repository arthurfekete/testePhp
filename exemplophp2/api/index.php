<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>CPR - Contas a Pagar</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="./login.php" method="post">
                <h1 style="margin-bottom: 15px;">Login</h1>
                <input type="email" name="email" placeholder="Email" style="border: 1px solid rgba(0, 0, 0, 0.3);"
                    required>
                <input type="password" name="senha" placeholder="Senha" style="border: 1px solid rgba(0, 0, 0, 0.3);"
                    required>
                <a href="./senha.php" style="margin-top: 15px;">Esqueceu sua senha?</a>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
    <script src="../script.js"></script>
</body>

</html>