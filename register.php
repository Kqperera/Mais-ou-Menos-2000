<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Criar conta</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php

            include("php/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                //verifying the unique email

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                      <p>Esse email já esta sendo utilizado, tente outro.</p>
                  </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Voltar</button>";
                } else {

                    mysqli_query($con, "INSERT INTO users(Usuario,Email,Idade,Password) VALUES('$username','$email','$age','$password')") or die("Algo de inesperado ocorreu.");

                    echo "<div class='message'>
                      <p>Cadastro concluido</p>
                  </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Entre na sua conta</button>";
                }
            } else {

            ?>

                <header>Criar conta</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Usuário</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Idade</label>
                        <input type="number" name="age" id="age" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Criar conta" required>
                    </div>
                    <div class="links">
                        Já possui conta? <a href="index.php">Entrar</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>