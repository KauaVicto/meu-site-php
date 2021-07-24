<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Log in</title>
</head>
<body>
    <main class="container">
        <section class="login">
            <h1>Log in</h1>
            <form action="login.php" method="post">

                <div class="campos">
                    <label for="login" class="labellogin">Login</label>
                    <input type="text" name="login" id="login" class="inputs">
                </div>
                
                <div class="campos">
                    <label for="pass" class="labellogin">Senha</label>
                    <input type="password" name="pass" id="pass" class="inputs">
                </div>
                <button type="submit" id="btnlogin">Log in</button>
                <div class="oulogin">
                    <span>ou</span>
                </div>
                <div id="btngoogle">Google</div>                
            </form>

        </section>

        <div class="separador"></div>

        <section class="login">

        </section>
    </main>

    <script src="js/login.js"></script>
</body>
</html>