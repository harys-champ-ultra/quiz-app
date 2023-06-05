<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $pid = $_SESSION["who"];

        $sql = "SELECT * FROM `pquiz` WHERE `pid`='$pid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App | Manage Quizes</title>
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
        <div id="add">
            <h1>Add own quiz</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <form action="../inc/pquizadd.php" method="post">
                <input type="text" name="title" id="title" placeholder="Title">
                <input type="text" name="choiceA" id="choiceA" placeholder="Choice A">
                <input type="text" name="choiceB" id="choiceB" placeholder="Choice B">
                <input type="text" name="choiceC" id="choiceC" placeholder="Choice C">
                <input type="text" name="choiceD" id="choiceD" placeholder="Choice D">
                <input type="text" name="correctAnswer" id="correctAnswer" placeholder="Correct answer">
                <input type="hidden" name="pid" id="pid" value="<?php echo $pid ?>">
                <input type="submit" value="Add" name="add">
            </form>
        </div>
        <div id="view">
            <h1>View own quiz</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <ol class="description">
<?php
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
?>
                <li>
                    <h2>#<?php echo $row["pqid"] . " - " . $row["pqtitle"]; ?></h2>
                    <p><?php echo $row["pqcorrect"]; ?></p>
                    <a href="../inc/pquizdelete.php?quizid=<?php echo $row["pqid"];?>">Delete quiz</a>
                    <br><br>
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
        <div id="edit">
            <h1>Edit own quiz</h1>
            <p>needs another thing <a href="./index.php">done?</a></p>
            <form action="../inc/pquizedit.php" method="post">
                <input type="number" name="pqid" id="pqid" placeholder="Quiz id #">
                <input type="text" name="title" id="title" placeholder="Title">
                <input type="text" name="choiceA" id="choiceA" placeholder="Choice A">
                <input type="text" name="choiceB" id="choiceB" placeholder="Choice B">
                <input type="text" name="choiceC" id="choiceC" placeholder="Choice C">
                <input type="text" name="choiceD" id="choiceD" placeholder="Choice D">
                <input type="text" name="correctAnswer" id="correctAnswer" placeholder="Correct answer">
                <input type="hidden" name="pid" id="pid" value="<?php echo $pid ?>">
                <input type="submit" value="Edit" name="edit">
            </form>
        </div>
    </main>
</body>
</html>