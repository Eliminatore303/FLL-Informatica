<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();
require_once('../php_classes/Main.php');
$main = unserialize(serialize($_SESSION['main']));

if ($_SESSION['loggedIn'] == 1) {
    $_SESSION['loggedIn'] = 2;
    $_SESSION['flexRadioDefault1'] = $_POST['flexRadioDefault'];
    $_SESSION['noleggioFlex'] = $_POST['noleggioFlex'];
    $_SESSION['numeroOrdinato'] = $_POST['numReg'];
    header('location: acquistaRiepilogo.php?n=4');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    @include_once("./includes/header.php");
    ?>
    <!-- main css  -->
    <link rel="stylesheet" href="../src_CSS/AcquistaRiepilogo.css" />
</head>

<body>
    <?php
    @include_once("./includes/navbar.php");
    ?>

    <div class="section container-fluid">
        <?php
        @include_once("./includes/firstPart.php");
        ?>
    </div>
    <div class="biglietti-treni">

        <?php
        // the train ticket is not showing because $_SESSION['idTrain'] is a string '5' and not an number 5
        $arrayindex = $_SESSION['arrayIndex'];
        for ($i = 0; $i < count($arrayindex); $i++) {
            if ($_SESSION['idTrain'] ==  $main->getTrains()[$arrayindex[$i]]->getCod()) {

                $time =  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("H:i");
                $timeAfter = $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->add(new DateInterval("PT1H"))->format("H:i");
                $departure = $main->getTrains()[$arrayindex[$i]]->getDeparture()->getName();
                $timeDeparture =  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("d-m-Y");
                $destination = $main->getTrains()[$arrayindex[$i]]->getArrive()->getName();
                $codId = $main->getTrains()[$arrayindex[$i]]->getCod();
        ?>
        <div class="treno-rect">
            <div class="time">
                <h4><?php echo $time; ?></h4>
                <img src="../assets/images/Arrow87.png" alt="arrow">
                <h4><?php echo $timeAfter; ?> </h4>
            </div>

            <div class="ritiro">
                <div class="left-side-icon">
                    <img src="../assets/images/homeIcon.png" alt="home icon">
                    <p class="fw-bolder text-uppercase"> <?php echo $departure; ?></p>
                </div>
                <div class="right-side-icon">
                    <p class="title fw-bolder"> RITIRO </p>
                    <p class="small-text">Punto di spedizione</p>
                    <p class="data"><?php echo $timeDeparture; ?></p>
                </div>
            </div>
            <div class="ritiro">
                <div class="left-side-icon">
                    <img src="../assets/images/homeIcon.png" alt="home icon">
                    <p class="fw-bolder text-uppercase"><?php echo $destination; ?></p>
                </div>
                <div class="right-side-icon">
                    <p class="title fw-bolder"> CONSEGNA </p>
                    <p class="small-text">Punto di consegna</p>
                    <p class="data"><?php echo $timeDeparture; ?> </p>
                </div>
            </div>
            <a href="acquista.php?n=2&id='<?php echo $codId; ?>' class=" btn-acquista js-next">
                <h6>
                    ACQUISTA
                </h6>
            </a>
        </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="outerShell container-fluid">

        <?php if (strcmp($_SESSION['t'], 'pacco') == 0) {
            echo "<h5> PACKAGE SIZE: " . $_SESSION['flexRadioDefault1'] . "</h5> ";
        } else {

            echo "<ul><h5>WAGON STANDARD SIZE </h5> </ul>";
        } ?>

        <?php echo '<h5> ' . $_SESSION['noleggioFlex']  . '</h5>' ?>
        <?php echo '<h5> ORDER NUMBER ' . $_SESSION['numeroOrdinato']  . '</h5>' ?>
        <?php
        echo  '<a href="paginaFinale.php?n=5"">CONFIRMATION</a>';

        ?>
    </div>


    <!-- </form> -->


    <?php
    @include_once("./includes/footer.php");
    ?>
</body>

</html>