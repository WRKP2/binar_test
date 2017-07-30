<?php

$string = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class " . $m . " extends CI_Model
{

    public \$table = '$table_name';
    public \$id = '$pk';
    public \$order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }";

if ($jenis_tabel <> 'reguler_table') {

    $column_all = array();
    foreach ($all as $row) {
        $column_all[] = $row['column_name'];
    }
    $columnall = implode(',', $column_all);

    $string .="\n\n    // datatables
    function json() {
        \$this->datatables->select('" . $columnall . "');
        \$this->datatables->from('" . $table_name . "');
        //add this line for join
        //\$this->datatables->join('table2', '" . $table_name . ".field = table2.field');
        \$this->datatables->add_column('action', anchor(site_url('" . $c_url . "/read/\$1'),'Read').\" | \".anchor(site_url('" . $c_url . "/update/\$1'),'Update').\" | \".anchor(site_url('" . $c_url . "/delete/\$1'),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'), '$pk');
        return \$this->datatables->generate();
    }";
}

$string .= "function getList".$table_name."Auto(\$x".$table_name.") {
        \$xStr = \"SELECT \" .
                \"*\" .
                \" FROM ".$table_name." WHERE "."//masukan nama kolom autocompliet (harus sama dengan control)"." like  '%\" . \$x".$table_name." . \"%'\";
        \$query = \$this->db->query(\$xStr);
        return \$query;
    }";

if ($android == '1') {
// MENGGUNAKAN QUERY 
$column_all = array();
foreach ($all as $row) {
    $column_all[] = $row['column_name'];
    if(stristr($row['column_name'], "nama") !== false){
        $autosearchnamakolom=$row['column_name'];
    }
}
$columnall = implode(",\".\n \"", $column_all);



//GET LIST 
$string .="\n\n    // GET_LIST" . $table_name . "
    function getList" . $table_name . "() {
        \$xStr = \"SELECT " . $columnall . " from " . $table_name . "\";
        \$query = \$this->db->query(\$xStr);
        
        return \$query;
    }";
//GET LIST 
//GET DETAIL LIST 
$string .="\n\n    // GET_Detail" . $table_name . "
    function getDetail" . $table_name . "(\$x$pk) {
        \$xStr = \"SELECT " . $columnall . " from " . $table_name . " WHERE $pk = '\". \$x$pk .\"'\";
        \$query = \$this->db->query(\$xStr);
        \$row = \$query->row();
        return \$row;
    }";
//GET DETAIL LIST
//untuk keperluan prameternya
$columnallparam = implode(",\$x", $column_all);

//INSERT
//KEPERLUAN INSERT
$columnallinstert = implode("\n . \"','\" .\$x", $column_all);

$string .="\n\n    // Insert_" . $table_name . "
    function Insert" . $table_name . "(\$x" . $columnallparam . ") {
        \$xStr = \" INSERT INTO " . $table_name . "( " . $columnall . " ) VALUES ( '\" . \$x" . $columnallinstert . ". \"')\";
        \$query = \$this->db->query(\$xStr);
        return \$x$pk; 
    }";
//INSERT
//UPDATE
$string .="\n\n    // update" . $table_name . "
    function Update" . $table_name . "(\$x" . $columnallparam . ") {
        \$xStr = \" UPDATE " . $table_name . " SET \" . ";

foreach ($all as $row) {
    if($row['column_name'] != end($column_all)){
    $string .= "\n\t\t\"" . $row['column_name'] . "= '\". \$x" . $row['column_name'] . " . \"',\" . ";
    } else {
            $string .= "\n\t\t\"" . $row['column_name'] . "= '\". \$x" . $row['column_name'] . " . \"'\" . ";
    }
}
$string .= "\" WHERE $pk = '\". \$x$pk .\"'\";";
$string .= "\n \$query = \$this->db->query(\$xStr);
        return \$x$pk;
    }";
//UPDATE   
//DELET

$string .="\n\n    // delet" . $table_name . "
    function Delet" . $table_name . "(\$x$pk) {
        \$xStr = \" DELETE FROM " . $table_name . " WHERE " . $table_name . ".$pk = '\" . \$x$pk . \"'\";
        \$query = \$this->db->query(\$xStr);
    }";
//DELET
//lastindeks
$string .= "\nfunction getLastIndex" . $table_name . "(){ 
        \$xStr = \"SELECT " . $columnall . " from " . $table_name . " order by idx DESC limit 1 \";
        \$query = \$this->db->query(\$xStr);
        \$row = \$query->row();
        return \$row;
    }";
//lastindeks
// MENGGUNAKAN QUERY 
}

$string .="\n\n    // get all
    function get_all()
    {
        \$this->db->order_by(\$this->id, \$this->order);
        return \$this->db->get(\$this->table)->result();
    }

    // get data by id
    function get_by_id(\$id)
    {
        \$this->db->where(\$this->id, \$id);
        return \$this->db->get(\$this->table)->row();
    }
    
    // get total rows
    function total_rows(\$q = NULL) {
        \$this->db->like('$pk', \$q);";

foreach ($non_pk as $row) {
    $string .= "\n\t\$this->db->or_like('" . $row['column_name'] . "', \$q);";
}

$string .= "\n\t\$this->db->from(\$this->table);
        return \$this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data(\$limit, \$start = 0, \$q = NULL) {
        \$this->db->order_by(\$this->id, \$this->order);
        \$this->db->like('$pk', \$q);";

foreach ($non_pk as $row) {
    $string .= "\n\t\$this->db->or_like('" . $row['column_name'] . "', \$q);";
}

$string .= "\n\t\$this->db->limit(\$limit, \$start);
        return \$this->db->get(\$this->table)->result();
    }

    // insert data
    function insert(\$data)
    {
        \$this->db->insert(\$this->table, \$data);
    }

    // update data
    function update(\$id, \$data)
    {
        \$this->db->where(\$this->id, \$id);
        \$this->db->update(\$this->table, \$data);
    }

    // delete data
    function delete(\$id)
    {
        \$this->db->where(\$this->id, \$id);
        \$this->db->delete(\$this->table);
    }

}

";




$hasil_model = createFile($string, $target . "models/" . $m_file);
?>