<?php
    session_start();
    include "../connection.php";
    if(isset($_POST['create'])){
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $group = $_POST['group'];
        $insertSql = "INSERT INTO `users`(`uid`, `namn`, `password`, `grupp`) VALUES ('$uid','$name','$pass','$group')";
        $insertRes = mysqli_query($conn, $insertSql);
    }
    if(isset($_POST['update'])){
        $oldUid = $_POST['oldUid'];
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $group = $_POST['group'];
        $updateSql = "UPDATE `users` SET `uid`='$uid',`namn`='$name',`password`='$pass',`grupp`='$group' WHERE `uid`='$oldUid'";
        $updateRes = mysqli_query($conn, $updateSql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
</head>
<body>
    <a href="home.php">Return</a>
    <a href="index.php">Logout</a>
    <section class="container7">
        <form class="newUser" method="post" action="">
            <div class="box">
                <p>uid</p>
                <input type="text" name="uid">
            </div>
            <div class="box">
                <p>name</p>
                <input type="text" name="name">
            </div>
            <div class="box">
                <p>password</p>
                <input type="password" name="password">
            </div>
            <select name="group">
                <option value="kundmottagare">kundmottagare</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="create" value="Create" class="btn">
        </form>
        <h2 style="margin-top:3rem;" class="heading">All <span>Users</span></h2>
        <div class="all_user">
            <?php 
            $admSql = "SELECT * FROM users";
            $admSqlQuery = mysqli_query($conn, $admSql);
            if($admSqlQuery){
                while($row = mysqli_fetch_assoc($admSqlQuery)){
            ?>
            <form class="user" method="post" action="">
                <input type="hidden" name="oldUid" value="<?php echo $row['uid']?>">
                <p>Name: <input type="text" name="name" value="<?php echo $row['namn']?>"></p>
                <p>Uid: <input type="text" name="uid" value="<?php echo $row['uid']?>"></p>
                <p>Password: <input type="password" name="password" value="<?php echo $row['password']?>"></p>
                <select name="group">
                    <option <?php echo ($row['grupp'] === 'kundmottagare') ? 'selected' : null?> value="kundmottagare">kundmottagare</option>
                    <option <?php echo ($row['grupp'] === 'admin') ? 'selected' : null?> value="admin">admin</option>
                    <option <?php echo ($row['grupp'] === 'ekonom') ? 'selected' : null?> value="ekonom">Ekonom</option>
                </select>
                <input type="submit" value="Update" class="btn" name="update">
            </form>
            <?php
                }
            }
            ?>
        </div>
    </section>
</body>
</html>