
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>newsEditor</title>
    <link rel="stylesheet" type="text/css" href="./dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/wangEditor.min.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/EditorStyle.css">
    <style>
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
    </style>
</head>
<body>
    <div class="myWrapper">
        <div class="filter-bg"></div>
        <div class="main-title" style="font-family: 微软雅黑; color: #6f6e6b;">专为新闻编辑设计</div>
        <div class="btn-R-position">
            <button class="btn btn-default">登录</button>
        </div>
        <div class="select-box">
            <span class="select-title">类别选择</span>
            <!-- Large button group -->
            <div id="selected-category" class="btn-group btn-select">
                <button class="btn btn-default dropdown-toggle btn-selectL" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <input type="text" placeholder="这是单位">
        </div>
        <div class="input-box">
            <span>新闻标题</span>
            <input type="text" placeholder="这是标题">
        </div>
        <div class="input-box">
            <span>编辑作者</span>
            <input type="text" placeholder="这是作者">
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
            <button class="btn btn-default btn-R-position">发布</button>
        </div>
    </div>

    <script type="text/javascript" src="./dist/js/lib/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="./dist/js/wangEditor.js"></script>
    <script type="text/javascript" src="./dist/js/lib/bootstrap.min.js"></script>
    <script>
        //页面简单逻辑
        (function($){
            //选择框的逻辑
            var selected = $("#selected-category");
            var selected_item = selected.find("button");
            selected.find("ul").children().each(function(){
                $(this).bind("click", function(event){
                    event.preventDefault();
                    var item = $(this).text();
                    selected_item.text(item);
                    selected_item.append('<span class="caret"></span>');
                });
            });
        })(jQuery);

        //编辑器逻辑
//        (function($){
            var editor = new wangEditor('editor-trigger');
            // 阻止输出log
            wangEditor.config.printLog = false;

            // 上传图片
            editor.config.uploadImgUrl = '/upload';

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