<h2>Stories</h2>

<form action="/stories" method="GET">
    <?php if (!empty($_GET['user_id'])): ?>
        <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">
    <?php endif; ?>

    <label for="search">Zoek:</label>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= $search ?>">

    <label for="sort">Sorteer op:</label>
    <select name="sort" id="sort">
        <option value="standard"></option>
        <option value="alphabetical">Alfabetisch titel a-z</option>
        <option value="alphabetical_r">Alfabetisch titel z-a</option>
        <option value="date_posted">Aanmaakdatum nieuw-oud</option>
        <option value="date_posted_r">Aanmaakdatum oud-nieuw</option>
    </select>

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