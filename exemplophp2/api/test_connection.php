<?php
require 'api/connect.php';

if($con) {
    echo "Conexão estabelecida com sucesso!";
} else {
    echo "Falha na conexão.";
}
?>
