<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Beranda");
?>


<body>
    <?php
    createNavbar();

    $body = function () { ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5" style="color: black;">

            <div class="d-flex justify-content-center">
                <div class="card shadow-lg rounded" style="width: 70rem;">
                    <img src="./assets/img/x.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-5">BERANDA</h1>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quos nulla suscipit doloribus totam numquam quia inventore vitae excepturi eligendi saepe nemo ea, expedita dicta itaque veniam porro amet tempore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur suscipit perspiciatis totam, quo, laboriosam sapiente magnam magni aspernatur repellendus aliquid quam alias. Veniam ducimus nam sequi libero, totam maxime debitis.</p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
        </div>
    <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>