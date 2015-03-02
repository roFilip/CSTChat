


<h1>Chat Rooms</h1>

<div id="body">
    <a href='/roomlist/add'>Add a new room</a>
    <table id="ChatRooms" >
        {rooms}
        <tr>
            <td>{name}</td>
            <td>{usr_count}</td>
            <td><a href="/roomlist/{id}">{link}</a></td>
        </tr>
        {/rooms}
    </table>
    
</div>


