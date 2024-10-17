<h2>Stories</h2>

<form>
    <label for="search">Zoek een verhaal</label>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= $search ?>">
    <input type="submit" value="zoeken">
</form>
<ul>
    <?php
        foreach ($stories as $story) {
            include __DIR__ . "/../partials/stories.php";
        };
    ?>
</ul>

<a href="/stories/add">Add a story</a>