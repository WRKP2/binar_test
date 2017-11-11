<h2 style="margin-top:0px">Order_menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">ID RESTO <?php echo form_error('ID_RESTO') ?></label>
            <input type="text" class="form-control" name="ID_RESTO" id="ID_RESTO" placeholder="ID RESTO" value="<?php echo $ID_RESTO; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID MENU <?php echo form_error('ID_MENU') ?></label>
            <input type="text" class="form-control" name="ID_MENU" id="ID_MENU" placeholder="ID MENU" value="<?php echo $ID_MENU; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID USERAPP <?php echo form_error('ID_USERAPP') ?></label>
            <input type="text" class="form-control" name="ID_USERAPP" id="ID_USERAPP" placeholder="ID USERAPP" value="<?php echo $ID_USERAPP; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">JUMLAH <?php echo form_error('JUMLAH') ?></label>
            <input type="text" class="form-control" name="JUMLAH" id="JUMLAH" placeholder="JUMLAH" value="<?php echo $JUMLAH; ?>" />
        </div>
	    <div class="form-group">
            <label for="ORDER_DATE">ORDER DATE <?php echo form_error('ORDER_DATE') ?></label>
            <input type="text" class="form-control" name="ORDER_DATE" id="ORDER_DATE" placeholder="DD/MM/YYYY" value="<?php echo $ORDER_DATE; ?>" /><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
	    <div class="form-group">
            <label for="int">STATUS <?php echo form_error('STATUS') ?></label>
            <input type="text" class="form-control" name="STATUS" id="STATUS" placeholder="STATUS" value="<?php echo $STATUS; ?>" />
        </div>
	    <div class="form-group">
            <label for="ALAMAT_PENGIRIMAN">ALAMAT PENGIRIMAN <?php echo form_error('ALAMAT_PENGIRIMAN') ?></label>
            <textarea class="form-control" rows="3" name="ALAMAT_PENGIRIMAN" id="ALAMAT_PENGIRIMAN" placeholder="ALAMAT PENGIRIMAN"><?php echo $ALAMAT_PENGIRIMAN; ?></textarea>
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('order_menu') ?>" class="btn btn-default">Cancel</a>
	</form>
