<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Sign Up</title>
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
            <h1>Create an account</h1>
            <p>or <a href="signin.php">sign in to your account</a></p>
            <form action="../inc/pup.php" method="post">
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
                <input type="submit" value="Continue" name="continue">
            </form>
        </div>
    </main>
</body>
</html>