<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Usersistem List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('usersistem/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('usersistem/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('usersistem'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Npp</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>NoTelpon</th>
		<th>User</th>
		<th>Password</th>
		<th>Statuspeg</th>
		<th>Photo</th>
		<th>Email</th>
		<th>Ym</th>
		<th>Isaktif</th>
		<th>Idusergroup</th>
		<th>Idkabupaten</th>
		<th>Idpropinsi</th>
		<th>Imehp</th>
		<th>Action</th>
            </tr><?php
            foreach ($usersistem_data as $usersistem)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $usersistem->npp ?></td>
			<td><?php echo $usersistem->Nama ?></td>
			<td><?php echo $usersistem->alamat ?></td>
			<td><?php echo $usersistem->NoTelpon ?></td>
			<td><?php echo $usersistem->user ?></td>
			<td><?php echo $usersistem->password ?></td>
			<td><?php echo $usersistem->statuspeg ?></td>
			<td><?php echo $usersistem->photo ?></td>
			<td><?php echo $usersistem->email ?></td>
			<td><?php echo $usersistem->ym ?></td>
			<td><?php echo $usersistem->isaktif ?></td>
			<td><?php echo $usersistem->idusergroup ?></td>
			<td><?php echo $usersistem->idkabupaten ?></td>
			<td><?php echo $usersistem->idpropinsi ?></td>
			<td><?php echo $usersistem->imehp ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('usersistem/read/'.$usersistem->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('usersistem/update/'.$usersistem->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('usersistem/delete/'.$usersistem->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>