<?php
    if(isset($_POST["edit"])) {
        if(empty($_POST["aqid"]) || empty($_POST["title"]) || empty($_POST["choiceA"]) || empty($_POST["choiceB"]) || empty($_POST["choiceC"] || empty($_POST["choiceD"]) || empty($_POST["correctAnswer"]))) {
            header("Location: ../admin/quiz.php#edit?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");
            $aqid = $_POST["aqid"];
            $title = $_POST["title"];
            $choiceA = $_POST["choiceA"];
            $choiceB = $_POST["choiceB"];
            $choiceC = $_POST["choiceC"];
            $choiceD = $_POST["choiceD"];
            $correctAnswer = $_POST["correctAnswer"];
            $aid = $_POST["aid"];

            if(($correctAnswer !== $choiceA) && ($correctAnswer !== $choiceB) && ($correctAnswer !== $choiceC) && ($correctAnswer !== $choiceD)) {
                header("Location: ../admin/quiz.php#edit?PLEASE MATH CORRECT ANSWER WITH CHOICES!");
            } else {
                $sql = "UPDATE `aquiz` SET `aqtitle`='$title',`aqchoicea`='$choiceA',`aqchoiceb`='$choiceB',`aqchoicec`='$choiceC',`aqchoiced`='$choiceD',`aqcorrect`='$correctAnswer',`aid`='$aid' WHERE `aqid`='$aqid';";
                $result = $connection->query($sql)
                    or die ('Problem with query! ' . $connection->error);
    
                if ($result) {
                    header("Location: ../admin/quiz.php#edit?EDITED!");
                } else {
                    header("Location: ../admin/quiz.php#edit?FAILED");
                }
            }
        }
    }
?>
