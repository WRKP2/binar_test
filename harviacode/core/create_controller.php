<?php

$string = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class " . $c . " extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        \$this->load->model('$m');
        \$this->load->library('form_validation');";

if ($jenis_tabel <> 'reguler_table') {
    $string .= "        \n\t\$this->load->library('datatables');";
}

$string .= "
    }";

if ($jenis_tabel == 'reguler_table') {

    $string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));
        
        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index.html';
            \$config['first_url'] = base_url() . '$c_url/index.html';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
            'title' => '".$c."',
            'js' => '".$table_name . "_ajax',
            'css_file' => '".$table_name . "_css',
    
        );";
            
     $string .= "    \$this->render('$c_url/$v_list', \$data);";
     $string .= "}";
} else {

    $string .="\n\n    public function index()
    {
        \$data = array(
            'js' => '".$table_name . "_ajax',
            'css_file' => '".$table_name . "_css',
    
        );
        \$this->render('$c_url/$v_list',\$data );
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo \$this->" . $m . "->json();
    }";
}

$string .= "\n\n    public function read(\$id) 
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);
        if (\$row) {
            \$data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t    );
            \$this->render('$c_url/$v_read', \$data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }";

//autocomplete
 $string .= "\n\n\n //=========Autocomplete========= 
        public function get_".$table_name."_search() {
        \$q = \$this->input->post('q',TRUE); 
        \$term = \$_POST['term'];
        if(!empty(\$term)){
        \$query = \$this->". $m ."->getList".$table_name."Auto(\$term); //query model
        \$hasilnya       =  array();
        foreach (\$query->result() as \$d) {
            \$hasilnya[]     = array(
                'label' => \$d->".$pk.".'-'.\$d->"."//masukan label autocompliet (harus sama dengan model)".",  
                'value' => \$d->"."//masukan value autocompliet (harus sama dengan model)"."
            );
        }
        echo json_encode(\$hasilnya);  
        }
    }";

