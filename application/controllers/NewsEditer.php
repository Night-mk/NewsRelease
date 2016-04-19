<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsEditer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array("form","url","cookie"));
		$this->load->database();

		$this->load->library('session');
		$this->load->model('M_user');
		$this->load->model('M_news');
	}

	public function index()
	{
		$this->load->view('newsEditor');
	}
	public function showNewsList(){
		$this->load->view('newsList');
	}
	public function showNewsContent(){
		$data['newsId']=$_GET['newsId'];
		$this->load->view('newsTemplate',$data);
	}


	public function login(){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
        $check=$_POST['checked'];
		$res=$this->M_user->select($username,$password);
		if($res==1){
			$this->session->set_userdata('username',$username);
			if($check==true){
                set_cookie('TOKEN',$username.md5($password),604800);//一周有效期
				$token=get_cookie('TOKEN');

			}
			$data['user']=$username;
			$data['cookie']=$token;
			//$this->load->view('newsEditor',$data);
			echo "success!";

		}else {
           echo "请检查账号密码";
		}
	}
	public function quit(){
		$this->session->unset_userdata('username');
		if(setcookie('TOKEN')){
			delete_cookie('TOKEN');
		}
	}
	public function register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('regname','Username','required|min_length[4]|max_length[12]|is_unique[muco.username]',
			array(
				'required'  => 'You have not provided %s.',
				'is_unique' => 'This %s already exists.'
			));
		$this->form_validation->set_rules('pass','Password','required|min_length[6]');
		if($this->form_validation->run()==true) {
			$result = $this->M_user->insert();
			echo $result;
			if ($result == 1) {
				echo "注册成功！";
			}else{
				echo "请重新注册！";
			}
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
	     $res=$this->M_news->insert();
		 echo $res;
	 }

	public function showList(){

		$res=$this->M_news->select();
	    echo json_encode($res);

	}
	public function showContent(){
        $res=$this->M_news->showContent();
		$baseUrl=$res[0]['content'];
		$resourse=fopen($baseUrl,"r");
		$content=fread($resourse,filesize($baseUrl));
		$res['content']=$content;
		echo json_encode($res);
	}


}
