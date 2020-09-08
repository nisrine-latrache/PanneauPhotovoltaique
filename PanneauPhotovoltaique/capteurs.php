<?php 



$link = mysqli_connect("127.0.0.1", "root", "", "weatherdata");


//$query = "SELECT uid,  temp_sol, temp_ambiante, temp_module, co2, cost, electricity, reseau, gener_sol , SUM(reseau) as res ,SUM(gener_sol) as consom, FROM master ";
$query = "SELECT * FROM master ";

//query above is executed
//i'm not doing any error checking'
$result = mysqli_query($link, $query);


//18 cols @ 10 min intervals = 3 hrs, indexed from 0
//$columnRange = 17;

//dump the db results into separate arrays so we can use them later 
while ($db = mysqli_fetch_array($result))
{
	//chop off the seconds portion of the time value

	
	$temp1 = $db['temp_sol'];
	$temp2 = $db['temp_ambiante'];
	$CO2 = $db['co2'];
  $argent = $db['cost'];
  $energy = $db['electricity'];
	$reseauPuplic= $db['reseau'];
  $generateur = $db['gener_sol'];
  $temp3 = $db['temp_module'];
  $uid = $db['uid'];


}

?>

<html>
<head>
    
<title>PowerStudio</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
<style>
body{
background-color:#f2f2f2;
}
div#top{
left :50px;
}
div#menu {
position:absolute;
width:470px;
top:90px;
left:10px;
bottom:10px;
}

div#contenu {
position:absolute;
top:90px;
left:490px;
bottom:10px;
width: 770px;
}
.button1{
background-color: #4CAF50; /* Green */
border: none;
color: white;
padding: 5px 20px;
display: inline-block;
font-size: 16px;
cursor: pointer;
}
.button2 {
background-color: red; 
border: none;
color: white;
padding: 5px 20px;
display: inline-block;
font-size: 16px;
cursor: pointer;
}


</style>

    </style>
</head>
<body>
    <div id="top">
        <img src="https://cdn-06.9rayti.com/rsrc/cache/widen_292/uploads/2012/06/logo-universite-chouaib-doukkali-eljadida-ucd.png"
        alt="ucd" 
       width="410" height="80">
       <img src="https://img.freepik.com/photos-gratuite/illustration-rendu-3d-energie-eolienne-eolienne-cellule-solaire_62754-960.jpg?size=626&ext=jpg&ga=GA1.2.59908703.1597616309" alt="Trulli" width="430" height="80" >
       <img src="https://www.rekrute.com/rekrute/file/jobOfferLogo/jobOfferId/50461" alt="Trulli" width="410" height="80">
    </div>
          
<div id="contenu">
    <div class="row">
        <div class="col-sm-6">
          <div class="card bg-basic text-red align-items-center">
            <div class="card-body ">
                <h6 class="card-title" style="color:red" style= "text-align:center;">Indicateurs--Fevrier</h6>
            </div>
          </div>
          <div class="row">
            <div class="col"><img src="https://image.flaticon.com/icons/png/512/99/99725.png"  style = "width: 50px; height: 50px; " class="img-fluid" alt="Responsive image"></div>
            <div class="col"></div>
            <div class="col" style="font-weight:900;"><?php echo $energy ?> KW/h</div>
          </div>
          <div class="row">
            <div class="col"><img src="https://image.flaticon.com/icons/png/512/125/125511.png"  style = "width: 50px; height: 50px; " class="img-fluid" alt="Responsive image"></div>
            <div class="col"></div>
            <div class="col" style="font-weight:900;"><?php echo $argent ?> 'DH'</div>
          </div>
          <div class="row">
            <div class="col"><img src="https://image.flaticon.com/icons/png/512/92/92842.png"  style = "width: 50px; height: 50px; " class="img-fluid" alt="Responsive image"></div>
            <div class="col"></div>
            <div class="col" style="font-weight:900;"><?php echo $CO2 ?>  Kg</div>
          </div>

        </div>
        <div class="col-sm-6">
          <div class="card bg-basic text-red align-items-center">
            <div class="card-body">
                <h6 class="card-title" style="color:red" style= "text-align:center;">Capteurs</h6>
            </div>
                </div> 
                <div class="row">
                    <div class="col"><img src="https://image.flaticon.com/icons/png/512/128/128781.png"  style = "width: 50px; height: 50px; " class="img-fluid" alt="Responsive image"></div>
                    <div class="col">Temperature solaire</div>
                    <div class="col" style="font-weight:900;"><?php echo $temp1 ?> W/m</div>   
                  </div>
                  <div class="row">
                    <div class="col"><img src="https://image.flaticon.com/icons/png/512/120/120789.png"  style = "width: 50px; height: 50px; " class="img-fluid" alt="Responsive image"></div>
                    <div class="col">Temperature ambiante</div>
                    <div class="col" style="font-weight:900;"><?php echo $temp2 ?> &deg;C</div>
                  </div>
                  <div class="row">
                    <div class="col"><img src="https://image.flaticon.com/icons/png/512/120/120789.png"  style = "width: 50px; height: 50px; " class="img-fluid" alt="Responsive image"></div>
                    <div class="col">temperature des modules</div>
                    <div class="col" style="font-weight:900;"><?php echo $temp3 ?> &deg;C</div>
                  </div>
                  <div class="row">
                    <div class="col" style="font-weight:900;" > Vitesse du vent</div>
                    <div class="col"> </div>
                    <div class="col" style="font-weight:800;">24 m/s</div>
                  </div>
          </div>
          
        </div>
        <br>
        <div class="card bg-basic text-red align-items-center">
            <div class="card-body">
                <h6 class="card-title" style="color:red" style= "text-align:center;">Alarmes</h6>
            </div>
                </div>
                <div class="row">
                    <div class="col" id="piechart2"> </div>
                    <div class="col " style= "text-align:center;"> <br><br>Injection reseau <br>
                        Alarme modulation <br>
                        de puissance onduleur <br>
                        Desequilibre du courant 
                        <br>
                        Perte communication</div>
                  </div>

