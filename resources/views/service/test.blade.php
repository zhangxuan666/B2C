<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<base href="/admin/">
<title>添加商品</title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="js/umeditor/themes/default/css/umeditor.css">
<link rel="stylesheet" href="css/style.css">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript" src="jeDate/jedate.js"></script>
</head>
<body>
  <div class="panel admin-panel">
      <div class="panel-head"><strong class="icon-reorder"> 添加新商品</strong></div>
    	<div class="tab-box">
		<form class="form-x" action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<div class="label">
												<label>商品名称：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="goods_name" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品价格：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="goods_price" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品描述：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="goods_intro" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品数量：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="goods_num" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>所属仓库：</label>
											</div>
											<div class="field">
												<select class="input">
												@foreach($res2 as $v)
													<option value="{{$v->id}}">{{$v->name}}</option>
												@endforeach
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>所属品牌：</label>
											</div>
											<div class="field">
												
												<select class="input">
													@foreach($res1 as $v)
													<option value="{{$v->id}}">{{$v->brand_name}}</option>
													@endforeach
												</select>
												
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>所属分类：</label>
											</div>
											<div class="field">
												<select class="input">
												@foreach($res as $v)
													<option value="{{$v->id}}">{{$v->type_name}}</option>
												@endforeach
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>上传商品图片：</label>
											</div>
											<div class="field">
							          <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image="" title="">
							          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传">
							        	
											</div>
											<div class="field margin-large-top text-center">
							          <a class="button bg-green">确定</a>
							          <a class="button bg-red">重置</a>
											</div>
										</div>
									</form>			
        </div>

<script type="text/javascript">
	$(function(){
  $(":radio").click(function(){
    if($(this).val()=="默认"){
    $(this).parent().children("p").text("使用系统默认的价格模式,统一使用一样的价格");
    }else if($(this).val()=="仓库"){
    	 $(this).parent().children("p").text("使用仓库的价格模式,根据不同仓库调取不同价格");
    }else{
    	 $(this).parent().children("p").text("使用地区的价格模式,根据不同地区调取不同价格");
    }
  });
 });
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="js/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="js/umeditor/umeditor.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/umeditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    var umMonth = UM.getEditor('editor-year');
    $('select').select();
   </script>
   <script type="text/javascript">
    //jeDate.skin('gray');
    jeDate({
		dateCell:"#dateinfo",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
    jeDate({
		dateCell:"#dateinfoa",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
    jeDate({
		dateCell:"#dateinfob",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
    jeDate({
		dateCell:"#dateinfoc",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
</script>
</body>
</html>



  