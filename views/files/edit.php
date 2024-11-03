<h2>Edit File</h2>
<form method="POST" action="/files/edit/<?=$file?>" class="edit_form form" enctype="multipart/form-data">
    <div class="add_form__item">
        <label for="users">User:</label>
        <select name="user_id" id="users"  class="add_form__item">
            <?php
                foreach ($users as $user) {
                    $selected = ($user->id == $selectedUser->user_id) ? 'selected' : '';
                    echo '<option value="' . $user->id . '">' . $user->username . '</option>';
                };
            ?>
        </select>
    </div>
    <input type="file" accept="image/*" name="newFile"></input>
    <input type="hidden" value="<?=$file?>" name="oldFile"></input>
    <input class="button submit_button" type="submit" value="Save">
</form>

<?php print_r($file); ?>
