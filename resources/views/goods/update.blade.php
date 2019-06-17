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
      <div class="panel-head"><strong class="icon-reorder"> 添加新商品</strong></div>s
    	<div class="tab-box">
		<form class="form-x" action="/goods/doupdate" method="post" enctype="multipart/form-data">
		 @csrf    
		 <input type="hidden" name="id" value="{{$res3->id}}">
										<div class="form-group">
											<div class="label">
												<label>商品名称：</label>
											</div>
											<div class="field">
												<input type="text" class="input" value="{{$res3->goods_name}}" name="goods_name" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品价格：</label>
											</div>
											<div class="field">
												<input type="text" class="input" value="{{$res3->goods_price}}" name="goods_price" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品描述：</label>
											</div>
											<div class="field">
												<input type="text" class="input" value="{{$res3->goods_intro}}"  name="goods_intro" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品数量：</label>
											</div>
											<div class="field">
												<input type="text" class="input" value="{{$res3->goods_num}}" name="goods_num" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>所属仓库：</label>
											</div>
											<div class="field">
												<select class="input" name="attr_id">
												@foreach($res2 as $v)
												   @if($v->id==$res3->attr_id)
													<option value="{{$v->id}}">{{$v->name}}</option>
												   @endif
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
												
												<select class="input" name="brands_id">
													@foreach($res1 as $v)
													 @if($v->id==$res3->brands_id)
													<option value="{{$v->id}}">{{$v->brand_name}}</option>
												   @endif
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
												<select class="input" name="type_id">
												@foreach($res as $v)
												 @if($v->id==$res3->type_id)
													<option value="{{$v->id}}">{{$v->type_name}}</option>
												   @endif
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
							          <input type="file" id="url1" name="goods_img" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image="" title="">
							         
							        	
											</div>
											  @if ($errors->any())
										          <div class="alert alert-danger">
										              <ul>
										                  @foreach ($errors->all() as $error)
										                      <li>{{ $error }}</li>
										                  @endforeach
										              </ul>
										          </div>
										        @endif
											<div class="field margin-large-top text-center">
							                       <input class="button bg-main " type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
											</div>
										</div>
									</form>			
        </div>

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



  