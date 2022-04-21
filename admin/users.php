<?php

include "../connection.php";

session_start();

print_r($_POST);

$username = "";
$kundnamn = "";
$password = "";
$grupp = "";

if(!empty($_POST['username']) && !empty($_POST['kundnamn']) && !empty($_POST['password']) && !empty($_POST['grupp']))
{
    $sql = "INSERT INTO `users` (`uid`, `namn`, `password`, `grupp`) VALUES ('$username', '$kundnamn', '$password', '$grupp')";
    $result = mysqli_query($conn, $sql);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <title>Document</title>
</head>
<body>
<h2>New User</h2>
<div class="container5">
    <form method="post">
            <div class="info">
            <div class="info2">
                <p>
                <label>Username:</label>
                <input type="text" name="username" >
                <label>Name:</label>
                <input type="text" name="kundnamn">
                <label>Password:</label>
                <input type="text" name="password"></p>
                <p><label>Grupp:</label>
                <select name="grupp">
                    <option value="Ekonom">Ekonom</option>
                    <option value="Admin">Admin</option>
                    <option value="Kundmottagare">Kundmottagare</option>
                </select></p>
            </div>
        </div>
        <input type="submit" value="Create" class="button2">
    </form>
    </div>
    <h2>Registered Users</h2>
<div class="container6">
<?php

$newusername = $_POST['newusername'];
$newnamn = $_POST['newnamn'];
$newpassword = $_POST['newpassword'];
$newgrupp = $_POST['newgrupp'];

$sql2 = "SELECT * FROM `users`";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_assoc($result2))
{
    
?>
<form method="post" class="test">
            <div class="info">
            <div class="info2">
                <h2>Update Users</h2>
                <p>
                <label>Username: </label>
                <input type="text" name="newusername" value="<?php echo $row2['uid'];?>">
                <label>Name: </label>
                <input type="text" name="newnamn"  value="<?php echo $row2['namn'];?>">
                <label>Password: </label>
                <input type="text" name="newpassword" value="<?php echo $row2['password'];?>"></p>
                <p><label>Grupp:</label>
                <select name="newgrupp">
                    <option value="Ekonom">Ekonom</option>
                    <option value="Admin">Admin</option>
                    <option value="Kundmottagare">Kundmottagare</option>
                </select></p>
            </div>
            </div>
        <input type="submit" value="Update" class="button2">
    </form>
    if
    <?php
    }
echo $row2['uid'];
//$sql3 = "UPDATE `users` SET `uid`= '$newusername' ,`namn`= '$newnamn', `password`= '$newpassword',`grupp`= '$newgrupp' WHERE `uid` = '$row2['uid']'";

    ?>
</div>
</body>
</html>