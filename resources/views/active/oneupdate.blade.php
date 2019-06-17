<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<base href="/admin/">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript" src="jeDate/jedate.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span> 编辑优惠活动</strong></div>
  <div class="body-content">
    <form class="form-x" action="/active/update" method="post">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<input type="hidden" name="id" value="{{$res->id}}">
										<div class="form-group">
											<div class="label">
												<label>优惠商家名称：</label>
											</div>
											<div class="field">
												<input type="text" name="merchant_name" class="input" / value="{{$res->merchant_name}}">
											</div>
										</div>
									<div class="form-group">
											<div class="label">
												<label>优惠开始日期：</label>
											</div>
											<div class="field">
												<input type="text" name="begin_time" class="input w50" id="dateinfo"/>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>优惠结束日期：</label>
											</div>
											<div class="field">
												<input type="text" name="end_time" class="input w50" id="dateinfoa"/>
											</div>
										</div>
							        <div class="form-group">
							      	<div class="label">
							          <label>优惠方式：</label>
							        </div>
							        <div class="field field-tsa">
							      		<select class="input float-left" style="width: auto;" name="active_name" >
							      			<option value="满减活动">满减活动</option>
							      			<option value="优惠卷活动">优惠卷活动</option>
							      			<option value="买一送一">买一送一</option>
							      		</select>
							      		
							   			</div>
							        </div>
										<div class="form-group">
											<div class="text-center">
												<input type="submit" class="button bg-green" value="确定">
							          <!-- <a class="button bg-green">确定</a> -->
							          <a class="button bg-red">重置</a>
											</div>
										</div>
										
									</form>
  </div>
</div>
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
</script>
</body></html>