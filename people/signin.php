<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Sign In</title>
    <link rel="shortcut icon" href="../img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./"><img src="../img/logo.svg" alt="Quiz App"></a></li>
            </ul>
            <ul>
                <li><a href="../">Switch User</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <h1>Sign in to your account</h1>
            <p>or <a href="signup.php">create an account</a></p>
            <form action="../inc/pin.php" method="post">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="submit" value="Sign in" name="signin">
            </form>
        </div>
    </main>
</body>
</html>