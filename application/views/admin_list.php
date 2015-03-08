<table cols="" border="0">
  <tr>
    <th>ID</th>
    <th>Room Name</th>
  </tr>
  {rooms}
  <tr>
    <td>{id}</td>
    <td>{roomname}</td>
    <td><a href='/admin/updateRoom/{id}'>Update room</a></td>
    <td><a href='/admin/deleteRoom/{id}'>Delete Room</a></td>
  </tr>
  {/rooms}
</table>
<a href='/roomlist/add'>Add new room</a>

<table cols="" border="0">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Picture</th>
  </tr>
  {users}
  <tr>
    <td>{id}</td>
    <td>{who}</td>
    <td>{pic}</td>
    <td><a href='/admin/updateUser/{id}'>Update user</a></td>
    <td><a href='/admin/deleteUser/{id}'>Delete user</a></td>
  </tr>
  {/users}
</table>

<a href='/admin/addUser'>Add user</a> 