<script type="text/javascript"
src="https://www.gstatic.com/charts/loader.js"></script> 

<script type="text/javascript"> 
google.charts.load('current', {'packages':['corechart']}); 
google.charts.setOnLoadCallback(drawChart); 

function drawChart() { 
var data = google.visualization.arrayToDataTable([ 
['Task', 'Utilisation'], 
['', 9], 
['', 1]
]); 
var options = {'title':'', 'width':350, 'height':200 , pieHole: 0.4, 'backgroundColor': {
        fill:'f2f2f2'     
        }  ,  colors: [ '#00a300', '#f2fc00']
}; 
var chart = 
new google.visualization.PieChart(document.getElementById('piechart2')); 
chart.draw(data, options);

} 
</script> 
<br>
<div class="card bg-basic text-red align-items-center">
<div class="card-body">
    <h6 class="card-title" style="color:red" style= "text-align:center;">Fraction Solaire--Fevrier</h6>
</div>
    </div> 
    <div class="row">
        <div class="col-sm-6" id="piechart3"> </div>
        <div class="col-sm-6"> <P style="color:green" style="font-weight:900;"  > <br><br><br>8% - Target0% </P>
           </div>
      </div>  
      <script type="text/javascript"
src="https://www.gstatic.com/charts/loader.js"></script> 

<script type="text/javascript"> 
google.charts.load('current', {'packages':['corechart']}); 
google.charts.setOnLoadCallback(drawChart); 

function drawChart() { 
  var data = google.visualization.arrayToDataTable([  
                          ['', ''],  
                          <?php  
                         
                         foreach($result as $info){

                          extract($info);

                          echo  "['$solaire', $val2],";  
                        }                         
                          ?>  
                     ]); 
var options = {'title':'', 'width':300, 'height':200,'backgroundColor': {
        fill:'f2f2f2'     
        } ,  colors: ['#ff0000', '#00a300']}; 
var chart = 
new google.visualization.PieChart(document.getElementById('piechart3')); 
chart.draw(data, options);

} 
</script>  
      </div>
      

 </div>

<div id="menu"  >
    <div class="card bg-basic text-red align-items-center">
        <div class="card-body ">
          <h6 class="card-title" style="color:red" >Balance Energetique</h6>
        </div>
      </div>
      <br>
    <div class="row">
        <div class="col-sm-6">
          <div class="card bg-danger text-white">
            <div class="card-body ">
                <i class="material-icons" style="font-size:48px;color:white;">traffic</i>
              <h6 class="card-title">     الشبكةالعمومية Reseau</h6>
              <br><br>
              <p class="card-text" style= "text-align:center;" style="font-size:160%;" ><?php echo $reseauPuplic ?>  KW <br> 5.13KWh /Fevrier</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card bg-success text-white">
            <div class="card-body">
                <i class="material-icons" style="font-size:48px;color:white;">view_comfy</i>
              <h6 class="card-title">Generateur Solaire</h6> 
              <br><br>
              <p class="card-text" style= "text-align:center;" style="font-size:160%;"><?php echo $generateur ?>  KWp(DC) <br> 459KWh /Fevrier</p>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="card bg-primary text-white">
        <div class="card-body ">
            <i class="material-icons" style="font-size:48px;color:white;">domain</i>
          <h5 class="card-title"> الاستعمال Utilisation</h5>
          <p class="card-text" style= "text-align:center;" style="font-size:160%;"><?php echo $generateur ?> KW<br>5.77KWh/Fevrier</p>
          <div id="piechart"></div> 

<script type="text/javascript"
src="https://www.gstatic.com/charts/loader.js"></script> 

<script type="text/javascript"> 
google.charts.load('current', {'packages':['corechart']}); 
google.charts.setOnLoadCallback(drawChart); 

function drawChart() { 
  var data = google.visualization.arrayToDataTable([  
                          ['Janvier', 'Fevrier'],  
                          <?php  
                         
                         foreach($result as $info){

                          extract($info);

                          echo  "['$mois', $val],";  
                        }                         
                          ?>  
                     ]); 
var options = {'title':'', 'width':350, 'height':150,'backgroundColor': {
        fill:'1a75ff'     
        },   colors: ['#32CD32', '#FF4500'] }; 
var chart = 
new google.visualization.PieChart(document.getElementById('piechart')); 
chart.draw(data, options);

} 
</script> 
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col" > <img src="https://www.rekrute.com/rekrute/file/jobOfferLogo/jobOfferId/50461" 
            alt="Trulli" width="140" height="70"></div>
        <div class="col">  <button class="button1"></button>Autoconsommation</div>
        <div class="col"> <button class="button2"></button>Consommation Reseau</div>

      </div>  
      
        <br>

        <input type="submit" value="Ecran 2">
        <input type="submit" value="Ecran 3">

          
</div>


   

</body>

</html>
