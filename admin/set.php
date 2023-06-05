<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $aid = $_SESSION["who"];

        $sql = "SELECT * FROM `sets` WHERE `aid`='$aid';";
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
            <h1>Add set</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <form action="../inc/asetadd.php" method="post">
                <input type="text" name="sname" id="sname" placeholder="Set Name">
                <input type="hidden" name="aid" id="aid" value="<?php echo $aid ?>">
                <input type="submit" value="Add" name="add">
            </form>
            <table>
                <tr>
                    <th>Set Name</th>
                    <th>Set ID</th>
                </tr>
<?php
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $row["sname"]; ?></td>
                    <td><?php echo $row["sid"]; ?></td>
                </tr>
<?php
            }
        } else {
            echo "<tr><td>Set Details are Empty<td></tr>";
        }
        $connection->close();
    }
?>
            </table>
        </div>
    </main>
</body>
</html>