
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Data List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('data/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>ID</th>
		    <th>Nama</th>
		    <th>Asal</th>
		    <th>Gabung</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
        
        