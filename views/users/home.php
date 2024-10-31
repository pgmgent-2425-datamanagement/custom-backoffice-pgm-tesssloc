<h2>Users</h2>

<ul class="card_list">
    <?php
        foreach ($users as $user) {
            include __DIR__ . "/../partials/users.php";
        };
    ?>
</ul>

<a class="add_button button" href="/users/add">Add a user</a>