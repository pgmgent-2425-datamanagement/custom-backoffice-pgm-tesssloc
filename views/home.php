<?php
    $search = $_GET['search'] ?? '';
?>

<h2>Stories</h2>

<form>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= $search ?>">
    <input type="submit" value="zoeken">
</form>
<ul>
    <?php
        foreach ($stories as $story) {
            include __DIR__ . "/partials/stories.php";
        };
    ?>
</ul>