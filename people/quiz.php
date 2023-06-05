<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $pid = $_SESSION["who"];

        $sql = "SELECT * FROM `aquiz`;";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Start Quizes</title>
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
            <h1>Start quiz</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <ol class="description">
<?php
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
                <li>
                    <h2>- <?php echo $row["aqtitle"]; ?></h2>
                    <p><?php echo $row["aqchoicea"]; ?></p>
                    <p><?php echo $row["aqchoiceb"]; ?></p>
                    <p><?php echo $row["aqchoicec"]; ?></p>
                    <p><?php echo $row["aqchoiced"]; ?></p>
                    <form action="../inc/resultprocess.php" method="post">
                        <select name="pAnswer" id="pAnswer">
                            <option disabled selected>Choose Correct Answer</option>
                            <option value="<?php echo $row["aqchoicea"]; ?>"><?php echo $row["aqchoicea"]; ?></option>
                            <option value="<?php echo $row["aqchoiceb"]; ?>"><?php echo $row["aqchoiceb"]; ?></option>
                            <option value="<?php echo $row["aqchoicec"]; ?>"><?php echo $row["aqchoicec"]; ?></option>
                            <option value="<?php echo $row["aqchoiced"]; ?>"><?php echo $row["aqchoiced"]; ?></option>
                        </select>
                        <input type="hidden" name="aqid" id="aqid" value="<?php echo $row["aqid"]; ?>">
                        <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
                        <input type="submit" value="Check" name="submit">
                    </form>
                </li>
<?php
            }
        } else {
            echo "<li><h2>Quiz List is Empty<h2></li>";
        }
        $connection->close();
    }
?>
            </ol>
        </div>
    </main>
</body>
</html>