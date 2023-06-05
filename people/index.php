<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $pid = $_SESSION["who"];

        $sql = "SELECT * FROM `people` WHERE `pid`='$pid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Dashboard</title>
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
<?php
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
            <h1>Hey <?php echo $row["pname"]; ?>,</h1>
<?php
            }
        }
        $connection->close();
    }
?>
            <p>choose some actions</p>
            <ul class="grid">
                <li><button class="solid" onclick="window.location.href='./quiz.php';">
                    <img src="../img/start.svg" alt="Start">
                    Start Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./set.php';">
                    <img src="../img/set.svg" alt="Set">
                    Solve Sets
                </button></li>
                <li><button class="solid" onclick="window.location.href='./communityquiz.php';">
                    <img src="../img/community.svg" alt="Community">
                    Check Community Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./pquiz.php#add';">
                    <img src="../img/add.svg" alt="Add">
                    Add Own Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./pquiz.php#view';">
                    <img src="../img/view.svg" alt="View">
                    View Own Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./pquiz.php#edit';">
                    <img src="../img/edit.svg" alt="Edit">
                    Edit Own Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./pquiz.php#view';">
                    <img src="../img/delete.svg" alt="Delete">
                    Delete Own Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./result.php';">
                    <img src="../img/result.svg" alt="Result">
                    Quiz Result
                </button></li>
            </ul>
        </div>
    </main>
</body>
</html>