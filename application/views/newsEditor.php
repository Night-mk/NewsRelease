
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>newsEditor</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/NewsRelease/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/NewsRelease/dist/css/wangEditor.min.css">
   	<link rel="stylesheet" type="text/css" href="http://localhost/NewsRelease/dist/css/EditorStyle.css">
    <style>
        body{
          background-color: #dddddd;
        }
        .input-box span,input{
            font-family:  微软雅黑,sans-serif;
        }
        .select-title{
            font-family:  微软雅黑,sans-serif;
        }
        #editor-trigger {
            height: 400px;
            max-height: 400px;
        }
        #userShow{
        	font-size: 1.3em;
        	cursor: pointer;
        }
        .user-name{
        	width: 100px;
        	display: inline-block;
        	margin-right: 20px;
        	text-overflow: ellipsis;
        	overflow: hidden;
        	white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="myWrapper">
        <div class="filter-bg"></div>
        <div class="main-title" style="font-family: 微软雅黑; color: #6f6e6b;">专为新闻编辑设计</div>
        <div class="btn-R-position">
        	<div id="logSign"  style="display: none;">
        		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#logIn">登录</button>
	            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#signIn">注册</button>
        	</div>
            <div id="userShow">
            	<a class="user-name">设立的发明了萨克发的发的发的分散</a>
            	<a class="user-quit" style="float: right;display: inline-block;">注销</a>
            </div>
        </div>
        <div class="modal fade" id="logIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">登录</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-8">
                                    <input type="text"  name="username" class="form-control" id="inputName" placeholder="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input name="checkbox" type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-close" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" >登录</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">注册</h4>
                    </div>
                    <form class="form-horizontal" method="post" action="index.php/newsEditer/register">
	                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-8">
                                    <input type="text" name="regname" class="form-control" placeholder="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-8">
                                    <input type="password" name="pass" class="form-control" placeholder="Password">
                                </div>
                            </div>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default btn-close" data-dismiss="modal">关闭</button>
	                        <button type="submit" class="btn btn-primary" >注册</button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="select-box">
            <span class="select-title">类别选择</span>
            <!-- Large button group -->
            <div id="selected-category" class="btn-group btn-select">
                <button class="btn btn-default dropdown-toggle btn-selectL" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="finance">
                    财经<span class="caret"></span>
                </button>
                <ul class="dropdown-menu btn-selectL">
                    <li id="finance"><a href="#">财经</a></li>
                    <li id="sports"><a href="#">体育</a></li>
                    <li id="entertainment"><a href="#">娱乐</a></li>
                    <li id="building"><a href="#">房产</a></li>
                    <li id="technical"><a href="#">科技</a></li>
                    <li id="car"><a href="#">汽车</a></li>
                </ul>
            </div>
        </div>
        <div class="input-box">
            <span>发布单位</span>
            <input type="text" id="unit" placeholder="company">
        </div>
        <div class="input-box">
            <span>新闻标题</span>
            <input type="text" id="title" placeholder="title">
        </div>
        <div class="input-box">
            <span>编辑作者</span>
            <input type="text" id="author" placeholder="author">
        </div>
        <div class="input-box">
            <span>新闻内容</span>
            <div id="editor-container">
                <div id="editor-trigger">
                    <p>请输入内容...</p>
                </div>
            </div>
        </div>
        <div class="input-box">
            <button type="button" id="showView" class="btn btn-default">查看效果</button>
            <button type="button" id="release" class="btn btn-default btn-R-position">发布</button>
        </div>
        <!--<button id="aaaaaa">test</button>-->
    </div>

    <script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="http://localhost/NewsRelease/dist/js/wangEditor.js"></script>
    <script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/bootstrap.min.js"></script>
    <script>
        //页面简单逻辑
        (function($){
        	$("#aaaaaa").click(function(){
        	});
            //选择框的逻辑
            var selectBox = function(){};
            selectBox.prototype = {
                selectCategory : function(){
                    var selected = $("#selected-category");
                    var selected_item = selected.find("button");
                    selected.find("ul").children().each(function(){
                        $(this).bind("click", function(event){
                            event.preventDefault();
                            var item = $(this).text();
                          	selected_item.attr("name",$(this).attr("id"));
                            selected_item.text(item);
                            selected_item.append('<span class="caret"></span>');
                        });
                    });
                }
            };
            
			//按钮的点击选项封装成类
			var btnClick = function(){

			};
			btnClick.prototype = {
				//登录模态框确定按钮提交表单
				btnLogin : function(){
					var login = $("#logIn");
					login.find(".btn-primary").bind("click", function(){
						var username = $("#inputName").val();
						var passW = $("#inputPassword").val();
						var checked = false;
						if(login.find("input[type='checkbox']").is(':checked')){	
							checked = true;
						}
						var data = {
							"username": username,
							"password": passW,
							"checked": checked
						};
						$.ajax({
							type:"post",
							url:"index.php/newsEditer/login",
							data:data,
							success: function(data){
                                //隐藏登录和注注册部分
								$("#logSign").css({"display":"none"});
								//显示登录名
								var usershow = $("#userShow");
								usershow.find(".user-name").text();
								usershow.css({"display":"block"});

							}
						});
						login.find(".btn-close").click();
					});
				},
				//查看效果（访问template页面）跳转页面请求
				btnShowEffect: function(){
					var data = this.getData();
					$("#showView").bind("click", function(){
						var newsUrl = 'http://localhost/NewsRelease/application/views/newsTemplate.php';
						newsUrl += 	'?category='+data.category+
									'&unit='+data.unit+
									'&title='+data.title+
									'&author='+data.author+
									'&time1='+data.time1+
									'&content='+data.content;
						newsUrl = encodeURIComponent(newsUrl);
						window.open(newsUrl);
					});
				},
				//发布页面ajax提交，弹出框，refresh
				releaseNews: function(){
                    var _this_ = this;
					var release = $("#release");
					var _this_ = this;
					release.bind("click", function(){
						var data =_this_.getData();
                        console.log(data);
						$.ajax({
							type: "post",
							url: "http://localhost/NewsRelease/index.php/newsEditer/postNews",
							data: data,
							success: function(data){
								if(data==1){
									alert("提交成功");

								}else if(data==2){

									alert("提交失败");
								}
							}
						});
					});

				},
				//user注销，清除cookie，访问后台
				userQuit: function(){
					$("#userShow").find(".user-quit").bind("click",function(){
						//清除cookie
						$.ajax({
							type: "get",
							url: "",
							success :function(){
								$("#userShow").css({"display":"none"});
								//显示登录注册
								$("#logSign").css({"display":"block"});
							}
						});
					});

				},
				//获取数据
				getData: function(){
					var category = $("#selected-category").find("button").attr("name"),
						unit = $("#unit").val(),
						title = $("#title").val(),
						author = $("#author").val();
					function timeStamp(){
						var datetime = new Date(); 
					    var year = datetime.getFullYear();  
					    var month = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;  
					    var date = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();  
					    var hour = datetime.getHours()< 10 ? "0" + datetime.getHours() : datetime.getHours();  
					    var minute = datetime.getMinutes()< 10 ? "0" + datetime.getMinutes() : datetime.getMinutes();  
					    return year + "-" + month + "-" + date+" "+hour+":"+minute;
					}
					var time = timeStamp();
					var content = $("#editor-trigger").html();
					var data = {
						"category": category,
						"unit": unit,
						"title": title,
						"author": author,
						"time1": time,
						"content": content
					}
					
					return data;
				}
			};
			
			var selectbox = new selectBox();
			selectbox.selectCategory();
			
			var btnclick = new btnClick();
			btnclick.btnLogin();

			btnclick.releaseNews();
			btnclick.btnShowEffect();


			//检测cookie并改变页面内容
			//处理cookie事务
//			var Cookie = function(){};
//			Cookie.prototype = {
//				//检测cookie
//				checkCookie: function(){
//					
//				},
//				//读取cookie
//				getCookie: function(){
//					
//				},
//				//删除cookie
//				deleteCookie: function(){
//					
//				}
//			} 
			
        })(jQuery);

        //编辑器逻辑
//        (function($){
            var editor = new wangEditor('editor-trigger');
            // 阻止输出log
            wangEditor.config.printLog = true;

            // 上传图片
            editor.config.uploadImgUrl = 'http://localhost/NewsRelease/index.php/newsEditer/imgUpload';

            // 表情显示项
            //editor.config.emotionsShow = 'value';

            // 跨域上传
            // editor.config.uploadImgUrl = 'http://localhost:8012/upload';

            // 第三方上传
            // editor.config.customUpload = true;

            // editor.config.menus = [
            //     'img',
            //     'insertcode',
            //     'eraser',
            //     'fullscreen'
            // ];

            // onchange 事件
            // editor.onchange = function () {
            //     console.log(this.$txt.html());
            // };

            // 取消过滤js
            // editor.config.jsFilter = false;

            // 取消粘贴过来
            // editor.config.pasteFilter = false;

            // 设置 z-index
            // editor.config.zindex = 20000;

            // 语言
            // editor.config.lang = wangEditor.langs['en'];

            // 自定义菜单UI
            // editor.UI.menus.bold = {
            //     normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
            //     selected: '.selected'
            // };
            // editor.UI.menus.italic = {
            //     normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
            //     selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
            // };
            editor.create();
//        })(jQuery);
    </script>
</body>
</html>