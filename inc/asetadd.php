<?php
    if(isset($_POST["add"])) {
        if(empty($_POST["sname"])) {
            header("Location: ../admin/set.php?MAKE SURE YOU FILL THE FIELD");
        } else {
            require_once("conn.php");
            $sname = $_POST["sname"];
            $aid = $_POST["aid"];

            $sql = "INSERT INTO `sets`(`sname`, `aid`) VALUES ('$sname', '$aid');";
            $result = $connection->query($sql)
                or die ('Problem with query! ' . $connection->error);

            if ($result) {
                header("Location: ../admin/set.php?ADDED!");
            } else {
                header("Location: ../admin/set.php?FAILED");
            }
        }
    }
?>
