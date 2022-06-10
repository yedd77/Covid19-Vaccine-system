<?php
include 'conn/conn.php';

$id = $_REQUEST['user_id'];


$query = "SELECT * FROM vac_rep WHERE user_id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$ic = $row['Ic_num'];
$name = $row['rep_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="qrcode.js"></script>
    <title>Vaccine Certficate</title>
</head>
<body>
    <div class="cert-cont">
        <h1>Digital Certificate</h1>
        <h2>COVID-19 Vaccination</h2>
        <hr>
        <div class="Certname"><?php echo $name?></div>
        <div class="CertIC"><?php echo $ic ?></div>
        <div id="placeHolder"></div>
        <script>
        var desc = "COVID-19 Digital Certificate \n"
        var name = "Name : <?php echo $name; ?> \n";
        var ic = "IC Number : <?php echo $ic; ?>\n";
        var enddesc = "Completed Doses of COVID-19 Vaccination";
        desc += name;
        desc += ic;
        desc += enddesc;

        var typeNumber = 15;
        var errorCorrectionLevel = 'L';
        var qr = qrcode(typeNumber, errorCorrectionLevel);
        qr.addData(desc);
        qr.make();
        document.getElementById('placeHolder').innerHTML = qr.createImgTag();
        </script>
        <div class="certdesc">Second Dose Completed</div>
    </div>
</body>
</html>