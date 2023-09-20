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
        $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_name'] = $row['user_name'];
            header("Location: welcome.php"); // Ganti dengan halaman selamat datang yang sesuai
            exit();
        } else {
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    }

} else {
    header("Location: index.php");
    exit();
}
?>
