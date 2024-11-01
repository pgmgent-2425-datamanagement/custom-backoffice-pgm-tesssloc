<h2>Edit File</h2>
<form method="POST" action="/files/edit/<?=$file?>" class="edit_form form" enctype="multipart/form-data">
    <input type="file" accept="image/*" name="newFile"></input>
    <input class="button submit_button" type="submit" value="Save">
</form>