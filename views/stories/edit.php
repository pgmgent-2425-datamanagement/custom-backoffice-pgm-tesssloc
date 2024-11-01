<h2>Edit</h2>
<form method="POST" action="/stories/edit/<?=$story->id?>" class="edit_form form">
    <input type="text" name="title" value="<?=$story->title?>"></input>
    <textarea rows="10" name="content"><?=$story->content?></textarea>
    <select name="user_id" id="users">
        <?php
            foreach ($users as $user) {
                $selected = ($user->id == $story->user_id) ? 'selected' : '';
                echo '<option value="' . $user->id . '" ' . $selected . '>' . $user->username . '</option>';
            };
        ?>
    </select>
    <input type="datetime" name="date_posted" value="<?=$story->date_posted?>"></input>
    <input class="button submit_button" type="submit" value="Save">
</form>