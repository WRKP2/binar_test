<!doctype html>
<html>
    <head>
        <title>Produk List</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        
 <!-- ADMINLTE-->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- ADMINLTE-->
        
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            
        </style>
    </head>
    <body>
    
<!-- ADMINLTE-->
     <?php
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
    ?>
    <div style="padding:15px">
<!-- ADMINLTE-->

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Produk List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('produk/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
         <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>JudulProduk</th>
		    <th>IdKategoriProduk</th>
		    <th>Idmember</th>
		    <th>Keterangan</th>
		    <th>Phonekontak</th>
		    <th>NamaKontak</th>
		    <th>DiskripsiProduk</th>
		    <th>Mapaddress</th>
		    <th>Buka</th>
		    <th>Tutup</th>
		    <th>Rate</th>
		    <th>Ratediscount</th>
		    <th>Rancode</th>
		    <th>Tglinsert</th>
		    <th>Tglupdate</th>
		    <th>Idpegawai</th>
		    <th>Kapasitas</th>
		    <th>Standartpemakaian</th>
		    <th>Idsatuan</th>
		    <th>Token</th>
		    <th>City</th>
		    <th>Kabupaten</th>
		    <th>State</th>
		    <th>Isberbayar</th>
		    <th>Tglterakhirbayar</th>
		    <th>Star</th>
		    <th>Isverifikasi</th>
		    <th>Tglverifikasi</th>
		    <th>Idpemverifikasi</th>
		    <th>Isaktif</th>
		    <th>Lskategori</th>
		    <th>Menutext</th>
		    <th>Kategoritext</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
        
        <!-- ADMINLTE-->
        </div>
           </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
    </div><!--./wrapper -->
    <!-- ADMINLTE-->

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
    return {
    "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
    };
    var t = $("#mytable").dataTable({
            initComplete: function() {
            var api = this.api();
            $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                    api.search(this.value).draw();
                    }
                    });
            },
            oLanguage: {
            sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "produk/json", "type": "POST"},
                    columns: [
                    {
                    "data": "idx",
                            "orderable": false
                    }, {"data": "JudulProduk"},{"data": "idKategoriProduk"},{"data": "idmember"},{"data": "Keterangan"},{"data": "phonekontak"},{"data": "NamaKontak"},{"data": "DiskripsiProduk"},{"data": "mapaddress"},{"data": "buka"},{"data": "tutup"},{"data": "rate"},{"data": "ratediscount"},{"data": "rancode"},{"data": "tglinsert"},{"data": "tglupdate"},{"data": "idpegawai"},{"data": "kapasitas"},{"data": "standartpemakaian"},{"data": "idsatuan"},{"data": "Token"},{"data": "city"},{"data": "kabupaten"},{"data": "state"},{"data": "isberbayar"},{"data": "tglterakhirbayar"},{"data": "star"},{"data": "isverifikasi"},{"data": "tglverifikasi"},{"data": "idpemverifikasi"},{"data": "isaktif"},{"data": "lskategori"},{"data": "menutext"},{"data": "kategoritext"},
                    {
                    "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                    }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                    }
            });
    });
</script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>
    
</body>
</html>