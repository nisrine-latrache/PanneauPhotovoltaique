<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panneau-Solaire</title>
    <link rel="stylesheet" a href="css/bootstrap.css">
</head>
<body class="bg-dark">
<div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Insertion des valeurs des capteurs</h3>
                        </div>
                        <div class="card-body">
 
                            <form action="insert.php" method="post">
                                <input type="text" class="form-control mb-2" placeholder=" Temperature ambiante " name="temp1">
                                <input type="text" class="form-control mb-2" placeholder=" Temperature Solaire " name="temp2">
                                <input type="text" class="form-control mb-2" placeholder=" Temperature Modules  " name="temp3">
                                <input type="text" class="form-control mb-2" placeholder="  Indicateur CO2 " name="co2">
                                <input type="text" class="form-control mb-2" placeholder=" Indicateur Gain  " name="cost">
                                <input type="text" class="form-control mb-2" placeholder=" Indicateur Electricity " name="elec">
                                <input type="text" class="form-control mb-2" placeholder=" Indicateur Reseau " name="res">
                                <input type="text" class="form-control mb-2" placeholder=" Generateur " name="gen">


                                <button class="btn btn-primary" name="submit">Submit</button>
                            </form>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>