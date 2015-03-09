<table>
  <tr>
    <th>ID</th>
    <th>Room Name</th>
  </tr>
  {rooms}
  <tr>
    <td>{id}</td>
    <td>{name}</td>
    <td><a href='/admin/updateRoom/{id}'>Update room</a></td>
    <td><a href='/admin/deleteRoom/{id}'>Delete Room</a></td>
  </tr>
  {/rooms}
  <a href='/admin/addroom'>Add new room</a>
</table>


<table cols="" border="0">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Picture</th>
  </tr>
  {users}
  <tr>
    <td>{id}</td>
    <td>{username}</td>
    <td>{picture}</td>
    <td><a href='/admin/updateUser/{id}'>Update user</a></td>
    <td><a href='/admin/deleteUser/{id}'>Delete user</a></td>
  </tr>
  {/users}
  <a href='/admin/addUser'>Add user</a> 
</table>
