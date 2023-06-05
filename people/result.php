<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $pid = $_SESSION["who"];

        $sql = "SELECT * FROM `result` INNER JOIN `people` ON `result`.`pid`=`people`.`pid` INNER JOIN `aquiz` ON `result`.`aqid`=`aquiz`.`aqid` WHERE `result`.`pid`='$pid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Results</title>
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
            <h1>Result quiz</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>

            <table>
                <tr>
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                    <th>Your Score</th>
                </tr>
<?php
        $n = 0;
        $m = 0;
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $row["pname"]; ?></td>
                    <td><?php echo $row["aqtitle"]; ?></td>
                    <td><?php echo $row["aqcorrect"]; ?></td>
                    <td><?php echo $row["panswer"]; ?></td>
                    <td>
                        <?php
                            
                            if($row["aqcorrect"] !== $row["panswer"]) {
                                $n = 0;
                                echo $n;
                            } else {
                                $n = 1;
                                echo $n;
                                $m+=$n;
                            }
                        ?>
                    </td>
                </tr>
<?php
            }
        } else {
            echo "<tr><td colspan='4'>Result Details are Empty<td></tr>";
        }
        $connection->close();
    }
?>
                <tr>
                    <td colspan="5" style="text-align: center;">Total Score: <strong><?php echo $m; ?></strong></td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>