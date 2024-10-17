<h2>Add</h2>
<form method="POST" action="/users/add" class="add_form">
    <div>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" placeholder="First Name"></input>
    </div>
    <div>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" placeholder="Last Name"></input>
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username"></input>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password"></input>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email"></input>
    </div>
    <div>
        <label for="profilePic">Profile Picture URL</label>
        <input type="text" name="profilePic" placeholder="Profile Picture URL"></input>
    </div>
    <input type="submit" value="Add">
</form>