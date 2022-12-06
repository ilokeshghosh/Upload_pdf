<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display PDF</title>
    <style>

        embed{
            border: 2px solid black;
            margin-top: 30px;
           
        }
        .div1{
            margin-left:400px;
            /* margin: auto; */
        }
    </style>
</head>
<body>
    <div class="div1">
        <?php

        include "db.php";

        $sql="SELECT pdf FROM pdf_file";
        $query=mysqli_query($conn,$sql);
        while($info=mysqli_fetch_array($query)){
            ?> 
            <embed type="application/pdf" src="pdf/<?php echo $info['pdf'];?>" height="1000px" width="1000px">

    <?php
        }

        ?>
    </div>
</body>
</html>