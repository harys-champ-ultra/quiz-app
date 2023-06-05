<?php
    $connection = new mysqli("localhost", "root", "", "quizapp");
    if($connection->connect_error) {
        echo $connection->connect_error;
    }
?>