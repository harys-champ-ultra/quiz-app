<?php
    if(isset($_GET["quizid"])) {
        require_once("conn.php");
        $aqid = $_GET["quizid"];
        $sql = "DELETE FROM `result` WHERE `aqid`='$aqid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);

        if ($result) {
            $sqln = "DELETE FROM `aquiz` WHERE `aqid`='$aqid';";
            $resultn = $connection->query($sqln)
                or die ('Problem with query! ' . $connection->error);

            header('Location: ../admin/quiz.php#view?ALL DONE!');
        } else {
            header("Location: ../admin/quiz.php#view?DELETE FAILED! TRY AGAIN");
        }
    }
    if(isset($_GET["pquizid"])) {
        require_once("conn.php");
        $pqid = $_GET["pquizid"];
        $sql = "DELETE FROM `pquiz` WHERE `pqid`='$pqid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);

        if ($result) {
            header('Location: ../admin/quiz.php#view?ALL DONE!');
        } else {
            header("Location: ../admin/quiz.php#view?DELETE FAILED! TRY AGAIN");
        }
    }
?>
