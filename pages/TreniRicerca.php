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
    <!-- fullpage css nodeModule -->
    <link rel="stylesheet" type="text/css" href="node_modules/fullpage.js/dist/fullpage.css" />
    <title>TrainProject</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <!--style="background-color: rgba(230, 230, 230,0) !important; -->
        <a class="navbar-brand" href="#">
            <!-- <img
          src="assets/images/logo.svg"
          width="30"
          height="30"
          class="d-inline-block align-top m-lg-1"
          alt=""
        />
        FLL -->
            <h3 class="trainNavbar fw-bold">TRAIN</h3>
        </a>

        <div class="collapse navbar-collapse justify-content-end align-content-center m-2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto p-1 mx-5">
                <li class="nav-item active mx-2">
                    <a class="nav-link fw-bolder links-nav" href="#section1">HOME</a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link fw-bolder links-nav" href="#section2">PROJECTS</a>
                </li>

                <li class="nav-item dropdown mx-2">
                    <a class="nav-link fw-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="account-menu">
                            <i class="fas fa-bars"></i>
                            <div class="outerUser">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./pages/registration.php">Registrati</a>
                        <a class="dropdown-item" href="./pages/registration.php">Accedi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something1</a>
                        <a class="dropdown-item" href="#">Something2</a>
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
                    <input type="text" name="fdove" placeholder="Milano..? " disabled>
                </div>
                <div class="check-in">
                    <p class="fw-bold">Destinazione</p>
                    <input type="text" placeholder="Venezia.." disabled>
                </div>
                <div class="check-out">
                    <nav class="check-out1">
                        <p class="fw-bold">Data</p>
                        <input type="date" value="2022-01-22" min="2022-01-01" max="2023-01-01" disabled>
                    </nav>
                    <span>
                        <a onclick="vear();">
                            <h6> CAMBIO RICERCA</h6>
                        </a>

                    </span>
                </div>

            </div>

        </div>

        <div class="section"></div>
    </div>

    <!-- fullpage js nodeModules -->
    <script type="text/javascript" src="node_modules/fullpage.js/dist/fullpage.js"></script>
    <!-- main.js script  -->
    <script src="Scripts/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>