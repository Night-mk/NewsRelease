<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/4/13
 * Time: 20:57
 */
class M_user extends CI_Model{

  private  function select($username,$password){
   $sql='select * from test.muco where username=? and password=?';
     $info=array($username,$password);
      $this->db->query($sql,$info);
      if($this->db->affected_row()){
          return true;
      }else
          return false;
  }
}