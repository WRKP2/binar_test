<!doctype html>
<html>
    <head>
        <title>User List</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>User List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>User</th>
		<th>Password</th>
		
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user->nama ?></td>
		      <td><?php echo $user->alamat ?></td>
		      <td><?php echo $user->user ?></td>
		      <td><?php echo $user->password ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>