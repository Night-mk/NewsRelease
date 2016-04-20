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
    public function checkLogin(){
      if(isset($_COOKIE['TOKEN'])&&empty($_COOKIE['TOKEN'])){
		  $token=get_cookie('TOKEN');
		  $current= $this->session->userdata('username');
		  echo $current;
	  }else {
		  echo "-2";
	  }
    }
  public function  preShow(){
	  $this->load->view('newsTemplate2');
  }
	public function login(){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
        $check=$_POST['checked'];
		//var_dump($check);
	    $res=$this->M_user->select($username,$password);
		if($res==1){
			$this->session->set_userdata('username',$username);
			if($check==='true'){
                set_cookie('TOKEN',md5($username),604800);//一周有效期
			}
            echo $_SESSION['username'];
		}else {
           echo -1;
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
			if ($result == 1) {
				echo "注册成功!2秒后跳转<script>setTimeout(function(){window.location = 'http://localhost/NewsRelease/'},2000)</script>";
			}else{
				echo "请重新注册！<script>setTimeout(function(){window.location = 'http://localhost/NewsRelease/'},2000)</script>";
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
		$res[0]['content']=$content;
		echo json_encode($res);
	}
	public function changeTitle(){
		$res=$this->M_news->update();
		if($res){
			echo "1";
		}else {
			echo "2";
		}
	}
	public function deleteNews(){
      $res=$this->M_news->delete();
		if($res){
			echo "1";
		}
		else {
			echo "2";
		}
	}


}
