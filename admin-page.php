<?php
include 'conn/conn.php';

//query for completed dose recipient
$no = 1;
$query = "SELECT * FROM vac_rep WHERE vac_stat = 'Completed 2nd Dose'";
$result = mysqli_query($conn, $query);
$notempty = mysqli_num_rows($result);

//query for incompleted dose recipient with appointment date
$no1 = 1;
$query1 = "SELECT * FROM vac_rep WHERE isDateSet = 1";
$result1 = mysqli_query($conn, $query1);
$notempty1 = mysqli_num_rows($result1);

//query for incompleted dose recipient without appointment date
$no2 = 1;
$query2 = "SELECT * FROM vac_rep WHERE isDateSet = 0 AND vac_stat = 'Completed 1st Dose' OR vac_stat = 'Unvaccinated' ";
$result2 = mysqli_query($conn, $query2);
$notempty2 = mysqli_num_rows($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>CVS - Admin Page</title>
</head>

<body>

    <!--navbar-->
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <h1>Covid-19 Vaccination System / Admin Page</h1>
            </div>
            <ul id="menu">
                <li><a href="index.html">Main</a></li>
            </ul>
        </div>
    </nav>

    <div class="top-table">

        <!--table for completed dose-->
        <table>
            <tr>
                <th colspan="2" class="table-header">Completed Dose Recipient</th>
            </tr>
            <tr>
                <th>No</th>
                <th>IC Number</th>
                <th>Name</th>
                <th>Current Vaccination Status</th>
                <th>Vaccination Certificate</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                $ic = $row['Ic_num'];
                $name = $row['rep_name'];
                $vac_stat = $row['vac_stat'];
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $ic ?></td>
                <td><?php echo $name; ?></td>
                <td>Completed 2nd Dose</td>
                <td></td>
            </tr>
            <?php 
        $no++; 
        }

        //shows number of data displayed
        if($notempty != 0 ){
        ?>
            <tr>
                <td colspan="5">Showing Result of <?php echo $no-1;?> of data from database</td>
            </tr>
            <?php
        }
        
        //if there is no data inside db
        if($notempty == 0 ){
        ?>
            <tr>
                <td colspan="5">No data inside the database</td>
            </tr>
            <?php
        }
        ?>
        </table>

        <!--table for incompleted dose with appointment-->
        <table>
            <tr>
                <th colspan="2" class="table-header">Awaiting for Appointment Recipient</th>
            </tr>
            <tr>
                <th>No</th>
                <th>IC Number</th>
                <th>Name</th>
                <th>Current Vaccination Status</th>
                <th>Appointments</th>
                <th>Appointment Status</th>
            </tr>
            <?php
            while($row1 = mysqli_fetch_assoc($result1)){
                $user_id1 = $row1['user_id'];
                $ic1 = $row1['Ic_num'];
                $name1 = $row1['rep_name'];
                $vac_stat1 = $row1['vac_stat'];
                $vac_apt = $row1['vac_apt'];
        ?>
            <tr>
                <td><?php echo $no1; ?></td>
                <td><?php echo $ic1; ?></td>
                <td><?php echo $name1; ?></td>
                <td><?php echo $vac_stat1; ?></td>
                <td><?php echo $vac_apt; ?></td>
                <td>
                    <button class="setBtn">
                        <a href="complete-appointment.php?user_id=<?php echo $user_id1?>" type="submit">Complete
                            Vaccination</a>
                    </button>
                </td>
            </tr>
            <?php 
        $no1++; 
        }

        //shows number of data displayed
        if($notempty1 != 0 ){
        ?>
            <tr>
                <td colspan="6">Showing Result of <?php echo $no1-1;?> of data from database</td>
            </tr>
            <?php
        }

        //if there is no data inside db
        if($notempty1 == 0 ){
        ?>
            <tr>
                <td colspan="6">No data inside the database</td>
            </tr>
            <?php
        }
        ?>
        </table>

        <!-- table for incompleted dose without appointment data -->
        <table>
            <tr>
                <th colspan="2" class="table-header">Recipient with Appointment</th>
            </tr>
            <tr>
                <th>No</th>
                <th>IC Number</th>
                <th>Name</th>
                <th>Vaccination Status</th>
                <th>Appointments Date</th>
            </tr>
            <?php
            while($row2 = mysqli_fetch_assoc($result2)){
                $user_id2 = $row2['user_id'];
                $ic2 = $row2['Ic_num'];
                $name2 = $row2['rep_name'];
                $vac_stat2 = $row2['vac_stat'];
        ?>
            <tr>
                <td><?php echo $no2; ?></td>
                <td><?php echo $ic2; ?></td>
                <td><?php echo $name2; ?></td>
                <td><?php echo $vac_stat2; ?></td>
                <td>
                    <form action="set-date.php?user_id=<?php echo $user_id2?>" method="POST">
                        <input type="date" name="date" required>
                        <input class="setBtn" type="submit" name="set" value="set date">
                    </form>
                </td>
            </tr>
            <?php 
        $no2++; 
        }

        //shows number of data displayed
        if($notempty1 != 0 ){
        ?>
            <tr>
                <td colspan="5">Showing Result of <?php echo $no2-1;?> of data from database</td>
            </tr>
            <?php
        }

        //if there is no data inside db
        if($notempty1 == 0 ){
        ?>
            <tr>
                <td colspan="5">No data inside the database</td>
            </tr>
            <?php
        }
        ?>
        </table>
    </div>
</body>

</html>