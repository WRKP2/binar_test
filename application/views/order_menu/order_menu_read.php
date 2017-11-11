<h2 style="margin-top:0px">Order_menu Read</h2>
        <table class="table table-bordered table-striped table-hover">
	    <tr><td>ID RESTO</td><td><?php echo $ID_RESTO; ?></td></tr>
	    <tr><td>ID MENU</td><td><?php echo $ID_MENU; ?></td></tr>
	    <tr><td>ID USERAPP</td><td><?php echo $ID_USERAPP; ?></td></tr>
	    <tr><td>JUMLAH</td><td><?php echo $JUMLAH; ?></td></tr>
	    <tr><td>ORDER DATE</td><td><?php echo $ORDER_DATE; ?></td></tr>
	    <tr><td>STATUS</td><td><?php echo $STATUS; ?></td></tr>
	    <tr><td>ALAMAT PENGIRIMAN</td><td><?php echo $ALAMAT_PENGIRIMAN; ?></td></tr>
	</table>
	    <a href="<?php echo site_url('order_menu') ?>" class="btn btn-default" style="float: center;">Cancel</a>
