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
    <title>Trocar de Conta</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"> Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Trocar de Conta</a>
            <a href="php/logout.php"> <button class="btn">Sair da conta</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $id = $_SESSION['id'];

                $edit_query =  mysqli_query($con, "INSERT INTO users(Usuario,Email,Idade,Password) VALUES('$username','$email','$age','$password')") or die("Algo de inesperado ocorreu.");

                if ($edit_query) {
                    echo "<div class='message'>
                    <p>Perfil Atualizado!</p>
                </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Voltar à página inicial</button>";
                }
            } else {

                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id ");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['Usuario'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Idade'];
                }

            ?>
                <header>Trocar de Conta</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Usuário</label>
                        <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Idade</label>
                        <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Update" required>
                    </div>

                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>