<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();
require_once('../php_classes/Main.php');
$main = unserialize(serialize($_SESSION['main']));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <!-- main css  -->
    <link rel="stylesheet" href="../src_CSS/secondPage.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- fullpage css nodeModule -->
    <link rel="stylesheet" type="text/css" href="node_modules/fullpage.js/dist/fullpage.css" />
    <title>TrainProject</title>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light " ><!--style="background-color: rgba(230, 230, 230,0) !important; -->
<a class="navbar-brand" href="../index.php">
  <h3 class="trainNavbar fw-bold">TRAIN</h3>
</a>

<div
  class="collapse navbar-collapse justify-content-end align-content-center m-2"
  id="navbarSupportedContent"
>
  <ul class="navbar-nav mr-auto p-1 mx-5">
    <li class="nav-item active mx-2">
      <a class="nav-link fw-bolder links-nav" href="../index.php#section1">HOME</a>
    </li>
    <li class="nav-item mx-2">
    <a class="nav-link fw-bolder links-nav" href="../index.php#section2">ABOUT</a>
  </li>
    <li class="nav-item dropdown mx-2">
      <a
        class="nav-link fw-bold"
        href="#"
        id="navbarDropdown"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
      <div class="account-menu">
      <i class="fas fa-bars"></i>
      <div class="outerUser">
      <i class="fas fa-user"></i>
    </div>
      </div>
      </a>
      <div class="dropdown-menu " aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="registration.php">Registrati</a>
        <a class="dropdown-item" href="registration.php">Accedi</a>
        
        <?php    
         if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
          echo '<div class="dropdown-divider"></div>';
         if(isset($_SESSION['macchinista']) && $_SESSION['macchinista'] == true){
           echo '<a class="dropdown-item" href="macchinista.php">Macchinista</a>';
             
            }
         if(isset($_SESSION['stazione']) && $_SESSION['stazione'] == true&&$_SESSION['macchinista'] == false){
            echo '<a class="dropdown-item" href="hubInterface.php">HUB</a>';
          }
        
         }
       ?>
      </div>
    </li>
  </ul>
</div>
</nav>

    <div id="fullpage">
        <div class="section container-fluid">
            <div class="bar1 container-fluid">
                <div class="location">
                    <p class="fw-bold">Dove</p>
                    <input type="text" value="<?php echo $_SESSION['dove'] ?>" readonly>
                </div>
                <div class="check-in">
                    <p class="fw-bold">Destinazione</p>
                    <input type="text" value="<?php echo $_SESSION['destinazione'] ?>" readonly>
                </div>
                <div class="check-out">
                    <nav class="check-out1">
                        <p class="fw-bold">Data</p>
                        <input type="date" value="<?php echo $_SESSION['data']->format('Y-m-d'); ?>" min="2022-01-01" max="2023-01-01" disabled>
                    </nav>
                    <a href="../index.html">
                        <h6> CAMBIO RICERCA</h6>
                    </a>
                </div>

            </div>
            <div class="biglietti-treni">

                <h1 class="fw-bolder">BIGLIETTI TRENI</h1>
                <?php
                echo '  <div class="container">
                     <div class="progress__container">
                       <div class="progress__bar js-bar"></div>
                       <div class="progress__circle js-circle active">1</div>
                       <div class="progress__circle js-circle">2</div>
                       <div class="progress__circle js-circle">3</div>
                       <div class="progress__circle js-circle">4</div>
                       <div class="progress__circle js-circle">5</div>
                     </div>
                   </div>';
                $arrayindex = $main->findingTrainsAlgo($_SESSION['dove'], $_SESSION['destinazione'], $_SESSION['data']);
                if (count($arrayindex) == 0) {
                    echo '<h4 class="mt-5"> NON CI SONO TRENI DISPONIBILI  </h4><h6> PROVA A CAMBIARE I DATI </h6>';

                    echo '<img src="../assets/images/sadFace.png" alt="sad face" style="width:300px; height:240px; margin-top:10em;">';
                }
                // echo $main->getTrains()[$arrayindex[0]]->getDeparture();

                $_SESSION['arrayIndex'] = $arrayindex;
                for ($i = 0; $i < count($arrayindex); $i++) {

                 
                    echo '<div class="treno-rect">
                    <div class="time">
                        <h4> ' .  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("H:i") . '</h4>
                        <img src="../assets/images/Arrow87.png" alt="arrow">
                        <h4>' . $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->add(new DateInterval("PT1H"))->format("H:i") . '</h4>
                    </div>

                    <div class="ritiro">
                        <div class="left-side-icon">
                            <img src="../assets/images/homeIcon.png" alt="home icon">
                            <p class="fw-bolder text-uppercase"> ' . $main->getTrains()[$arrayindex[$i]]->getDeparture()->getName() . ' </p>
                        </div>
                        <div class="right-side-icon">
                            <p class="title fw-bolder"> RITIRO </p>
                            <p class="small-text">Punto di spedizione</p>
                            <p class="data">' . $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("d-m-Y") . '</p>
                        </div>
                    </div>
                    <div class="ritiro">
                        <div class="left-side-icon">
                            <img src="../assets/images/homeIcon.png" alt="home icon">
                            <p class="fw-bolder text-uppercase"> ' . $main->getTrains()[$arrayindex[$i]]->getArrive()->getName()  . '</p>
                        </div>
                        <div class="right-side-icon">
                            <p class="title fw-bolder"> CONSEGNA </p>
                            <p class="small-text">Punto di consegna</p>
                            <p class="data">' . $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("d-m-Y") . '</p>
                        </div>
                    </div>
                    <a href="acquista.php?n=2&id=' .$main->getTrains()[$arrayindex[$i]]->getCod() . '"  class="btn-acquista js-next">
                        <h6>
                            ACQUISTA
                        </h6>
                    </a>
                </div>';
                }

                ?>
            </div>
        </div>
        <!-- ' . $main->getTrains()[$arrayindex[$i]]->getCod() . '-->
        <div class="section last-part">

        </div>
    </div>

    <!-- main.js script  -->
    <script src="../scripts/main.js"></script>
    <script src="../scripts/progressBar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>