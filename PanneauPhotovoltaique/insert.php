<?php
     $con=mysqli_connect("localhost","root","","weatherdata");

    //require_once("connection.php");
 
    if(isset($_POST['submit']))
    {
        if(empty($_POST['temp1']) || empty($_POST['temp2']) || empty($_POST['temp3']) || empty($_POST['co2']) || empty($_POST['cost']) || empty($_POST['elec']) || empty($_POST['res']) || empty($_POST['gen']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $Temp1 = $_POST['temp1'];
            $Temp2 = $_POST['temp2'];
            $Temp3 = $_POST['temp3'];
            $Co2 = $_POST['co2'];
            $Cost = $_POST['cost'];
            $Elec = $_POST['elec'];
            $Res = $_POST['res'];
            $Gen = $_POST['gen'];

 
            $query = " insert into master (temp_ambiante, temp_sol,temp_module, co2, cost, electricity, reseau, gener_sol) values('$Temp1','$Temp2','$Temp3', '$Co2','$Cost ', '$Elec' , '$Res' , '$Gen')";
            $result = mysqli_query($con,$query);
 
            if($result)
            {
                header("location:capteurs.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:index.php");
    }
 