<?php

session_start();

$conn = mysqli_connect("localhost", "root" ,"","pwpb");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function regis($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $password = htmlspecialchars($data["password"]);
    $query = "INSERT INTO `user` VALUES
            ('','$nama', '$password')";



    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}


if(isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE nama = '$nama' AND password = '$password' ";
    $hasil = mysqli_query($conn,$sql);

    if($hasil->num_rows > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION['users'] = $row;
        $_SESSION["id"] = $row["id"];
        $_SESSION["nama"] = $row["username"];
        $_SESSION["password"] = $row["password"];

    } else {
        //echo "gagal masuk";
        echo "<script>alert('Username atau Password Salah')</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h2>LOGIN</h2>
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit" name="submit">login</button>
        <p>belum punya akun ? <a href="register.php">register</a>  </p>

        
    </form>
    
</body>
</html>