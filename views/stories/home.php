<h2>Stories</h2>

<form action="/stories" method="GET">
    <?php if (!empty($_GET['user_id'])): ?>
        <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">
    <?php endif; ?>

    <label for="search">Zoek een verhaal:</label>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= $search ?>">
    <input type="submit" value="zoeken">
</form>
<select name="sort" id="sort">
    <option value="alphabetical">Alfabetisch titel a-z</option>
    <option value="alphabetical">Alfabetisch titel z-a</option>
    <option value="date_posted">Aanmaakdatum nieuw-oud</option>
    <option value="date_posted">Aanmaakdatum oud-nieuw</option>
</select>
<ul>
    <?php
        foreach ($stories as $story) {
            include __DIR__ . "/../partials/stories.php";
        };
    ?>
</ul>

<a href="/stories/add">Add a story</a>