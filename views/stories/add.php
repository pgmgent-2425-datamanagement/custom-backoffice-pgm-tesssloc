<h2>Add</h2>
<form method="POST" action="/stories/add" class="add_form" enctype="multipart/form-data">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title"></input>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea rows="3" name="content" placeholder="Content"></textarea>
    </div>
    <select name="user_id" id="users">
        <?php
            foreach ($users as $user) {
                echo '<option value="' . $user->id . '">' . $user->username . '</option>';
            };
        ?>
    </select>
    <input type="datetime-local" name="date_posted"></input>
    <input type="submit" value="Add">
</form>