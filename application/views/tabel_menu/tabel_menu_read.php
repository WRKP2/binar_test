<h2 style="margin-top:0px">Tabel_menu Read</h2>
        <table class="table table-bordered table-striped table-hover">
	    <tr><td>Judul Menu</td><td><?php echo $judul_menu; ?></td></tr>
	    <tr><td>Link</td><td><?php echo $link; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td>Is Main Menu</td><td><?php echo $is_main_menu; ?></td></tr>
	</table>
	    <a href="<?php echo site_url('tabel_menu') ?>" class="btn btn-default" style="float: center;">Cancel</a>
