<h1>Data Comm 2015</h1>

<div id="body">
    <ul>
    {chat}
        <li>
            <div class="chat">
            <img src="assets/img/{pic}"/>
            <span class="chatusername">
                {who}:
            </span>
            <span class="chattext">
                {what}
            </span>
            </div>
        </li>
    {/chat}
    </ul>
</div>

<div id="msgbox">
<form action="chatroom" method="post" autocomplete="off">
    <div class="msgboxelement msgtextarea">
        <input type="text" name="msg" class="floatleft">
    </div>
    <div class="msgboxelement msgsendbtn">
        <input type="submit" value="Send" class="floatright">
    </div>
</form>
</div>