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
					<div class="tab">
						<div class="tab-head">
							<ul class="tab-nav">
								
								<li><a href="#tab-b">通用信息</a> </li>

								<li><a href="#tab-a">添加类型属性</a> </li>
								
								<li><a href="#tab-s">类型属性列表</a> </li>


								<li><a href="#tab-h">商品属性</a> </li>

							

							
							</ul>
						</div>
						<div class="tab-body">
						
							<div class="tab-panel" id="tab-b">
								<div class="common-info">
									<form class="form-x">
										<div class="form-group">
											<div class="label">
												<label>商品名称：</label>
											</div>
											<div class="field">
												<input type="text" class="input" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品货号：</label>
											</div>
											<div class="field field-tsa">
												<input type="text" class="input" />
												<p>如果您不输入商品货号，系统将自动生成一个唯一的货号。</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>平台商品分类：</label>
											</div>
											<div class="field">
												<select class="input">
													<option>所有分类</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>平台扩展分类：</label>
											</div>
											<div class="field">
												<select class="input">
													<option>所有分类</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品品牌：</label>
											</div>
											<div class="field">
												<select class="input">
													<option>所有分类</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>选择供货商：</label>
											</div>
											<div class="field">
												<select class="input">
													<option>供货商</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>本店售价：</label>
											</div>
											<div class="field">
												<input type="text" class="input" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>会员价格：</label>
											</div>
											<div class="field field-ts">
												<label>铜牌</label><input type="text" class="input"  />
												<label>QQ用户</label><input type="text" class="input" />
												<label>银牌</label><input type="text" class="input" />
												<label>金牌</label><input type="text" class="input" />
												<label>代销用户</label><input type="text" class="input" />
												<div class="clear"></div>
												<p>会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品优惠价格：</label>
											</div>
											<div class="field field-ts">
												<label>优惠数量</label><input type="text" class="input"  />
												<label>优惠价格</label><input type="text" class="input" />
												<div class="clear"></div>
												<p>会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>市场售价：</label>
											</div>
											<div class="field">
												<input type="text" class="input" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>赠送消费积分：</label>
											</div>
											<div class="field field-tsa">
												<input type="text" class="input" />
												<p>购买该商品时赠送消费积分数,-1表示按商品价格赠送</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>赠送等级积分：</label>
											</div>
											<div class="field field-tsa">
												<input type="text" class="input" />
												<p>购买该商品时赠送等级积分数,-1表示按商品价格赠送</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>积分购买金额：</label>
											</div>
											<div class="field">
												<input type="text" class="input" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>促销价：</label>
											</div>
											<div class="field">
												<input type="text" class="input" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>促销日期：</label>
											</div>
											<div class="field field-ts">
												<label>开始日期</label><input type="text" class="input" style="width: 165px;"  id="dateinfo"/>
												<label>结束日期</label><input type="text" class="input" style="width: 165px;" id="dateinfoa"/>
												<div class="clear"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>限购：</label>
											</div>
											<div class="field">
												<input type="text" class="input" />
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>限购日期：</label>
											</div>
											<div class="field field-ts">
												<label>开始日期</label><input type="text" class="input" id="dateinfob" style="width: 165px;"/>
												<label>结束日期</label><input type="text" class="input" id="dateinfoc" style="width: 165px;"/>
												<div class="clear"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>上传商品图片：</label>
											</div>
											<div class="field">
							          <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image="" title="">
							          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传">
							        	<div class="clear"></div>
							        	<input type="text" class="input margin-large-top" value="http://" />
											</div>
											<div class="field margin-large-top text-center">
							          <a class="button bg-green">确定</a>
							          <a class="button bg-red">重置</a>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-panel" id="tab-c">
								<form class="form-x">
										<div class="form-group">
							        <div class="label">
							          <label>内容：</label>
							        </div>
							        <div class="field">
							          <div id="editor-year" style="width: 800px;" class="editor"></div>
							        </div>
							        <div class="field margin-large-top text-center">
							          <a class="button bg-green">确定</a>
							          <a class="button bg-red">重置</a>
											</div>
							      </div>
					      </form>
							</div>
			
							<div class="tab-panel" id="tab-e">
								<form class="form-x">
									<div class="form-group">
										<div class="label">
											<label>商品类型：</label>
										</div>
										<div class="field field-tsa">
											<select class="input">
												<option>服装</option>
											</select>
											<p>请选择商品的所属类型，进而完善此商品的属性</p>
											<div class="form-group">
											<div class="label">
												<label>颜色：</label>
											</div>
											<div class="field margin-small-top">
												<label><input type="checkbox"  />黑色</label>
												<label><input type="checkbox"  />红色</label>
												<label><input type="checkbox"  />黄色</label>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>尺码：</label>
											</div>
											<div class="field margin-small-top">
												<label><input type="checkbox"  />xxl</label>
												<label><input type="checkbox"  />xl</label>
												<label><input type="checkbox"  />xxxl</label>
											</div>
											<div class="field margin-big-top">
							          <a class="button bg-green">确定</a>
							          <a class="button bg-red">重置</a>
											</div>
										</div>
										</div>
									</div>
								</form>
							</div>

							
							<div class="tab-panel" id="tab-a">
								<form class="form-x" action="<?php echo e(url('goods/add_Type_Attribute')); ?>" method="post">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<div class="form-group">
										<div class="label">
											<label>类型名称</label>
										</div>
										<div class="field field-tsa">
											<select class="input" name="type_name">
												<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option><?php echo e($list->type_name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
											</div>

											<div class="label">
											<label>颜色</label>
										</div>
										<div class="field field-tsa">
											<input class="input" name="type_color">
										
											
											</div>
											

											<div class="label">
											<label>大小</label>
										</div>
										<div class="field field-tsa">
											<input class="input" name="type_size">
										
											
											</div>
											
										
							
							
										
										<div class="form-group">
									
											<center>
											<div class="field margin-big-top">
							       
									  <input class="button bg-green" type="submit" value="确定">
									  <input class="button bg-red" type="reset" value="重置">
											</div>
											</center>
										</div>
										
									</div>
								</form>
							</div>
							

							<div class="tab-panel" id="tab-s">
							<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 商品列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
			    <div class="border-b border-bno clearfix">
			      <a href="add-product.html" class="button bg-yellow button-small"><span class="icon-plus"></span>添加类型属性</a>
			     </div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <!--<li> <a class="button border-main icon-plus-square-o" href="add.html"> 发布文章</a> </li>-->
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:150px; line-height:17px;" onchange="changesearch()">
              <option value="">所有分类</option>
              <option value="">衣服</option>
              <option value="">食品</option>
              <option value="">电子</option>
              <option value="">旅游</option>
            </select>
          </li>
        </if>
       <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">所有品牌</option>
              <option value="">自营品牌</option>
              <option value="">商家品牌</option>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">精品</option>
              <option value="">特价</option>
              <option value="">热销</option>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">全部</option>
              <option value="">供货商</option>
              <option value="">供货商</option>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">全部</option>
              <option value="">上架</option>
              <option value="">下架</option>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">全部</option>
              <option value="">审核</option>
              <option value="">未审核</option>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder=""  class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 查询</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">编号</th>
        <th>类型名称</th>
        <th>类型颜色</th>
        <th>类型尺寸</th>
        
        <th width="310">操作</th>
      </tr>
	  
	  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           <?php echo e($data->id); ?></td>
         <td><?php echo e($data->type_name); ?></td>
          <td><?php echo e($data->type_color); ?></td>
          <td><?php echo e($data->type_size); ?></td>
          
          <td><div class="button-group"><a class="button border-yellow" href="add-product.html"><span class="icon-edit (alias)"></span>编辑</a><a class="button border-main" href=""><span class="icon-eye"></span> 查看</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="10" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a> 
      </tr>
      <tr>
        <td colspan="10"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>	
							</div>

							
  <div class="tab-panel" id="tab-h">
								<form class="form-x" action="<?php echo e(url('goods/add_sku')); ?>" method="post">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<div class="form-group">
										<div class="label">
											<label>商品类型：</label>
										</div>
										
										<div class="field field-tsa">
											<select class="input" name="goods_type">
												<?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option><?php echo e($type->type_name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>

										<div class="label">
											<label>商品名称：</label>
										</div>
										
										<div class="field field-tsa">
											<select class="input" name="goods_name">
											<?php $__currentLoopData = $good; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option><?php echo e($good->goods_name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
											
											
										
										
											<div class="form-group">
											<div class="label">
												<label>颜色：</label>
											</div>
											<div class="field margin-small-top">
											<?php $__currentLoopData = $checken; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checken): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<label><input type="checkbox"  name="sku_color[]" value="<?php echo e($checken->type_color); ?>" /><?php echo e($checken->type_color); ?></label>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>尺码：</label>
											</div>
											<div class="field margin-small-top">
											<?php $__currentLoopData = $check; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<label><input type="checkbox" name="sku_size[]" value="<?php echo e($check->type_size); ?>"  /><?php echo e($check->type_size); ?></label>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
											</div>
										
											<div class="field margin-big-top">
							      
									  <input  class="button bg-green" type="submit" value="确定">
									  <input class="button bg-red" type="reset" value="重置">
											</div>
										</div>
										</div>

										
									</div>
								</form>
							</div>

							
						
						
						</div>
					</div>
				</div>

				
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



  <?php /**PATH E:\jichenghuanjing\PHPTutorial\WWW\Lxgw\resources\views/goods/add_product.blade.php ENDPATH**/ ?>