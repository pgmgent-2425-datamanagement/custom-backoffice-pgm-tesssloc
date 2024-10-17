<h2>Users</h2>

<ul>
    <?php
        foreach ($users as $user) {
            include __DIR__ . "/../partials/users.php";
        };
    ?>
</ul>

<a href="/users/add">Add a user</a>