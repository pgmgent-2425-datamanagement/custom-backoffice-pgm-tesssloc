<h2>Add</h2>
<form method="POST" action="/stories/add" class="add_form form" enctype="multipart/form-data">
    <div class="add_form__item">
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Title"></input>
    </div>
    <div class="add_form__item">
        <label for="content">Content:</label>
        <textarea rows="10" name="content" placeholder="Content"></textarea>
    </div>
    <div class="add_form__item">
        <label for="users">Author:</label>
        <select name="user_id" id="users"  class="add_form__item">
            <?php
                foreach ($users as $user) {
                    echo '<option value="' . $user->id . '">' . $user->username . '</option>';
                };
            ?>
        </select>
    </div>
    <div class="add_form__item">
        <label for="date_posted">Posted on:</label>
        <input type="datetime-local" name="date_posted"></input>
    </div>
    <input class="button submit_button" type="submit" value="Add">
</form>