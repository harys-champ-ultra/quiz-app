<?php
    require_once("../inc/nocache.php");
    session_start();
    if(!$_SESSION["who"]) {
        header("Location: ./signin.php");
    } else {
        require_once("../inc/conn.php");
        $aid = $_SESSION["who"];

        $sql = "SELECT * FROM `admin` WHERE `aid`='$aid';";
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
<body onload="theme()">
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
            <h1>Hey <?php echo $row["aname"]; ?>,</h1>
<?php
            }
        }
        $connection->close();
    }
?>
            <p>choose some actions</p>
            <ul class="grid">
                <li><button class="solid" onclick="window.location.href='./set.php';">
                    <img src="../img/set.svg" alt="Add">
                    Add Set
                </button></li>
                <li><button class="solid" onclick="window.location.href='./quiz.php#add';">
                    <img src="../img/add.svg" alt="Add">
                    Add Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./quiz.php#view';">
                    <img src="../img/view.svg" alt="View">
                    View Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./quiz.php#edit';">
                    <img src="../img/edit.svg" alt="Edit">
                    Edit Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./quiz.php#view';">
                    <img src="../img/delete.svg" alt="Delete">
                    Delete Quiz
                </button></li>
                <li><button class="solid" onclick="window.location.href='./deletePeople.php';">
                    <img src="../img/delete.svg" alt="Delete">
                    Delete/Block People
                </button></li>
                <li><button class="solid" onclick="window.location.href='./quiz.php#people';">
                    <img src="../img/delete.svg" alt="Delete">
                    Delete People Quiz
                </button></li>
                <li><button class="transparent" onclick="theme();">
                    <img src="../img/appearance.svg" alt="Appearance">
                    Appearance
                </button></li>
            </ul>
        </div>
    </main>

    <script>
        let count = 0;
        const theme = () => {
            count++;
            if(count%2 == 1) {
                const color = document.querySelector("body").style.backgroundColor = "#f1faee";
            } else {
                const color = document.querySelector("body").style.backgroundColor = "#a8dadc";
            }
        }
    </script>

</body>
</html>