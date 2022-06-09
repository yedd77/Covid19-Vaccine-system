<?php
include 'conn/conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>CVS - User Page</title>
</head>

<body>
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <h1>Covid-19 Vaccination System / User Page</h1>
            </div>
            <ul id="menu">
                <li><a href="index.html">Main</a></li>
            </ul>
        </div>
    </nav>

    <div class="top-table">
        <table>
            <tr>
                <th>Ic Number</th>
                <th>Name</th>
                <th>Vaccination Appointment</th>
                <th>Current Vaccination Status</th>
                <th>Vaccination Certificate</th>
            </tr>
            <td><?php echo $_SESSION['Ic']; ?></td>
            <td><?php echo $_SESSION['name']; ?></td>
            <td>
                <?php 
                    if($_SESSION['vacdateset'] == 0 && ($_SESSION['vacstat'] == "Unvaccinated" || $_SESSION['vacstat'] == "Completed 1st Dose")){
                        echo "No appointment date received";
                    } else if ($_SESSION['vacdateset'] == 0 && $_SESSION['vacstat'] == "Completed 2nd Dose"){
                        echo "Completed all appointment";
                    } else if ($_SESSION['vacdateset'] == 1){
                        echo $_SESSION['vacapt'];
                    }
                ?>
            </td>
            <td><?php echo $_SESSION['vacstat']; ?></td>
            <td>
                <?php 
                if($_SESSION['vacstat'] == "Completed 2nd Dose"){
                    echo $_SESSION['vac_cert']; 
                } else {
                    echo "No issued certficate yet";
                }
                ?>
                </td>
        </table>
    </div>
</body>

</html>