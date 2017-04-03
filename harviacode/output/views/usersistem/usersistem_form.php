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
        <h2 style="margin-top:0px">Usersistem <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Npp <?php echo form_error('npp') ?></label>
            <input type="text" class="form-control" name="npp" id="npp" placeholder="Npp" value="<?php echo $npp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoTelpon <?php echo form_error('NoTelpon') ?></label>
            <input type="text" class="form-control" name="NoTelpon" id="NoTelpon" placeholder="NoTelpon" value="<?php echo $NoTelpon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User <?php echo form_error('user') ?></label>
            <input type="text" class="form-control" name="user" id="user" placeholder="User" value="<?php echo $user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Statuspeg <?php echo form_error('statuspeg') ?></label>
            <input type="text" class="form-control" name="statuspeg" id="statuspeg" placeholder="Statuspeg" value="<?php echo $statuspeg; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Photo <?php echo form_error('photo') ?></label>
            <input type="text" class="form-control" name="photo" id="photo" placeholder="Photo" value="<?php echo $photo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ym <?php echo form_error('ym') ?></label>
            <input type="text" class="form-control" name="ym" id="ym" placeholder="Ym" value="<?php echo $ym; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isaktif <?php echo form_error('isaktif') ?></label>
            <input type="text" class="form-control" name="isaktif" id="isaktif" placeholder="Isaktif" value="<?php echo $isaktif; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idusergroup <?php echo form_error('idusergroup') ?></label>
            <input type="text" class="form-control" name="idusergroup" id="idusergroup" placeholder="Idusergroup" value="<?php echo $idusergroup; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkabupaten <?php echo form_error('idkabupaten') ?></label>
            <input type="text" class="form-control" name="idkabupaten" id="idkabupaten" placeholder="Idkabupaten" value="<?php echo $idkabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpropinsi <?php echo form_error('idpropinsi') ?></label>
            <input type="text" class="form-control" name="idpropinsi" id="idpropinsi" placeholder="Idpropinsi" value="<?php echo $idpropinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Imehp <?php echo form_error('imehp') ?></label>
            <input type="text" class="form-control" name="imehp" id="imehp" placeholder="Imehp" value="<?php echo $imehp; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usersistem') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>