<div class="errors">{errmsg}</div>
<form method="post" action="/login">
    <input type="text" placeholder="Username" name="username" value="{post_username}">
    <br/>
    <input type="password" placeholder="Password" name="password" value="{post_password}">
    <br/><br/>
    <input type="text" placeholder="Path to picture" name="picture">
    <br/><br/>
    <input type="submit" name="button_signin" value="Sign in">
    <input type="submit" name="button_create" value="Create account">
</form>