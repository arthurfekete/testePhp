<?php
session_start();
include ('verifica_login.php');
include ('connect.php');
$sql = "SELECT u.id id, u.nome nome, u.email email, REPLACE(REPLACE(u.master, 's' ,'SIM'), 'n', 'NÃO') master FROM usuario u ORDER BY 1";
$pesqnome = '';
if (isset($_POST['submit'])) {
    $pesqnome = $_POST['pesqnome'];
    $sql = "SELECT u.id id, u.nome nome, u.email email, u.master master FROM usuario u
    WHERE u.nome LIKE '%$pesqnome%'
    ORDER BY 1";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <title>Usuários</title>
    <style>
        body {
            background-color: #38404f;
        }

        h4 {
            font-family: Arial, Helvetica, sans-serif
        }
        
    </style>
</head>

<body>
    <div class="row" style="background-color: #38404f; margin-bottom: 30px; color: white;">
        <div class="col" style="padding: 10px; left: 20px;">
            <h4 style="margin-top: 30px; margin-left: 20px;">
                <?php echo $_SESSION['nome']; ?>
            </h4>
        </div>
        <div class="col text-right" style="padding: 19px; right: 20px;">
            <a href="logout.php"><button type="button" class="btn btn-danger"
                    style="border-radius: 10px; margin-top: 10px;">Sair</button></a>
        </div>
    </div>
    <form method="post">
        <div class="container" style="margin-top: 40px;">
            <div class="jumbotron text-center">
                <h4>Consulta Usuário</h4>
                <hr>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-7 text-right">
                        <label for="">Nome Parcial:</label>
                        <input type="text" name="pesqnome" style="width: 300px; padding: 9px; margin-left: 4px; margin-right: -10px; border-radius: 10px;" placeholder="Nome..."
                            value="<?php echo $pesqnome ?>">
                    </div>
                    <div class="col text-left">
                        <button type="submit" name="submit" style="width: 150px; padding: 9px;"
                            class="btn btn-dark">Consulta</button>
                    </div>
                </div>
                <?php
                if ($_SESSION['master'] == "s") {
                    echo '<div class="row" style="margin-top: 35px;">
        <div class="col-5 text-right">
            <a href="menu.php"><button type="button" style="padding: 7px; width: 100px;"
                    class="btn btn-info">Menu</button></a>
        </div>
        <div class="col">
            <a href="usuinsert.php"><button type="button" style="padding: 7px; width: 100px;"
                    class="btn btn-secondary">Inclusão</button></a>
        </div>
        <div class="col-5 text-left">
            <a href="ususelect.php"><button type="button" style="padding: 7px; width: 100px;"
                    class="btn btn-danger">Limpar</button></a>
        </div>
    </div>';
                } else {
                    echo '<div class="row" style="margin-top: 35px;">
        <div class="col text-center">
            <a href="menu.php"><button type="button" style="padding: 7px; width: 100px;"
                    class="btn btn-secondary">Menu</button></a>
        </div></div>';
                }
                ?>
            </div>

            <table class="table table-bordered" style="background-color: white; opacity: 94%; text-align: center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Detalhes</th>
                        <?php
                        if ($_SESSION['master'] == "s") {
                            echo '<th scope="col">Operações</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
              <td>" . $row['id'] . " </td>
              <td>" . $row['nome'] . " </td>
              <td>" . $row['email'] . " </td>
              <td>" . $row['master'] . " </td>
            <td>
            <a href='ususelected.php?selectid={$row['id']}' style='color:white;'>
                        <button type='button' class='btn btn-secondary'> 
                        Ver Mais</button></a>
            </td>";
                            if ($_SESSION['master'] == "s") {
                                echo "<td>
                <a href='usuupdated.php?updateid={$row['id']}' style='color:white;'>
                <button type='button' class='btn btn-primary'> 
                Alterar</button></a>
                <a href='usudeleted.php?deleteid={$row['id']}' style='color:white;'>
                <button type='button' class='btn btn-danger'> 
                Excluir</button></a>
                    </td></tr>";
                            } else {
                                echo "</tr>";
                            }
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </form>
</body>

</html>