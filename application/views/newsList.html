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
				<ul class="media-list interval-line">
					<li class="media">
						<div class="media-left">
							<a href="#">
								<img style="width:50px;height:50px;" class="media-object" src="..." alt="...">
							</a>
						</div>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Media heading</h4></a>
						</div>
					</li>
					<li class="media">
						<div class="media-left">
							<a href="#">
								<img style="width:50px;height:50px;" class="media-object" src="..." alt="...">
							</a>
						</div>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Media heading</h4></a>

						</div>
					</li>
				</ul>
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

		</div>

	</div>
	<script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/NewsRelease/dist/js/lib/bootstrap.min.js"></script>
	<script>
		(function($){
			var load = function () {
				var Load = this;
			};
			load.prototype = {
				loadList : function (listname) {
					var listname1 = "finance";
					if(listname!=="undefined"){
						listname1 = listname;
					}
					data = {
						"category" : listname1
					};
					$.ajax({
						type: "post",
						url: "showList.php",
						data: data,
						success: function (data) {
							var data1 = eval("("+data+")");
							var list = $("#"+listname1);
							list.children().remove();
							if(data1!=""){
								var str = Load.htmladd(data1);
								list.append(str);
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
						var hrefName = 'url+?newsId='+data[i].newsId;
						strHtml += `<li class="media">
										</div>
											<div class="media-body">
											<a href="`+hrefName+`"><h4 class="media-heading">`+data[i].title+`</h4></a>
										</div>
									</li>`;
					}

					strHtml += '</ul>';
					return strHtml;
				}
			};

			var loadobj = new load();
			loadobj.loadList();

			$("ul[role='tablist']").children().each(function(){
				$(this).bind("click", function(){
					var listname = $(this).find("a").attr("href").substring(1);
					console.log(listname);
					loadobj.loadList(listname);
				});
			});

		})(jQuery);
	</script>
	</body>
</html>
