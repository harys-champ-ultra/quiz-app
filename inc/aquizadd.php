<?php
    if(isset($_POST["add"])) {
        if(empty($_POST["title"]) || empty($_POST["choiceA"]) || empty($_POST["choiceB"]) || empty($_POST["choiceC"] || empty($_POST["choiceD"]) || empty($_POST["correctAnswer"]) || empty($_POST["sid"]))) {
            header("Location: ../admin/quiz.php#add?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");
            $title = $_POST["title"];
            $choiceA = $_POST["choiceA"];
            $choiceB = $_POST["choiceB"];
            $choiceC = $_POST["choiceC"];
            $choiceD = $_POST["choiceD"];
            $correctAnswer = $_POST["correctAnswer"];
            $aid = $_POST["aid"];
            $sid = $_POST["sid"];

            if(($correctAnswer !== $choiceA) && ($correctAnswer !== $choiceB) && ($correctAnswer !== $choiceC) && ($correctAnswer !== $choiceD)) {
                header("Location: ../admin/quiz.php#add?PLEASE MATH CORRECT ANSWER WITH CHOICES!");
            } else {
                $sql = "INSERT INTO `aquiz`(`aqtitle`, `aqchoicea`, `aqchoiceb`, `aqchoicec`, `aqchoiced`, `aqcorrect`, `aid`, `sid`) VALUES ('$title', '$choiceA', '$choiceB', '$choiceC', '$choiceD', '$correctAnswer', '$aid', '$sid');";
                $result = $connection->query($sql)
                    or die ('Problem with query! ' . $connection->error);
    
                if ($result) {
                    header("Location: ../admin/quiz.php#add?ADDED!");
                } else {
                    header("Location: ../admin/quiz.php#add?FAILED");
                }
            }
        }
    }
?>
