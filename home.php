<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Beranda");
?>


<body style="background-image: url('./assets/img/x.jpeg'); background-size: cover; background-repeat: no-repeat;">
    <?php
    createNavbar();

    $body = function () { ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5" style="color: white;">
            <h1 class="mb-4 text-uppercase text-center">beranda</h1>
            <!-- <img src="./assets/img/x.jpeg" alt="" srcset="">
            <img src="./assets/img/pxfuel.jpg" alt="" srcset=""> -->
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p> -->
        </div>
    <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>