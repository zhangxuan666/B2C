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
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>仓库编辑</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/warehouse/update_do">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

      <div>
        <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
      </div>
      <div class="form-group">
        <div class="label">
          <label>仓库名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value="<?php echo e($data->name); ?>" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>仓库所在地：</label>
        </div>
        <div class="bf75">
            <select class="form-control" id="form-field-select-1" name="city_name">
              <option value="<?php echo e($data->city_name); ?>"><?php echo e($data->city_name); ?></option>
              <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($city->city_name); ?>" ><?php echo e($city->city_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
      </div>
      

        <div class="form-group">
         <div class="label">
            <label>是否启用：</label>
          </div>
          <div class="field">
            <div class="product-mulde product-mulde-a">
                <ul>
                  <li>
                    <input type="radio" name="is_open" value="1"><label>是</label>
                    <input type="radio" name="is_open" value="0"><label>否</label>
                  </li>
                </ul>
            </div>
          </div>
        </div>

        <div class="form-group">
         <div class="label">
            <label>服务地区：</label>
          </div>
          <div class="field">
            <div class="product-mulde product-mulde-a">
                <ul>
                  <li>
                    <input type="radio" name="service_addr" value="1"><label>全国</label>
                    <input type="radio" name="service_addr" value="0"><label>仓库所在地</label>
                  </li>
                </ul>
            </div>
          </div>
        </div>
        
      <div class="form-group">
        <div class="text-center">
            <div class="field">
                <button class="button bg-green" type="submit">修改</button>
                <button class="button bg-red" type="reset">重置</button>
            </div>
        </div>
      </div>
  </form>

  </div>
</div>
</body></html><?php /**PATH D:\PhpStudy20180211\PHPTutorial\WWW\Lxgw\resources\views/warehouse/update.blade.php ENDPATH**/ ?>