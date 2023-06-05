<?php
    if(isset($_POST["submit"])) {
        require_once("conn.php");
        $aqid = $_POST["aqid"];
        $pid = $_POST["pid"];
        $pAnswer = $_POST["pAnswer"];
        
        $sql = "INSERT INTO `result`(`aqid`, `pid`, `panswer`) VALUES ('$aqid', '$pid', '$pAnswer');";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);

        if ($result) {
            header("Location: ../people/quiz.php?SUBMITED!");
        } else {
            header("Location: ../people/quiz.php?FAILED");
        }
    }
?>
