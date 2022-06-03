<?php
include 'conn/conn.php';

$no = 1;
$query = "SELECT * FROM vaccine_recipient WHERE vac_stat = 1 or vac_stat = 2";
$result = mysqli_query($conn, $query);
$notempty = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>IC Number</th>
            <th>Name</th>
            <th>Vaccination Status</th>
            <th>Vaccination Appointment</th>
            <th>Vaccination Certificate</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                $ic = $row['ic_num'];
                $name = $row['name'];
                $vac_stat = $row['vac_stat'];
                $vac_apt = $row['vac_apt'];
        
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $vac_stat; ?></td>
            <td><?php echo $vac_apt; ?></td>
        </tr>
        <?php 
        $no++; 
        }

        //shows number of data displayed
        if($notempty != 0 ){
        ?>
        <tr>
            <td>Showing Result of <?php echo $no-1;?> of data from database</td>
        </tr>
        <?php
        }

        if($notempty == 0 ){
        ?>
        <tr>
            <td colspan = "6">No data inside the database</td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>