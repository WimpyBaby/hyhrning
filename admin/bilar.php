<?php
    session_start();
    include "../connection.php";
    if(isset($_POST['create'])){
        $reg = $_POST['reg'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $color = $_POST['color'];
        $distance = $_POST['distance'];
        $rent = $_POST['rent'];
        $group = $_POST['group'];
        $insertSql = "INSERT INTO `bil`(`Regnr`, `Marke`, `Modell`, `Arsmodell`, `Farg`, `Matarstallning`, `Antaldygn`, `Gruppbet`) VALUES ('$reg','$brand','$model','$year', '$color', '$distance', '$rent', '$group')";
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
    <link rel="stylesheet" href="../style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
</head>
<body>
    <a href="home.php">Return</a>
    <a href="index.php">Logout</a>
    <div class="allusers">
        <h2 style="margin-top:3rem;" class="heading">New <span>Car</span></h2></br>
</div>
    <section class="container7">
    <div class="motUI2">
        <form class="newUser" method="post" action="">
            <div class="box">
                <p>Registration Number</p>
                <input type="text" name="reg">
            </div>
            <div class="box">
                <p>Brand</p>
                <input type="text" name="brand">
            </div>
            <div class="box">
                <p>Model</p>
                <input type="text" name="model">
            </div>
            <div class="box">
                <p>Yearmodel</p>
                <input type="text" name="year">
            </div>
            <div class="box">
                <p>Color</p>
                <input type="text" name="color">
            </div>
            <div class="box">
                <p>Distance</p>
                <input type="text" name="distance">
            </div>
            <div class="box">
                <p>Rent Days</p>
                <input type="text" name="rent">
            </div>
            <p><select name="group">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select></p>
            <input type="submit" name="create" value="Create" class="button2">
        </form>
</div>
<div class="allusers">
        <h2 style="margin-top:3rem;" class="heading">All <span>Cars</span></h2>
</div>
        <!-- <div class="all_user"> -->
        <div class="mottFLEX">
            <?php 
            $admSql = "SELECT * FROM bil";
            $admSqlQuery = mysqli_query($conn, $admSql);
            if($admSqlQuery){
                while($row = mysqli_fetch_assoc($admSqlQuery)){
            ?>
            <div class="motUI">
            <form class="user" method="post" action="">
                <input type="hidden" name="oldUid" value="<?php echo $row['Regnr']?>">
                <p>Reg Number: <input type="text" name="name" value="<?php echo $row['Marke']?>"></p>
                <p>Model: <input type="text" name="uid" value="<?php echo $row['Modell']?>"></p>
                <p>Year: <input type="text" name="password" value="<?php echo $row['Arsmodell']?>"></p>
                <p>Distance: <input type="text" name="password" value="<?php echo $row['Matarstallning']?>"></p>
                <p>Rent Days: <input type="text" name="password" value="<?php echo $row['Antaldygn']?>"></p>
                <select name="group">
                    <option <?php echo ($row['Gruppbet'] === 'kundmottagare') ? 'selected' : null?> value="kundmottagare">kundmottagare</option>
                    <option <?php echo ($row['Gruppbet'] === 'admin') ? 'selected' : null?> value="admin">admin</option>
                    <option <?php echo ($row['Gruppbet'] === 'ekonom') ? 'selected' : null?> value="ekonom">Ekonom</option>
                </select>
                <input type="submit" value="Update" class="button2" name="update">
            </form>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
</body>
</html>