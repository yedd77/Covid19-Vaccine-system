<?php
include 'conn/conn.php';


if(isset($_REQUEST["register"])){
    $ic = $_REQUEST["ic"];
    $name = $_REQUEST["name"];

    $sql = "INSERT INTO vac_rep
    (`Ic_num` , `rep_name` , `vac_stat` , `isDateSet`)
    VALUES ('$ic' , '$name' , 'Unvaccinated' , '0')";

    if($conn->query($sql) === TRUE){
    ?>
    <!--alertbox popup for user when done register-->
    <script>
        alert("Your registration have been accepted");
        window.location = "index.html";
    </script>
    <?php
} else {
    ?>
     <!--alertbox popup when user insert wrong password-->
     <script>
            alert("Password didn't match, please try again");
            window.location = "register-user.php";
        </script>
        <?php
    }
}
?>