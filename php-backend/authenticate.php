<?php
    include "connect.php";
    // Get the values from the form

    session_start();

    $un = $_POST['uname'];
    $pass = $_POST['pwd'];
    $sql = "SELECT * FROM User_table WHERE User_username LIKE '$un' and User_password LIKE '$pass'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        echo($row);

        if($row['User_username'] === $un && $row['User_password'] === $pass){
            $_SESSION['User_id'] = $row['User_id'];
            header("Location: ../web/LeagueSelectPage.html");
            exit();
        }
        else{
            header("Location: index.html?error=incorrect username or password");
            exit();
        }
    }
    else {
        header("Location: index.html?error=incorrect username or password");
        exit();
    }
?>