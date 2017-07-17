<?php

$hasil = array();

if (isset($_POST['generate'])) {
    // get form data
    $table_name = safe($_POST['table_name']);
    $jenis_tabel = safe($_POST['jenis_tabel']);
    $export_excel = safe($_POST['export_excel']);
    $export_word = safe($_POST['export_word']);
    $export_pdf = safe($_POST['export_pdf']);
    $controller = safe($_POST['controller']);
    $model = safe($_POST['model']);

    $android = safe($_POST['android']);
    //java
    $fileandroid = safe($_POST['fileandroid']);
    $packageAndroid= safe($_POST['packageAndroid']);
    
    if($packageAndroid == '' && $fileandroid == '1' ){
        echo "<script type='text/javascript'>alert('Flase');</script>";
    }


    if ($table_name <> '') {
        // set data
        $table_name = $table_name;
        $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
        $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        $v_doc = $table_name . "_doc";
        $v_pdf = $table_name . "_pdf";

        //autocomplete
        $v_autocomplete = $table_name . "_autocomplete";

        // url
        $c_url = strtolower($c);

        // filename
        $c_file = $c . '.php';
        $m_file = $m . '.php';
        $v_list_file = $v_list . '.php';
        $v_read_file = $v_read . '.php';
        $v_form_file = $v_form . '.php';
        $v_doc_file = $v_doc . '.php';
        $v_pdf_file = $v_pdf . '.php';

        //autocomplete
        $v_autocomplete_file = $v_autocomplete . '.php';

        // read setting
        $get_setting = readJSON('core/settingjson.cfg');
        $target = $get_setting->target;

        if (!file_exists($target . "views/" . $c_url)) {
            mkdir($target . "views/" . $c_url, 0777, true);
        }

        //===FILE ANDROID===
        if ($fileandroid == '1') {
            //nama_file_java
            $filejavaCLASS = ucfirst($table_name) . 'CLASS';
            $filejavalayoutisi = strtolower($table_name) . 'isi';
            $filejavalayoutlist = strtolower($table_name) . 'list';
            $filejavaActivityIsi = 'Isi' . ucfirst($table_name) . 'Activity';
            $filejavaActivityList = 'List' . ucfirst($table_name) . 'Activity';

            //membentuk_file_java+ekstensi
            $filejava_file_dataclass = $filejavaCLASS . '.java';
            $filejava_layout_isi = $filejavalayoutisi . '.xml';
            $filejava_layout_list = $filejavalayoutlist . '.xml';
            $filejava_activity_isi = $filejavaActivityIsi . '.java';
            $filejava_activity_list = $filejavaActivityList . '.java';

            //membuat folder penampung
            if (!file_exists($target . "java/" . $c_url)) {
                mkdir($target . "java/" . $c_url, 0777, true);
            }
        }
        //===FILE ANDROID===

        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);

        // generate
        include 'core/create_config_pagination.php';
        include 'core/create_model.php';
        include 'core/create_controller.php';

        //autocomplete
        include 'core/create_view_autosearch.php';

        if ($jenis_tabel == 'reguler_table') {
            include 'core/create_view_list.php';
        } else {
            include 'core/create_view_list_datatables.php';
            include 'core/create_libraries_datatables.php';
        }
        include 'core/create_view_form.php';
        include 'core/create_view_read.php';

        $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
        $export_word == 1 ? include 'core/create_view_list_doc.php' : '';
        $export_pdf == 1 ? include 'core/create_pdf_library.php' : '';
        $export_pdf == 1 ? include 'core/create_view_list_pdf.php' : '';

        //file android
        $fileandroid == 1 ? include 'core/create_java_dataclass.php' : '';
        $fileandroid == 1 ? include 'core/create_java_layout_isi.php' : '';
        $fileandroid == 1 ? include 'core/create_java_layout_list.php' : '';
        $fileandroid == 1 ? include 'core/create_java_activity_isi.php' : '';
        $fileandroid == 1 ? include 'core/create_java_activity_list.php' : '';

        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_read;
        $hasil[] = $hasil_view_doc;
        $hasil[] = $hasil_view_pdf;
        $hasil[] = $hasil_config_pagination;
        $hasil[] = $hasil_exportexcel;
        $hasil[] = $hasil_pdf;

        //autocomplete
        $hasil[] = $hasil_view_autocomplete;

        //file android
        $hasil[] = $hasil_CLASS;
        $hasil[] = $hasil_java_layout_isi;
        $hasil[] = $hasil_java_layout_list;
        $hasil[] = $hasil_java_actifity_isi;
        $hasil[] = $hasil_java_actifity_list;
    } else {
        $hasil[] = 'No table selected.';
    }
}

