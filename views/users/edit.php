<h2>Edit User</h2>
<form method="POST" action="/users/edit/<?=$user->id?>" class="edit_form">
    <input type="text" name="firstName" value="<?=$user->firstName?>" placeholder="First Name"></input>
    <input type="text" name="lastName" value="<?=$user->lastName?>" placeholder="Last Name"></input>
    <input type="text" name="username" value="<?=$user->username?>" placeholder="Username"></input>
    <input type="password" name="password" placeholder="Password"></input>
    <input type="email" name="email" value="<?=$user->email?>" placeholder="Email"></input>
    <input type="text" name="profilePic" value="<?=$user->profilePic?>" placeholder="Profile Picture URL"></input>
    <input type="submit" value="Save">
</form>