//ANDROID
if ($android == '1') {
    $column_all = array();
    foreach ($all as $row) {
        $column_all[] = $row['column_name'];
    }
//keperluan parameter    
    $columnallparam = implode(",\$x", $column_all);

    $string .= "\n\n//=========READ=========
        public function read" . $table_name . "Android() {
        \$this->load->helper('json'); \n
        \$xSearch = \$_POST['search']; \n";

    foreach ($all as $row) {
        $string .= "\n\t\t \$this->json_data['" . $row['column_name'] . "'] = \"\";";
    }

    $string .= "\n\n\t\t\$this->load->model('" . $m . "');
                \n\t\t\$response = array();
                \n\t\t\$xQuery = \$this->" . $m . "->getList" . $table_name . "();

                \n\t\tforeach (\$xQuery->result() as \$row) {";

    foreach ($all as $row) {
        $string .= "\n\t\t\t \$this->json_data['" . $row['column_name'] . "'] = \$row->" . $row['column_name'] . ";";
    }
    $string .= "\n\t\tarray_push(\$response, \$this->json_data); \n\t\t}
            
            \n\t\tif (empty(\$response)) {
            \n\t\tarray_push(\$response, \$this->json_data);
        \n\t\t} \n
        \n\t\techo json_encode(\$response);
    }
    \n\n//=========READ=========";

    $string .= "\n\n//=========INSERT AND UPDATE=========
        \n\npublic function simpanupdate" . $table_name . "Android() {
        \$this->load->helper('json'); \n
         if (!empty(\$_POST['ed$pk'])) {
            \n\$x$pk = \$_POST['ed$pk'];
        \n} else {
            \n\$x$pk = '0';
        \n}";

    //parameter
    foreach ($all as $row) {
        if ($row['column_name'] != $pk) {
            $string .= "\n\t\t \$x" . $row['column_name'] . " = \$_POST['ed" . $row['column_name'] . "'];";
        }
    }

    $string .= "\n\n\t\t\$this->load->model('" . $m . "');
                \$response = array();
                \n\t\tif (\$x$pk != '0') {
                //===UPDATE===
                \n\t\t\$xStr = \$this->" . $m . "->Update" . $table_name . "(\$x" . $columnallparam . ");";


    $string .= "\n\t\t} else {
            //===INSERT===
            \n\t\t\$xStr = \$this->" . $m . "->Insert" . $table_name . "(\$x" . $columnallparam . ");
            \t}
            
         \n\t\t\$row = \$this->" . $m . "->getLastIndex" . $table_name . "();";


    foreach ($all as $row) {
        $string .= "\n\t\t\t \$this->json_data['" . $row['column_name'] . "'] = \$row->" . $row['column_name'] . ";";
    }

    $string .= "\n array_push(\$response, \$this->json_data);

        \n\t\t echo json_encode(\$response);
  
    }
    \n\n//=========INSERT AND UPDATE=========";

    $string .= "\n\n//=========DELET=========
        \n\npublic function delet" . $table_name . "Android() {
        \n\t\t\$x$pk = \$_POST['ed$pk'];
        \$this->load->model('" . $m . "');
        \$this->" . $m . "->Delet" . $table_name . "(\$x$pk);
        \$this->load->helper('json');
        echo json_encode(null);
    }
    \n\n//=========DELET=========";


    $string .= "\n\n//=========GET DETAIL=========
        \n\npublic function getDetail" . $table_name . "Android() {
        \n\t\t\$x$pk = \$_POST['ed$pk'];
        \$this->load->model('" . $m . "');
        \$this->" . $m . "->getDetail" . $table_name . "(\$x$pk);
        \$this->load->helper('json');";

    foreach ($all as $row) {
        $string .= "\n\t\t\$this->json_data['" . $row['column_name'] . "'] = \$row->" . $row['column_name'] . ";";
    }

    $string .= "\n\t\techo json_encode(\$this->json_data);
}
    \n\n//=========GET DETAIL=========";
}

//ANDROID

$string .= "\n\npublic function create() 
    {
        \$data = array(
            'button' => 'Create',
            'action' => site_url('$c_url/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t);
        \$this->render('$c_url/$v_form', \$data);
    }
    
    public function create_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->" . $m . "->insert(\$data);
            \$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update(\$id) 
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);

        if (\$row) {
            \$data = array(
                'button' => 'Update',
                'action' => site_url('$c_url/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->" . $row['column_name'] . "),";
}
$string .= "\n\t    );
            \$this->render('$c_url/$v_form', \$data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->" . $m . "->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete(\$id) 
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);

        if (\$row) {
            \$this->" . $m . "->delete(\$id);
            \$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }

    public function _rules() 
    {";
foreach ($non_pk as $row) {
    $int = $row3['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
    $string .= "\n\t\$this->form_validation->set_rules('" . $row['column_name'] . "', '" . strtolower(label($row['column_name'])) . "', 'trim|required$int');";
}
$string .= "\n\n\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$this->load->helper('exportexcel');
        \$namaFile = \"$table_name.xls\";
        \$judul = \"$table_name\";
        \$tablehead = 0;
        \$tablebody = 1;
        \$nourut = 1;
        //penulisan header
        header(\"Pragma: public\");
        header(\"Expires: 0\");
        header(\"Cache-Control: must-revalidate, post-check=0,pre-check=0\");
        header(\"Content-Type: application/force-download\");
        header(\"Content-Type: application/octet-stream\");
        header(\"Content-Type: application/download\");
        header(\"Content-Disposition: attachment;filename=\" . \$namaFile . \"\");
        header(\"Content-Transfer-Encoding: binary \");

        xlsBOF();

        \$kolomhead = 0;
        xlsWriteLabel(\$tablehead, \$kolomhead++, \"No\");";
    foreach ($non_pk as $row) {
        $column_name = label($row['column_name']);
        $string .= "\n\txlsWriteLabel(\$tablehead, \$kolomhead++, \"$column_name\");";
    }
    $string .= "\n\n\tforeach (\$this->" . $m . "->get_all() as \$data) {
            \$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber(\$tablebody, \$kolombody++, \$nourut);";
    foreach ($non_pk as $row) {
        $column_name = $row['column_name'];
        $xlsWrite = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? 'xlsWriteNumber' : 'xlsWriteLabel';
        $string .= "\n\t    " . $xlsWrite . "(\$tablebody, \$kolombody++, \$data->$column_name);";
    }
    $string .= "\n\n\t    \$tablebody++;
            \$nourut++;
        }

        xlsEOF();
        exit();
    }";
}

if ($export_word == '1') {
    $string .= "\n\n    public function word()
    {
        header(\"Content-type: application/vnd.ms-word\");
        header(\"Content-Disposition: attachment;Filename=$table_name.doc\");

        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        \$this->load->view('" . $c_url . "/" . $v_doc . "',\$data);
    }";
}

if ($export_pdf == '1') {
    $string .= "\n\n    function pdf()
    {
        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        \$html = \$this->load->view('" . $c_url . "/" . $v_pdf . "', \$data, true);
        \$this->load->library('pdf');
        \$pdf = \$this->pdf->load();
        \$pdf->WriteHTML(\$html);
        \$pdf->Output('" . $table_name . ".pdf', 'D'); 
    }";
}

$string .= "\n\n}\n\n";




$hasil_controller = createFile($string, $target . "controllers/" . $c_file);
?>