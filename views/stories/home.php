<h2>Stories</h2>

<form action="/stories" method="GET">
    <?php if (!empty($_GET['user_id'])): ?>
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($_GET['user_id']) ?>">
    <?php endif; ?>

    <label for="search">Zoek een verhaal</label>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= htmlspecialchars($search) ?>">
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