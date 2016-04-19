<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/4/13
 * Time: 20:57
 */
class M_user extends CI_Model{

  public  function select($username,$password){
   $sql='select * from test.muco where username=? and password=?';
     $info=array($username,$password);
     $res= $this->db->query($sql,$info);
      $num=$res->num_rows();
     return $num;
  }
    public function  insert(){
        $username=htmlspecialchars($this->input->post('regname'));
        $pass=md5($this->input->post('pass'));
        $sql="insert into test.muco(username,password) VALUES ('$username','$pass')";
        $result=$this->db->query($sql);
        return $result;

    }
}