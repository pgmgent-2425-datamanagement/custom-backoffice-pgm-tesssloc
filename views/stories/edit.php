<h2>Edit</h2>
<form action="" class="edit_form">
    <?=print_r($story)?>;
    <input type="text" placeholder="<?=$story->title?>"></input>
    <input type="text" placeholder="<?=$story->content?>"></input>
    <input type="text" placeholder="<?=$story->user_id?>"></input>
    <input type="text" placeholder="<?=$story->date_posted?>"></input>
    <input type="submit" value="Save">
</form>