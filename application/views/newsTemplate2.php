
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻模板页</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/NewsRelease/dist/css/EditorStyle.css">
    <style>
        .title-font{
            color: #999;
            font-size: 1.1em;
            font-family: Consolas;
            font-weight: 400;
            padding-right: 10px;
            padding-left: 5px;
        }
        .divide-line{
            border-right: 1px solid #dedede;
        }
        .news-header{
            padding-bottom: 10px;
            border-bottom: 1px solid #dedede;
        }
        .news-body{
            padding: 10px 15px;
        }
    </style>
</head>
<body>

<div class="myWrapper wrapper-minH">
    <div class="news-header">
        <div id="category"><span class="title-font">分类标签：<a href="#"><?php echo $_GET['category'];?></a></span></div>
        <div id="title" class="main-title" style="font-family: 微软雅黑;color: #000000;"><?php echo $_GET['title'];?></div>
        <p>
            <span id="unit" class="title-font divide-line"><?php echo $_GET['unit'];?></span>
            <span id="time" class="title-font"><?php echo $_GET['time1'];?></span>
            <span id="author" class="title-font">编辑：<i><?php echo $_GET['author'];?></i></span>
        </p>
    </div>
    <div id="content" class="news-body">
        <?php echo $_GET['content'];?>
    </div>
</div>

</body>
</html>