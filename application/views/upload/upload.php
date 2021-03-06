<!doctype html>
<html>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/site.js"></script>
   <script src="<?php echo base_url()?>js/ajaxfileupload.js"></script>
   <script script language="javascript" type="text/javascript" src="<?php echo base_url("assets/ajax/site.js") ?>"></script>
   <script script language="javascript" type="text/javascript" src="<?php echo base_url("assets/js/ajaxfileupload.js") ?>"></script>
   <link href="<?php echo base_url("assets/css/style.css") ?>" rel="stylesheet" type="text/css" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
</head>
<body>
   <h1>Upload File</h1>
   <form method="post" action="" id="upload_file">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="" />
 
      <label for="userfile">File</label>
      <input type="file" name="userfile" id="userfile" size="20" />
 
      <input type="submit" name="submit" id="submit" />
   </form>
   
   <div id="loading"></div>
   
   <h2>Files</h2>
   <div id="files"></div>
</body>
</html>