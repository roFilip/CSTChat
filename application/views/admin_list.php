<table cols="" border="0">
  <tr>
    <th>ID</th>
    <th>Room Name</th>
  </tr>
  {rooms}
  <tr>
    <td>{id}</td>
    <td>{roomname}</td>
  </tr>
  {/rooms}
</table>
<a href='/admin/addRoom'>Add new room</a> 
<a href='/admin/updateRoom'>Update room</a> 
<a href='/admin/deleteRoom'>Delete Room</a> 

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
  </tr>
  {/users}
</table>

<a href='/admin/addUser'>Add user</a> 
<a href='/admin/updateUser'>Update user</a> 
<a href='/admin/deleteUser'>Delete user</a> 
