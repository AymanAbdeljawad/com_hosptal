<?php
include_once "head.php";
?>
    <table>
        <th>الرقم</th>
        <th>الاسم</th>
        <th>الايميل</th>
        <th>التاريخ</th>
<?php
    $host           = "localhost";
    $username       = "root";
    $password       = "";
    $DBname         = "hosptal";
    $conn = mysqli_connect($host, $username, $password, $DBname);
    $sql = "select * from reservation";
    $res = $conn->query($sql);

    if($res->num_rows>0){
        while ($row = $res->fetch_assoc()){
           ?>
            <tr>
                    <td><?=$row['id'] ?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['date']?></td>
            </tr>
            <?php
        }
    }
    else{
        ?>
         <tr>
                    <td colspan="4">لا يوجد حجوزات</td>

            </tr>
<?php
    }
?>