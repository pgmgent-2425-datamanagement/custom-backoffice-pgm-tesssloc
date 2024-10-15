<h2>Edit</h2>
<form method="POST" action="/stories/edit/<?=$story->id?>" class="edit_form">
    <?=print_r($story)?>;
    <input type="text" name="title" value="<?=$story->title?>"></input>
    <input type="text" name="content" value="<?=$story->content?>"></input>
    <select name="user_id" id="users">
        <?php
            foreach ($users as $user) {
                $selected = ($user->id == $story->user_id) ? 'selected' : '';
                echo '<option value="' . $user->id . '" ' . $selected . '>' . $user->username . '</option>';
            };
        ?>
    </select>
    <input type="datetime" name="date_posted" value="<?=$story->date_posted?>"></input>
    <input type="submit" value="Save">
</form>