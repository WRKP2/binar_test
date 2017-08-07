<?php
/*
class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));		
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf';
		$config['max_size']	= '1024';
		*/
		/*$config['max_width']  = '1024';
		$config['max_height']  = '768';*/
/*
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}
*/

class Upload extends CI_Controller 
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Files_model');
      $this->load->database();
      $this->load->helper('url');
   }
 
   public function index()
   {
      $this->load->view('upload/upload');
   }

   public function upload_file()
{
   $status = "";
   $msg = "";
   $file_element_name = 'userfile';
    
   if (empty($_POST['title']))
   {
      $status = "error";
      $msg = "Please enter a title";
      
   }
    
   if ($status != "error")
   {
      $config['upload_path'] = './files/';
      $config['allowed_types'] = 'gif|jpg|png|doc|txt';
      $config['max_size']  = 1024 * 8;
      $config['encrypt_name'] = TRUE;
 
      $this->load->library('upload', $config);
 
      if (!$this->upload->do_upload($file_element_name))
      {
         $status = 'error';
         $msg = $this->upload->display_errors('', '');
      }
      else
      {
         $data = $this->upload->data();
         $file_id = $this->Files_model->insert_file($data['file_name'], $_POST['title']);
         if($file_id)
         {
            $status = "success";
            $msg = "File successfully uploaded";
         }
         else
         {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
         }
      }
      @unlink($_FILES[$file_element_name]);
   }
   echo json_encode(array('status' => $status, 'msg' => $msg));
}

	public function files()
	{
	   $files = $this->Files_model->get_files();
	   $this->load->view('upload/files', array('files' => $files));
	}

	public function delete_file($file_id)
	{
	   if ($this->Files_model->delete_file($file_id))
	   {
	      $status = 'success';
	      $msg = 'File successfully deleted';
	   }
	   else
	   {
	      $status = 'error';
	      $msg = 'Something went wrong when deleteing the file, please try again';
	   }
	   echo json_encode(array('status' => $status, 'msg' => $msg));
	}
}
?>