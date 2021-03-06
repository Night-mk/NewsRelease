
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
            <div id="category"><span class="title-font">分类标签：<a href="#"></a></span></div>
            <div id="title" class="main-title" style="font-family: 微软雅黑;color: #000000;"></div>
            <p>
                <span id="unit" class="title-font divide-line"></span>
                <span id="time" class="title-font"></span>
                <span id="author" class="title-font">编辑：<i></i></span>
            </p>
        </div>
        <div id="content" class="news-body">
        </div>
    </div>

    <script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/jquery-1.10.2.min.js"></script>
    <script>
        (function ($) {
            function transCategory(category){
                var category1 = "";
                switch(category){
                    case "finance":
                        category1 = "经济";
                        break;
                    case "sports":
                        category1 = "体育";
                        break;
                    case "entertainment":
                        category1 = "娱乐";
                        break;
                    case "building":
                        category1 = "房产";
                        break;
                    case "technical":
                        category1 = "科技";
                        break;
                    case "car":
                        category1 = "汽车";
                        break;

                }
                return category1;
            }

            
            function setPage(){
            	var newsId = '<?php echo $_GET['newsId'];?>'
                var data = {
		            "newsId": newsId
		        };
	            $.ajax({
	                type: "post",
	                url: "showContent",
	                data: data,
	                success: function (data) {
	                    var data1 = eval("("+data+")");
                        data1 = data1[0];
	                    $("#category").find("a").text(transCategory(data1.category));
	                    $("#title").text(data1.title);
	                    $("#unit").text(data1.unit);
	                    $("#time").text(data1.time);
	                    $("#author").find("i").text(data1.author);
	                    $("#content").append(data1.content);
	                }
	            });
            }
            setPage();

        })(jQuery);

    </script>
</body>
</html>