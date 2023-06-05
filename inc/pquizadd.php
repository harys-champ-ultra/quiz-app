<?php
    if(isset($_POST["add"])) {
        if(empty($_POST["title"]) || empty($_POST["choiceA"]) || empty($_POST["choiceB"]) || empty($_POST["choiceC"] || empty($_POST["choiceD"]) || empty($_POST["correctAnswer"]))) {
            header("Location: ../people/pquiz.php#add?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");
            $title = $_POST["title"];
            $choiceA = $_POST["choiceA"];
            $choiceB = $_POST["choiceB"];
            $choiceC = $_POST["choiceC"];
            $choiceD = $_POST["choiceD"];
            $correctAnswer = $_POST["correctAnswer"];
            $pid = $_POST["pid"];

            if(($correctAnswer !== $choiceA) && ($correctAnswer !== $choiceB) && ($correctAnswer !== $choiceC) && ($correctAnswer !== $choiceD)) {
                header("Location: ../people/pquiz.php#add?PLEASE MATH CORRECT ANSWER WITH CHOICES!");
            } else {
                $sql = "INSERT INTO `pquiz`(`pqtitle`, `pqchoicea`, `pqchoiceb`, `pqchoicec`, `pqchoiced`, `pqcorrect`, `pid`) VALUES ('$title', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$correctAnswer', '$pid');";
                $result = $connection->query($sql)
                    or die ('Problem with query! ' . $connection->error);
    
                if ($result) {
                    header("Location: ../people/pquiz.php#add?ADDED!");
                } else {
                    header("Location: ../people/pquiz.php#add?FAILED");
                }
            }
        }
    }
?>
