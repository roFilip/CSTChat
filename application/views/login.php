<table class="login">
	<div class="errors">{errmsg}</div>
    <form action="/login/confirm" method="post">
        <input type="text" placeholder="Username" name="username"><br/><br/>
        <input type="password" placeholder="Password" name="password"><br/><br/>
        <input type="submit" value="Login">
    </form>
    <p>
        <a href="/roomlist">RoomList</a>
        <a href="/chatroom">ChatRoom</a>
    </p>
</table>