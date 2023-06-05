<?php
    if(isset($_POST["edit"])) {
        if(empty($_POST["pqid"]) || empty($_POST["title"]) || empty($_POST["choiceA"]) || empty($_POST["choiceB"]) || empty($_POST["choiceC"] || empty($_POST["choiceD"]) || empty($_POST["correctAnswer"]))) {
            header("Location: ../people/pquiz.php#edit?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");
            $pqid = $_POST["pqid"];
            $title = $_POST["title"];
            $choiceA = $_POST["choiceA"];
            $choiceB = $_POST["choiceB"];
            $choiceC = $_POST["choiceC"];
            $choiceD = $_POST["choiceD"];
            $correctAnswer = $_POST["correctAnswer"];
            $pid = $_POST["pid"];

            if(($correctAnswer !== $choiceA) && ($correctAnswer !== $choiceB) && ($correctAnswer !== $choiceC) && ($correctAnswer !== $choiceD)) {
                header("Location: ../people/pquiz.php#edit?PLEASE MATH CORRECT ANSWER WITH CHOICES!");
            } else {
                $sql = "UPDATE `pquiz` SET `pqtitle`='$title',`pqchoicea`='$choiceA',`pqchoiceb`='$choiceB',`pqchoicec`='$choiceC',`pqchoiced`='$choiceD',`pqcorrect`='$correctAnswer',`pid`='$pid' WHERE `pqid`='$pqid';";
                $result = $connection->query($sql)
                    or die ('Problem with query! ' . $connection->error);
    
                if ($result) {
                    header("Location: ../people/pquiz.php#edit?EDITED!");
                } else {
                    header("Location: ../people/pquiz.php#edit?FAILED");
                }
            }
        }
    }
?>
