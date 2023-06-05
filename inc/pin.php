<?php
    require_once("nocache.php");

    if(isset($_POST["signin"])) {
        if(empty($_POST["email"]) || empty($_POST["password"])) {
            header("Location: ../people/signin.php?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");

            $email = $_POST["email"];
            $password = $_POST["password"];

            $hashedPassword = hash("sha256", $password);

            $sql = "SELECT * FROM `people` WHERE `pemail`='$email' AND `ppassword`='$hashedPassword';";
            $result = $connection->query($sql)
                or die ('Problem with query! ' . $connection->error);

            if ($result->num_rows) {
                session_start();
                $user = $result->fetch_assoc();
                $_SESSION['who'] = $user['pid'];
                header('Location: ../people/?WELCOME');
            } else {
                header('location: ../people/signin.php?SIGN IN FAILED! TRY AGAIN');
            }
        }
    }
?>