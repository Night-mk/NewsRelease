<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsEditer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array("form","url","cookie"));
		//$this->load->database();

		$this->load->library('session');
		$this->load->model('M_user');



	}

	public function index()
	{
		$this->load->view('newsEditor');
	}

	public function login(){
		$username=$this->input->username;
		$password=$this->input->password;
        $check=$this->input->checkbox;
		$res=$this->M_user->select($username,$password);
		if($res){
			$this->session->set_userdata('username',$username);
			if($check==true){
               set_cookie('TOKEN',$username.md5($password),604800);//一周有效期
				$token=get_cookie('TOKEN');
				$data['user']=$username;
				$data['cookie']=$token;
				$this->load->view('newsEditor',$data);
			}

		}else {
			$data['mess']="账号密码错误";
			$this->load->view('newsEditor',$data);
		}
	}
	public function quit(){
		$this->session->unset_userdata('username');
		if(setcookie('TOKEN')){
			delete_cookie('TOKEN');
		}
	}
	public function imgUpload(){

		$config['upload_path']='./upload';
		$config['allowed_types']='gif|jpeg|png|jpg';
		$config['max_size']=1024;
		$config['max_width']=1024;
		$config['max_height']=768;
		$this->load->library('upload',$config);
        $this->upload->initialize($config);

		$this->upload->do_upload("wangEditorH5File");
	    $filename=$this->upload->data('file_name');
		$url="http://localhost/NewsRelease/upload/".$filename;
		echo $url;
}
	 public function postNews(){
		 $category=$this->input->category;
		 $author=$this->input->author;
		 $title=$this->input->title;
		 $content=$this->input->content;
		 $unit=$this->input->unit;
         $time=$this->input->time;

	 }
}
