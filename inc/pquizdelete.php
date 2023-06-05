<?php
    if(isset($_GET["quizid"])) {
        require_once("conn.php");
        $pqid = $_GET["quizid"];
        $sql = "DELETE FROM `pquiz` WHERE `pqid`='$pqid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);

        if ($result) {
            header('Location: ../people/pquiz.php#view?ALL DONE!');
        } else {
            header("Location: ../people/pquiz.php#view?DELETE FAILED! TRY AGAIN");
        }
    }
?>
