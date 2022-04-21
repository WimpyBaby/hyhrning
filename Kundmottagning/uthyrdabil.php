<?php

include("../connection.php");
session_start();
$kundid = $_SESSION['KundId'];

$sql = "SELECT * FROM hyr WHERE '$kundid' = KundId";
$result = mysqli_query($conn, $sql);
// while($row = mysqli_fetch_assoc($result)){
//      echo "Your ID is: ", $row['KundNamn'];
//      echo "</br>";
//      $_SESSION['id'] = $row['KundId'];
//      echo $_SESSION['id']; 

// }
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
    <h1>Rented Cars</h1>
    <a href="userlogin.php">Logout</a>
    <a href="../home.php">Main Page</a>
    <div class="mottFLEX">
    <?php while($row = mysqli_fetch_assoc($result)){
        $reg = $row['Regnr'];
        $fromdate = $row['Utdatum'];
        $todate = $row['Indatum'];
        $matarslq = "SELECT * FROM bil WHERE '$reg' = Regnr";
        $matarRes = mysqli_query($conn, $matarslq);
        $row2 = mysqli_fetch_assoc($matarRes);
        ?>
        <div class="motUI">
            <p>Kund Id <?php echo $kundid;?></p> 
            <p>Reg Number <?php echo $row['Regnr'];?></p>
            <p>Km reading <?php echo $row2['Matarstallning'];?></p>
            <form action="<?php echo 'betala.php?regnr='.$reg.'&in='.$fromdate.'&out='.$todate?>" method="post">
            <p><label>Renttype:</label>
            <select id="hyrtyp" name="hyrtyp">
                <option value="korttid">Short-term days</option>
                <option value="veckoslut">Weekend</option>
                <option value="veckoslutfri">Weekend-free</option>
            </select></p>
            <p>Renttype <?php echo $row['Hyrtyp'];?></p>
                <label>Utdatum</label>
                <input type="text" name="utdatum" value="<?php echo $row['Utdatum'];?>">
                <label>Indatum</label>
                <input type="text" name="indatum" value="<?php echo $row['Indatum'];?>">
                <label>Km in</label>
                <input type="text" name="matar">
                <label>Fuel Cost</label>
                <input type="text" name="fuel">
                <input type="submit" value="Calculate" class="button2"/><br><br>
            </form>
         </div>
         <?php }?>
    </div>
</body>
</html>