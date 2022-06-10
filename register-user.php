<?php
include 'conn/conn.php';
$ic = $_REQUEST['ic_num'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>CVS - User Register Page</title>
</head>

<body>
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <h1>Covid-19 Vaccination System / User Register Page</h1>
            </div>
            <ul id="menu">
                <li><a href="index.html">Main</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-register">
        <h1>Register yourself for vaccination program now</h1>
        <form action="register-engine.php" method="POST">
            <label for="IC">Ic Number</label>
            <input type="text" name="ic" class="input" value="<?php echo $ic;?>" required>
            <label for="name">Name</label>
            <input type="text" name="name" class="input" placeHolder="enter your name" required>
            <h2>By clicking register button, I agree with the term and condition provided by Ministry of Health Malaysia </h2>
            <input type="submit" name="register" class="login-btn" value="register">
        </form>
    </div>
</body>

</html>