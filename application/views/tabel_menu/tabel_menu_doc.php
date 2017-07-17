<!doctype html>
<html>
    <head>
        <title>Tabel_menu List</title>
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
        <h2>Tabel_menu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul Menu</th>
		<th>Link</th>
		<th>Icon</th>
		<th>Is Main Menu</th>
		
            </tr><?php
            foreach ($tabel_menu_data as $tabel_menu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tabel_menu->judul_menu ?></td>
		      <td><?php echo $tabel_menu->link ?></td>
		      <td><?php echo $tabel_menu->icon ?></td>
		      <td><?php echo $tabel_menu->is_main_menu ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>