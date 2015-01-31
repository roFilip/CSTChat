<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	

</head>
<body>

<div id="container">
	<h1>Chat Rooms</h1>

	<div id="body">
        <table id="ChatRooms" style="width:100%">
            <tr>
                <td>{name}</td>
                <td>{capacity}</td>
                <td><a href="/roomlist">{link}</a></td>
            </tr>
            <tr>
                <td>Term Project</td>
                <td>10/10</td>
                <td></td>
            </tr>
            <tr>
                <td>Data-Comm Assignment</td>
                <td>0/10</td>
                <td><a href="/roomlist">Join</a></td>
            </tr>
            <tr>
                <td>Midterm-Study</td>
                <td>7/10</td>
                <td>Invite Only</td>
            </tr>
        </table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>