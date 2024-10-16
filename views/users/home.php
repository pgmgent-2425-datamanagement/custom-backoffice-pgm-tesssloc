<?php
    $search = $_GET['search'] ?? '';
?>

<h2>Users</h2>

<form>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= $search ?>">
    <input type="submit" value="zoeken">
</form>
<ul>
    <?php
        foreach ($users as $user) {
            include __DIR__ . "/../partials/users.php";
        };
    ?>
</ul>