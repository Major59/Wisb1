<html>
    <head>
        <title>Page film WIS B1</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"crossorigin="anonymous"/>


    </head>
    <body>
        <section class= "jumbotron text-center">
            <div class= "container">
                <h1 class= "jumbotron-heading">
                    <?php 
                    $site ="Wisflix";
                    echo $site;
                    ?>
                </h1>
                <h2>WIS DOUM</h2>
                <p class= "lead text-muted ">
                    Description : Netflix n'a qu'a bien se tenir
                </p>
            </div>
    
        <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
              
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="http://static1.squarespace.com/static/53956952e4b048e47284a923/5c8e512de79c7057fccee5b7/5c9297028165f51d36562d23/1553804116938/cinema-frontenay-rohan-rohan.jpg?format=1500w" alt="Los Angeles">
                  </div>
                  <div class="carousel-item">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/71IFuRy1uwL._SX425_.jpg" alt="Chicago">
                  </div>
                  <div class="carousel-item">
                    <img src="https://www.coloriageetdessins.com/images/autres/cinema/bobine-de-film-en-noir-et-blanc-27396-660x400.jpg" alt="New York">
                  </div>
                </div>
              
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </section>
              </div>
            <?php
            function card ($titre,$image,$description){
               echo " <div class=\"col-lg-3 col-sm-12 col-md-3\">
                        <div class=\"card\">
                                    <img class=\"card-img-top\" src=\"$image\" alt=\"Card image\">
                                    <div class=\"card-body\">
                                      <h4 class=\"card-title\">$titre</h4>
                                      <p class=\"card-text\">$description</p>
                                      <a href=\"#\" class=\"btn btn-primary\">See Profile</a>
                                    </div>
                                    </div>
                                    </div>";
            }
            ?>
            <div class="container">
                <div class="row">
                
                    <?php
                    
                

                    require("Parametres.php");

                    $dbh=new PDO ("mysql:host=$host;dbname=$dbname",$login,$password);

                    if (array_key_exists ("annee",$_GET)){
                      $annee=$_GET ["annee"];
                      $req=$dbh->prepare ("SELECT * FROM film WHERE annee=:annee");
                      $req-> bindParam (":annee",$annee);
                      $req-> execute();
                      $films=$req;
                    }
                    else {

                    $req= $dbh-> query("SELECT * FROM film");

                    $films=$req;}

                    foreach ($films as $film) {
                      card($film["titre"],$film["image"],$film["description"]);
                    }
                    
                    $_GET
                    ?>
                        

                    </div>
                </div>
            </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>