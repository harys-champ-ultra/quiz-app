<?php
    if(isset($_GET["pid"])) {
        require_once("conn.php");
        $pid = $_GET["pid"];
        $sql = "DELETE FROM `pquiz` WHERE `pid`='$pid';";
        $result = $connection->query($sql)
            or die ('Problem with query! ' . $connection->error);
        
        if ($result) {
            $sqln = "DELETE FROM `result` WHERE `pid`='$pid';";
            $resultn = $connection->query($sqln)
                or die ('Problem with query! ' . $connection->error);

            $sqlnn = "DELETE FROM `people` WHERE `pid`='$pid';";
            $resultnn = $connection->query($sqlnn)
                or die ('Problem with query! ' . $connection->error);

            header('Location: ../admin/deletePeople.php?ALL DONE!');
        } else {
            header("Location: ../admin/deletePeople.php?DELETE FAILED! TRY AGAIN");
        }
    }
?>
