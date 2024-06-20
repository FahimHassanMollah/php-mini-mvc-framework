<?php views('/partials/header');?>

<h1>Portfolio </h1>

<?php foreach($portfolios as $portfolio): ?>
    <h2><?= $portfolio['title'] ?></h2>
    <p><?= $portfolio['description'] ?></p>
<?php endforeach; ?>

<?php views('/partials/footer');?>
 <!-- any other way to write this code -->

