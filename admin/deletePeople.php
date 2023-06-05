<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $aid = $_SESSION["who"];

        $sql = "SELECT * FROM `people`;";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Manage People</title>
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
        <div id="view">
            <h1>View people</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <ol class="description">
<?php
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
                <li>
                    <h2>#<?php echo $row["pid"] . " - " . $row["pname"]; ?></h2>
                    <p><?php echo $row["pemail"]; ?></p>
                    <a href="../inc/apeopledelete.php?pid=<?php echo $row["pid"];?>">Remove/Block people</a>
                    <br><br>
                </li>
<?php
            }
        } else {
            echo "<li><h2>People List is Empty<h2></li>";
        }
        $connection->close();
    }
?>
            </ol>
        </div>
    </main>
</body>
</html>