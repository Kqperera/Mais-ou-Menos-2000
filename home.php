<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Inicio</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Usuario = $result['Usuario'];
                $res_Email = $result['Email'];
                $res_idade = $result['Idade'];
                $res_id = $result['Id'];
            }

            echo "<a href='edit.php?Id=$res_id'>Trocar de Conta</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Sair da conta</button> </a>

        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Olá <b><?php echo $res_Usuario ?></b>, Bem-Vindo</p>
                </div>
                <div class="box">
                    <p>Seu email é <b><?php echo $res_Email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>e você tem <b><?php echo $res_idade ?> anos de idade</b>.</p>
                </div>
                <div class="bottom">
                    <div class="box">
                        <p><b><a href='./index.html'>Ir ao Site</a></b></p>
                    </div>
                </div>
            </div>

    </main>
</body>

</html>