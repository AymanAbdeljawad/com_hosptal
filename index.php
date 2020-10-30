<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">
    <div class="logo">
        <img src="img/logo.png" alt="" width="100px" height="100px">
        <p>مستشفي الشفاء</p>
    </div>

    <?php
        $masseg = "";
    if(!isset($_GET['send'])){?>


    <div class="form">
        <p>اهلا بكم للحجز املاء الاستماره</p>
        <form action="index.php" method="get">
            <input type="text" name="name" placeholder="ادخل الاسم">
            <input type="text" name="email" placeholder="ادخل البريد الالكتروني">
            <input type="date" name="date">
            <input type="submit" name="send" value="احجز الان">
        </form>

        <h2><?=$masseg?></h2>
    </div>
    <?php }

    else{


        //connection database
        $host = "localhost";
        $username = "root";
        $password = "";
        $DBname = "hosptal";
        $conn = mysqli_connect($host, $username, $password, $DBname);


        //inswrt data from database in from
        $name           = $_GET['name'];
        $email          = $_GET['email'];
        $date           = $_GET['date'];


        $sql = "INSERT INTO reservation(name, email, date) VALUES ('".$name."','".$email."','".$date."');";
        $res = mysqli_query($conn, $sql);
        if($res){
            $masseg = "تم الحجز بنجاح";
        }
        else{
            $masseg = "لم يتم الحجز بنجاح";
        }
        ?>



        <div class="form">
            <p>اهلا بكم للحجز املاء الاستماره</p>
            <form action="index.php" method="get">
                <input type="text" name="name" placeholder="ادخل الاسم">
                <input type="text" name="email" placeholder="ادخل البريد الالكتروني">
                <input type="date" name="date">
                <input type="submit" name="send" value="احجز الان">
            </form>
            <h2 class="masseg"><?=$masseg?></h2>
        </div>
        <?php


//        $conn->query($sql);
//        header("Location: admin.php");


    }


    ?>
</div>


</body>
</html>