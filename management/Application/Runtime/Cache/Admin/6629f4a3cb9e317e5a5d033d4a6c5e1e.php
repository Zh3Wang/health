<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>pintuer.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>admin.css">
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>
<script type="text/javascript" charset="utf-8" src="/health/management/Application/Public/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/health/management/Application/Public/Ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/health/management/Application/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
<style type="text/css">
    .tips{
      color: red;
      line-height: 40px;
      margin-left: 20px;
    }
    #nav li{display:inline; height:60px} 
    #nav li {display:inline-block; padding:0 20px; height:30px; line-height:30px;
                color:black; font-family:"5FAE8F6F96C59ED1"; font-size:12px}
   
</style>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <div class="body-content">
    <form method="post" class="form-x" action="/health/management/Application/index.php/Admin/illness/edit/illness_id/11" name="fileUploadForm" enctype="multipart/form-data">
    <input type="hidden" name="illness_id" value="<?php echo $data['illness_id']; ?>" />
    <div class="div_tab" style="display:block;">  
      <div class="form-group">
        <div class="label">
          <label>疾病名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['illness_name'] ?>" name="illness_name" data-validate="required:请输入标题" />
          <span class="tips">*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>所属科室：</label>
        </div>
        <div class="field">
          <select name="two_depa_id">
              <option value="0">请选择</option>
              <?php foreach ($dep as $k => $v): if($data['two_depa_id']==$v['dep_id']) { $select = 'selected="selected"'; }else{ $select = ''; } ?>
              <option <?php echo $select; ?> value="<?php echo $v['dep_id']; ?>"><?php echo str_repeat("　　",2*$v['level'])."|--".$v['dep_name']; ?></option>
              <?php endforeach ?>                     
          </select>
          <span class="tips">*</span>
        </div>
      </div>
      <div class="div_tab">
        <div class="form-group" >
          <div class="label">
            <label>疾病介绍：</label>
          </div>
          <div class="field">
            <textarea id="introduce" name="illness_introduce"><?php echo $data['illness_introduce'] ?></textarea>
            <div class="tips"></div>
          </div>
        </div>
      </div>
      </div>
      <!-- 提交 -->
      <div class="form-group" style="margin-left: 200px;margin-top: 40px">
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>
<script type="text/javascript">

 //调用ueditor编辑器
  var ue = UE.getEditor('introduce',{
          initialFrameWidth:"50%",
          initialFrameHeight:"300"
          });
</script>
</html>