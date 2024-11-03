<h2>Edit User</h2>
<form method="POST" action="/users/edit/<?=$user->id?>" class="edit_form form" enctype="multipart/form-data">
    <input type="text" name="firstName" value="<?=$user->firstName?>" placeholder="First Name" class="input_text"></input>
    <input type="text" name="lastName" value="<?=$user->lastName?>" placeholder="Last Name" class="input_text"></input>
    <input type="text" name="username" value="<?=$user->username?>" placeholder="Username" class="input_text"></input>
    <input type="password" name="password" placeholder="Password" class="input_text"></input>
    <input type="email" name="email" value="<?=$user->email?>" placeholder="Email" class="input_text"></input>
    <input type="file"  accept="image/*" name="profilePic" class="input_text"></input>
    <input type="hidden" name="oldProfilePic" value="<?= $user->profilePic ?>">
    <input class="button submit_button" type="submit" value="Save">
</form>
