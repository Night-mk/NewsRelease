<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/4/16
 * Time: 16:16
 */
class M_news extends CI_Model{


    public function select(){
        //$data=array();
        $category=$_POST['category'];

      //  $json=array();
        $sql="select newsId,category,title from test.news WHERE category='$category' ";
        $res=$this->db->query($sql);
        $result= $res->result_array();
       return $result;
    }
    public function showContent(){
        $newsId=$_POST['newsId'];

        $sql="select * from test.news WHERE newsId='$newsId' ";
        $res=$this->db->query($sql);
        $result=$res->result_array();
        return $result;
    }
    public function insert(){
        $category=htmlspecialchars($_POST['category']);
        $author=htmlspecialchars($_POST['author']);
        $title=htmlspecialchars($_POST['title']);
        $content=htmlspecialchars($_POST['content']);
        $unit=htmlspecialchars($_POST['unit']);
        $time1=htmlspecialchars($_POST['time1']);
        $arr=array();
        $time2=preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2})/',$time1,$arr);
        $time3=$arr[1].$arr[2].$arr[3].$arr[4].$arr[5];
        $contentUrl="content/$time3.txt";
        $time4=$time3;
        $myfile = fopen("$contentUrl", "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        $sql="insert into test.news(category,title,unit,author,`time`,content,newsId) VALUES ('$category','$title','$unit','$author','$time1','$contentUrl','$time4')";
       if(  $this->db->query($sql)){
          return "1";
        }else {
          return "0";
       }
    }

}