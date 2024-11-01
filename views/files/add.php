<h2>Add</h2>
<form method="POST" action="/files/add" class="add_form form" enctype="multipart/form-data">
    <div class="add_form__item">
        <label for="users">User:</label>
        <select name="user_id" id="users"  class="add_form__item">
            <?php
                foreach ($users as $user) {
                    echo '<option value="' . $user->id . '">' . $user->username . '</option>';
                };
            ?>
        </select>
    </div>
    <div>
        <input type="file" accept="image/*" name="profilePic"></input>
    </div>
    <input class="button submit_button" type="submit" value="Add">
</form>