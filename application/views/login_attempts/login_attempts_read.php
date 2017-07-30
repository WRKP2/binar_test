<h2 style="margin-top:0px">Login_attempts Read</h2>
        <table class="table table-bordered table-striped table-hover">
	    <tr><td>Ip Address</td><td><?php echo $ip_address; ?></td></tr>
	    <tr><td>Login</td><td><?php echo $login; ?></td></tr>
	    <tr><td>Time</td><td><?php echo $time; ?></td></tr>
	</table>
	    <a href="<?php echo site_url('login_attempts') ?>" class="btn btn-default" style="float: center;">Cancel</a>
