<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Kriteria");
?>


<body>
    <?php
    createNavbar();

    $body = function () { ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Empty</h2>
        <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>