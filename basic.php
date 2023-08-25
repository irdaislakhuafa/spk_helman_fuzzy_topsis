<?php
function createHeader($title)
{ ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- for sidebar -->

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/sidebar/css/style.css">
    </head>
<?php }

function createFooter()
{ ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/sidebar/js/jquery.min.js"></script>
    <script src="assets/sidebar/js/popper.js"></script>
    <script src="assets/sidebar/js/bootstrap.min.js"></script>
    <script src="assets/sidebar/js/main.js"></script>
<?php }

function createNavbar()
{ ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container d-flex  text-center ">
            <h1 class="text-white" style="font-size: 220%;">Sistem Pendukung Keputusan Pemilihan Lahan Tanaman Jagung</h1>
        </div>
    </nav>
<?php }

function createSidebar($body = null)
{ ?>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#"><span class="fa fa-home mr-3"></span> Beranda</a>
                </li>
                <li>
                    <a href="#" class="text-capitalize"><span class="fa fa-sticky-note mr-3"></span> alternatif</a>
                </li>
                <!-- TODO: added specific icon -->
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Kriteria</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Fuzzy</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Topsis</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Hasil</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <?php if ($body == null) { ?>
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Sidebar #04</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum.</p>
            </div>
        <?php } else if ($body != null) {
            $body();
        } ?>

    </div>

<?php }
