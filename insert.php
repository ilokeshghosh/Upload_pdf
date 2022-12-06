<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert pdf</title>

    <style media="screen">
        div{
            border: 2px solid black;
            width: 500px;
            margin-left: 370px;
            margin-top: 50px;
            padding: 30px;
        }
        form{
            margin-left: 70px;

        }
        label{
            font-size: 20px;
            font-weight: bold;
        }
        #pdf{
            font-size: 20px;
            font-weight: bold;
            margin-top:10px;
        }
        #upload{
            font-size: 20px;
            font-weight: bold;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <div class="">
        <form action="insert.php" method="post" enctype="multipart/form-data">
        <label for="">Choose Your PDF file</label><br>
        
        <input  id="pdf" type="file" name="pdf" value="" required> <br> <br>

        <input id="upload" type="submit" name="submit" value="Upload">

        <?php
        include 'db.php';

        if(isset($_POST['submit'])){
            $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_temp_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="pdf/".$pdf;

            move_uploaded_file($pdf_temp_loc,$pdf_store);


            $sql="INSERT INTO pdf_file(pdf) VALUES('$pdf')";
            $query=mysqli_query($conn,$sql);
            // echo"Pdf stored Successfully";
            header("Location: display_pdf.php");

        }


        ?>


        </form>
    </div>
</body>
</html>