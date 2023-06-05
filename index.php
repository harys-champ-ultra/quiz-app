<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | User</title>
    <link rel="shortcut icon" href="./img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./"><img src="./img/logo.svg" alt="Quiz App"></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <h1>You are?</h1>
            <p>choose the user preference</p>
            <ul class="stack">
                <li><button class="solid" onclick="window.location.href='./people/';">
                    <img src="./img/people.svg" alt="People">
                    People
                </button></li>
                <li><button class="transparent" onclick="window.location.href='./admin/';">
                    <img src="./img/admin.svg" alt="Admin">
                    Admin
                </button></li>
            </ul>
        </div>
    </main>
</body>
</html>