<?php
session_start();

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }
    if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($ressult) === 1) {
            $row = mysqli_fetch_assoc($ressult);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $SESSION['user_name']
        }else{
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
            }
        }else{
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    }

} else {
    header("Location: index.php");
    exit();
}
?>
