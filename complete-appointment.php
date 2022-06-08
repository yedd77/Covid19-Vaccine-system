<?php
include 'conn/conn.php';

$user_id = $_REQUEST['user_id'];

$query = "SELECT *
FROM vac_rep 
WHERE user_id = '$user_id'";

$result = mysqli_query($conn , $query);
$data = mysqli_fetch_assoc($result);

$stat = $data['vac_stat'];

if($stat == "Unvaccinated"){
    $vacstat = "Completed 1st Dose";

} else if ($stat == "Completed 1st Dose"){
    $vacstat = "Completed 2nd Dose";
}

$sql = "UPDATE vac_rep
SET vac_stat = '$vacstat' ,
vac_apt = '' ,
isDateSet = 0 
WHERE user_id = '$user_id'";

 //if data inserted success
 if($conn->query($sql) === TRUE) { 
    ?>

        <script>
            alert('User appointment completed');
            window.location = 'admin-page.php';
        </script>

    <?php
    //if data failed to insert
    } else {
        echo "Error:" .$sql . "<br>" .$conn->error;
    }
?>