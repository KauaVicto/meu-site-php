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

                <div class="input">
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login">
                </div>
                
                <div class="input">
                    <label for="pass">Senha</label>
                    <input type="password" name="pass" id="pass">
                </div>
                <button type="submit">Log in</button>
            </form>
        </section>

        <div class="separador"></div>

        <section class="login">

        </section>
    </main>
</body>
</html>