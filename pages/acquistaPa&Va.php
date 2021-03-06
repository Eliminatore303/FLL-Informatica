<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();
require_once('../php_classes/Main.php');
$main = unserialize(serialize($_SESSION['main']));
$_SESSION['loggedIn'] = 1;
$_SESSION['t'] = $_REQUEST['t'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    @include_once("./includes/header.php");
    ?>
    <!-- main css  -->
    <link rel="stylesheet" href="../src_CSS/acquistaPageP&V.css" />


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

    <form action="acquistaRiepilogo.php" method="post">
        <div class="left-side container-fluid">
            <h2>SPEDITION <?php echo $_REQUEST['t'] ?></h2>
            <div class="form1">
                <div class="standard-sizes">
                    <?php if (strcmp($_REQUEST['t'], 'pacco') == 0) {
                        echo '    <h5>PACKAGE SIZE</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" value="Grande max 100x70x40cm" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Max size 100x70x40cm
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"  value="Medio max 60x30x40cm" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Medium size 60x30x40cm
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" value="Piccolo max 20x10x10cm" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Small size 20x10x10cm
                            </label>
                        </div>';
                    }
                    ?>

                </div>

                <div class="noleggio">
                    <h5 style="margin-bottom:1em;">Do you want to rent it?</h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="noleggioFlex" value="Si Noleggio"
                            id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            RENT
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="noleggioFlex" value="No Rent"
                            id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            It is not necessary
                        </label>
                    </div>

                </div>
                <div class="textN">
                    <?php if (strcmp($_REQUEST['t'], 'package') == 0) {
                        echo '<h5>NUMBER OF PACKAGES</h5>';
                    } else echo '<h5 style="position: relative; bottom: -0.7em; padding-bottom:1.5em;">NUMBER OF WAGONS </h5>';
                    ?>
                    <input type="number" placeholder="Ex:1" name="numReg" min="1" max="9" class="numo" required>
                </div>

            </div>

            <?php if (strcmp($_REQUEST['t'], 'package') == 0) {
                echo  '<button onclick="window.location.href="acquistaRiepilogo.php?n=4&id=' . $_SESSION['idTrain'] . '&t=pacco"" type="submit" name="pacco">CONFIMATION</button>';
            } else echo '<button style="margin-bottom:5em;"onclick="window.location.href="acquistaRiepilogo.php?n=4&id=' . $_SESSION['idTrain'] . '&t=vagone"" type="submit" name="vagone">CONFIMATION</button>';
            ?>
        </div>
    </form>

    <?php
    @include_once("./includes/footer.php");
    ?>
</body>

</html>