<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $pid = $_SESSION["who"];

        $sql = "SELECT * FROM `sets`;";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Sets</title>
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
                <li><a href="../inc/signout.php">Sign out</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <h1>Choose sets</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <ul class="grid">
<?php
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
                <li><button class="solid" onclick="window.location.href='./squiz.php?sid=<?php echo $row['sid']; ?>';">
                    <img src="../img/set.svg" alt="Set">
                    <?php echo $row["sname"]; ?>
                </button></li>
<?php
            }
        }
        $connection->close();
    }
?>
            </ul>
        </div>
    </main>
</body>
</html>