if (isset($_POST['generateall'])) {

    $jenis_tabel = safe($_POST['jenis_tabel']);
    $export_excel = safe($_POST['export_excel']);
    $export_word = safe($_POST['export_word']);
    $export_pdf = safe($_POST['export_pdf']);

    $android = safe($_POST['android']);
    //java
    $fileandroid = safe($_POST['fileandroid']);

    $packageAndroid= safe($_POST['packageAndroid']);
    
    if($packageAndroid == '' && $fileandroid == '1' ){
        echo "<script type='text/javascript'>alert('Flase');</script>";
    }


    $table_list = $hc->table_list();
    foreach ($table_list as $row) {

        $table_name = $row['table_name'];
        $c = ucfirst($table_name);
        $m = ucfirst($table_name) . '_model';
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        //autocomplete
        $v_autocomplete = $table_name . "_autocomplete";

        $v_doc = $table_name . "_doc";
        $v_pdf = $table_name . "_pdf";


        $c_url = strtolower($c);

        // filename
        $c_file = $c . '.php';
        $m_file = $m . '.php';
        $v_list_file = $v_list . '.php';
        $v_read_file = $v_read . '.php';
        $v_form_file = $v_form . '.php';

        //autocomplete
        $v_autocomplete_file = $v_autocomplete . '.php';

        $v_doc_file = $v_doc . '.php';
        $v_pdf_file = $v_pdf . '.php';

        // read setting
        $get_setting = readJSON('core/settingjson.cfg');
        $target = $get_setting->target;
        if (!file_exists($target . "views/" . $c_url)) {
            mkdir($target . "views/" . $c_url, 0777, true);
        }


        //===FILE ANDROID===
        if ($fileandroid == '1') {
            //nama_file_java
            $filejavaCLASS = ucfirst($table_name) . 'CLASS';
            $filejavalayoutisi = strtolower($table_name) . 'isi';
            $filejavalayoutlist = strtolower($table_name) . 'list';
            $filejavalayoutadapter = strtolower($table_name) . 'adapter';
            $filejavaActivityIsi = 'Isi' . ucfirst($table_name) . 'Activity';
            $filejavaActivityList = 'List' . ucfirst($table_name) . 'Activity';
            $filejavaActivityAdapter = 'Adapter' . strtolower($table_name);


            //membentuk_file_java+ekstensi
            $filejava_file_dataclass = $filejavaCLASS . '.java';
            $filejava_layout_isi = $filejavalayoutisi . '.xml';
            $filejava_layout_list = $filejavalayoutlist . '.xml';
            $filejava_layout_adapter = $filejavalayoutadapter . '.xml';
            $filejava_activity_isi = $filejavaActivityIsi . '.java';
            $filejava_activity_list = $filejavaActivityList . '.java';
            $filejava_activity_adapter = $filejavaActivityAdapter . '.java';


            //membuat folder penampung
            if (!file_exists($target . "java/" . $c_url)) {
                mkdir($target . "java/" . $c_url, 0777, true);
            }
        }

        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);

        // generate
        include 'core/create_config_pagination.php';
        include 'core/create_model.php';
        include 'core/create_controller.php';

        //autocomplete
        include 'core/create_view_autosearch.php';

        if ($jenis_tabel == 'reguler_table') {
            include 'core/create_view_list.php';
        } else {
            include 'core/create_view_list_datatables.php';
            include 'core/create_libraries_datatables.php';
        }


        include 'core/create_view_form.php';
        include 'core/create_view_read.php';

        $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
        $export_word == 1 ? include 'core/create_view_list_doc.php' : '';
        $export_pdf == 1 ? include 'core/create_pdf_library.php' : '';
        $export_pdf == 1 ? include 'core/create_view_list_pdf.php' : '';

        //file android
        $fileandroid == 1 ? include 'core/create_java_dataclass.php' : '';
        $fileandroid == 1 ? include 'core/create_java_layout_isi.php' : '';
        $fileandroid == 1 ? include 'core/create_java_layout_list.php' : '';
        $fileandroid == 1 ? include 'core/create_java_layout_adapter.php' : '';
        $fileandroid == 1 ? include 'core/create_java_activity_isi.php' : '';
        $fileandroid == 1 ? include 'core/create_java_activity_list.php' : '';
        $fileandroid == 1 ? include 'core/create_java_activity_adapter.php' : '';


        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_read;
        $hasil[] = $hasil_view_doc;
        //autocomplete
        $hasil[] = $hasil_view_autocomplete;

        if ($fileandroid == '1') {
            //file android
            $hasil[] = $hasil_CLASS;
            $hasil[] = $hasil_java_layout_isi;
            $hasil[] = $hasil_java_layout_list;
            $hasil[] = $hasil_java_layout_adapter;
            $hasil[] = $hasil_java_actifity_isi;
            $hasil[] = $hasil_java_actifity_list;
            $hasil[] = $hasil_java_actifity_adapter;
        }
    }

    $hasil[] = $hasil_config_pagination;
    $hasil[] = $hasil_exportexcel;
    $hasil[] = $hasil_pdf;
}
?>