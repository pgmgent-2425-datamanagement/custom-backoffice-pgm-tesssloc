<h2>Edit File</h2>
<form method="POST" action="/files/edit/<?=$file?>" class="edit_form form" enctype="multipart/form-data">
    <div class="add_form__item">
        <p>User: <?=$selectedUser->username?></p>
    </div>
    <input type="file" accept="image/*" name="newFile"></input>
    <input type="hidden" value="<?=$file?>" name="oldFile"></input>
    <input class="button submit_button" type="submit" value="Save">
</form>