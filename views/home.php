<h1>Base MVC</h1>
<p>Welcome to this base mvc project.</p>
<p>test</p>
<h2>Stories</h2>
<ul>
    <?php
        foreach ($stories as $story) {
            include __DIR__ . "/partials/stories.php";
        };
    ?>
</ul>