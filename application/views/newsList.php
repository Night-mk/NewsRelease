<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>新闻列表页</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/NewsRelease/dist/css/EditorStyle.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/NewsRelease/dist/css/bootstrap.min.css">
		<style>

		</style>
	</head>
	<body>
	<div class="myWrapper">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#finance" aria-controls="" role="tab" data-toggle="tab">财经</a></li>
			<li role="presentation"><a href="#sports" aria-controls="" role="tab" data-toggle="tab">体育</a></li>
			<li role="presentation"><a href="#entertainment" aria-controls="" role="tab" data-toggle="tab">娱乐</a></li>
			<li role="presentation"><a href="#building" aria-controls="" role="tab" data-toggle="tab">房产</a></li>
			<li role="presentation"><a href="#technical" aria-controls="" role="tab" data-toggle="tab">科技</a></li>、
			<li role="presentation"><a href="#car" aria-controls="" role="tab" data-toggle="tab">汽车</a></li>
		</ul>

		<div class="tab-content main-content">
			<div role="tabpanel" class="tab-pane active" id="finance">
			</div>
			<div role="tabpanel" class="tab-pane" id="sports">
			</div>

			<div role="tabpanel" class="tab-pane" id="entertainment">
			</div>

			<div role="tabpanel" class="tab-pane" id="building">
			</div>

			<div role="tabpanel" class="tab-pane" id="technical">
			</div>

			<div role="tabpanel" class="tab-pane" id="car">
			</div>

			<div class="modal fade" id="textTitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">修改新闻标题</h4>
						</div>
						<div class="modal-body">
							<div class="form-group" style="min-height: 25px;">
								<label class="col-sm-2 control-label">新闻标题</label>
								<div class="col-sm-8">
									<input type="text" name="title" class="form-control">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-close" data-dismiss="modal">关闭</button>
							<button type="submit" class="btn btn-primary" >提交</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/bootstrap.min.js"></script>
	<script>
		(function($){
			var load = function () {
			};
			load.prototype = {
				loadList : function (listname) {
					var Load = this;
					data = {
						"category" : listname
					};
					$.ajax({
						type: "post",
						url: "showList",
						data: data,
						success: function (data) {
						var data1 = eval("("+data+")");
							var list = $("#"+listname);
							list.children().remove();
							if(data1!=""){
								var str = Load.htmladd(data1);
								list.append(str);
								editNews();
							}else{
								var str = '<h4>暂时还没有该类型的新闻哟~~</h4>';
								list.append(str);
							}
						}
					});
				},
				//组装html~~
				htmladd : function (data) {
					var strHtml = '';
					strHtml += '<ul class="media-list interval-line">';

					for(var i=0; i< data.length; i++){
						var hrefName = 'http://localhost/NewsRelease/index.php/newsEditer/showNewsContent?newsId='+data[i].newsId;
						strHtml += `<li class="media" id='`+data[i].newsId+`'>
										<div class="media-body">
											<a href="`+hrefName+`"><h4 style="display: inline-block;" class="media-heading">`+data[i].title+`</h4></a>
											<div style="float:right;">
												<button type="button" class="btn btn-default changeButton" data-toggle="modal" data-target="#textTitle">修改</button>
												<button type="button" class="btn btn-default deleteNews">删除</button>
											</div>
										</div>

									</li>`;
					}

					strHtml += '</ul>';
					return strHtml;
				}
			};

			var loadobj = new load();
			loadobj.loadList("finance");

			$("ul[role='tablist']").children().each(function(){
				$(this).bind("click", function(){
					var listname = $(this).find("a").attr("href").substring(1);
					console.log(listname);
					loadobj.loadList(listname);
				});
			});

			function editNews(){
				//修改，删除按钮绑定事件
				$("li.media").each(function(){
					var NewsList = $(this);
					var deleteBtn = $(this).find(".deleteNews");
					var newsId = NewsList.attr("id");
					var data = {
						"newsId": newsId
					};
					deleteBtn.bind("click", function () {
						$.ajax({
							type:"post",
							url:"deleteNews",
							data: data,
							success: function(data){
								if(data==1){
									alert("删除成功");
								}else{
									alert("删除失败");
								}
							}
						})
					});
					var changeButton = $(this).find(".changeButton");
					changeButton.bind("click", function(){
						var newsid = $(this).parent().parent().parent().attr("id");
						$("#textTitle").attr("data-target",newsid);
					});
				});
			}
			function editTitle(){
				//提交修改title
				$("#textTitle").find(".btn-primary").bind("click", function () {
					var textTitle = $("#textTitle");
					var newsId = textTitle.data('target');
					var newTitle = textTitle.find("input").val();
					var data = {
						"newsId": newsId,
						"newTitle": newTitle
					};
					$.ajax({
						type:"post",
						url:"changeTitle",
						data: data,
						success: function(data){
							$("#textTitle").find(".btn-close").click();
							if(data==1){
								alert("修改成功");
							}else{
								alert("修改失败");
							}
						}
					});
					location.reload();
				});
			}
			editTitle();
		})(jQuery);
	</script>
	</body>
</html>
