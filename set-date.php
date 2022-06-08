<?php
include 'conn/conn.php';

if(isset($_REQUEST['set'])){
    $user_id = $_REQUEST["user_id"];
    $date = $_REQUEST["date"];

    $sql = "UPDATE vac_rep
    SET vac_apt = '$date',
    isDateSet = 1
    WHERE user_id = '$user_id'";

     //if data inserted success
    if ($conn->query($sql) === TRUE) { 
    ?>

        <script>
            alert('User appointment date have been set');
            window.location = 'admin-page.php';
        </script>

    <?php
    //if data failed to insert
    } else {
        echo "Error:" .$sql . "<br>" .$conn->error;
    }
}
?>