<?php
include 'conn/conn.php';
session_start();

if(isset($_REQUEST["check"])){
    $ic_num = $_REQUEST['ICNum'];
    $query = "SELECT * FROM vac_rep WHERE Ic_num = '$ic_num'";
    $result = mysqli_query($conn , $query);

    if(mysqli_num_rows($result) > 0){
        
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['rep_name'];
        $_SESSION['Ic'] = $row[ 'Ic_num'];
        $_SESSION['vacstat'] =  $row['vac_stat'];
        $_SESSION['vacapt'] = $row['vac_apt'];
        $_SESSION['vacdateset'] = $row['isDateSet'];
        $_SESSION['vac_cert'] = $row['vac_cert'];
        $_SESSION['issued'] = $row['isCertIssued'];

        header('location:user-page.php');
    }

    if(mysqli_num_rows($result) == 0){
        ?>
        <script>
            alert("You haven't registered for covid vaccination programme, Register now");
            window.location = 'register-user.php?ic_num=<?php echo $ic_num;?>'
        </script>
        <?php
    }
}
?>