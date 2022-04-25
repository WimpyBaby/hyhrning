<?php
    session_start();
    include "../connection.php";
    if(isset($_POST['update'])){
        $oldUid = $_POST['oldUid'];
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $group = $_POST['group'];
        $updateSql = "UPDATE `kund` SET `uid`='$uid',`namn`='$name',`password`='$pass',`grupp`='$group' WHERE `uid`='$oldUid'";
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
            <?php 
            $admSql = "SELECT * FROM kund";
            $admSqlQuery = mysqli_query($conn, $admSql);
            if($admSqlQuery){
                while($row = mysqli_fetch_assoc($admSqlQuery)){
            ?>
            <form class="user" method="post" action="">
                <input type="hidden" name="oldUid" value="<?php echo $row['KundId']?>">
                <p>Name: <input type="text" name="name" value="<?php echo $row['KundId']?>"></p>
                <p>Uid: <input type="text" name="uid" value="<?php echo $row['KundNamn']?>"></p>
                <p>Password: <input type="password" name="password" value="<?php echo $row['password']?>"></p>
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