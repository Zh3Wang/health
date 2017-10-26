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
<link href="<?php echo (ADMIN_CSS_URL); ?>foundation-datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.cityselect.js"></script>
<script type="text/javascript" charset="utf-8" src="/health/management/application/Public/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/health/management/application/Public/Ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/health/management/application/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>foundation-datepicker.min.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>locales/foundation-datepicker.zh-CN.js"></script> 
<style type="text/css">
    .tips{
      color: red;
      line-height: 40px;
      margin-left: 20px;
    }
    #nav{ width:100%; height:30px; background:#00A2CA;} 
    #nav li{display:inline; height:60px} 
    #nav li {display:inline-block; padding:0 20px; height:30px; line-height:30px;
                color:#FFF; font-family:"5FAE8F6F96C59ED1"; font-size:12px} 
    #nav li:hover{background:#0095BB;cursor: pointer;}
    /*设置鼠标滑过或悬停时变化的背景颜色 */
    .tab-front{
      background:#0095BB;
    }
    
</style>
</head>
<body>
<div class="panel admin-panel">
      <div class="panel-head" id="add">
       <ul id="nav"> 
          <li class="tab-front">基本信息</li> 
      </ul> 
      </div>
    <div class="body-content">
    <form method="post" class="form-x" action="/health/management/application/index.php/Admin/User/edit/user_id/1" name="fileUploadForm" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo I('get.user_id'); ?>">
    <div class="div_tab" style="display:block;">  
      <div class="form-group">
        <div class="label">
          <label>用户姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_name']; ?>" name="user_name" data-validate="required:请输入标题" />
          <span class="tips">*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>用户昵称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_nickname']; ?>" name="user_nickname" data-validate="required:请输入标题" />
          <span class="tips">*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>所在城市：</label>
        </div>
        <div id="city" class="field">
            <select name="prov" class="prov"></select>   
            <select name="city" class="city" disabled="disabled"></select>  
            <select name="dist" class="dist" disabled="disabled"></select>
            <span class="tips">*</span>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>年龄：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_age']; ?>" name="user_age" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>用户电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_phone']; ?>" name="user_phone" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>用户密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_password']; ?>" name="user_password" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>性别：</label>
        </div>
        <div class="field">
          <label><input <?php echo $data['user_sex']=='男'?'checked="checked"':null ?> name="user_sex" type="radio" value="男"/>男</label>
          <label><input <?php echo $data['user_sex']=='女'?'checked="checked"':null ?> name="user_sex" type="radio" value="女"/>女</label>
          <span class="tips">*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>出生日期：</label>
        </div>
        <div class="field">
          <input type="text" id="user_date" class="input w50" value="<?php echo $data['user_date']; ?>" name="user_date" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>证件类型：</label>
        </div>
        <div class="field">
          <select name="papers_type">
            <option <?php echo $data['papers_type']=='身份证'?'selected="selected"':null ?> value="身份证">身份证</option>
            <option <?php echo $data['papers_type']=='港澳通行证'?'selected="selected"':null ?> value="港澳通行证">港澳通行证</option>
            <option <?php echo $data['papers_type']=='军人证'?'selected="selected"':null ?> value="军人证">军人证</option>
            <option <?php echo $data['papers_type']=='学生证'?'selected="selected"':null ?> value="学生证">学生证</option>
          </select>
          <span class="tips">*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>证件号码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['papers_num']; ?>" name="papers_num" />
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>民族：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['nation']; ?>" name="nation" />
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>职业：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['profession']; ?>" name="profession" />
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>文化程度：</label>
        </div>
        <div class="field">
          <select name="education">
            <option <?php echo $data['papers_type']=='初中或以下'?'selected="selected"':null ?> value="初中或以下">初中或以下</option>
            <option <?php echo $data['papers_type']=='高中'?'selected="selected"':null ?> value="高中">高中</option>
            <option <?php echo $data['papers_type']=='本科'?'selected="selected"':null ?> selected="selected" value="本科">本科</option>
            <option <?php echo $data['papers_type']=='硕士'?'selected="selected"':null ?> value="硕士">硕士</option>
            <option <?php echo $data['papers_type']=='博士或以上'?'selected="selected"':null ?> value="博士或以上">博士或以上</option>
          </select>
          <span class="tips"></span>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>婚姻状况：</label>
        </div>
        <div class="field">
          <select name="marriage">
            <option <?php echo $data['papers_type']=='未婚'?'selected="selected"':null ?> value="未婚">未婚　</option>
            <option <?php echo $data['papers_type']=='已婚'?'selected="selected"':null ?> value="已婚">已婚　</option>
          </select>
          <span class="tips"></span>        
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>QQ：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_qq']; ?>" name="user_qq" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>微信：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $data['user_weixin']; ?>" name="user_weixin" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>头像：</label>
        </div>
         <!-- 显示图片 -->
        <span><?php showImage($data['user_img'],120,80); ?></span>
        <div style="margin-left: 140px;margin-top: 10px" class="field">
          <input type="file" id="fileUpload" name="user_img" class="input tips" style="display:none;width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image=""  />
          <div id="filePath" style="float:left;line-height:40px;" ></div>
          <input type="button" class="button bg-blue margin-left upload" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片格式：jpg，jpeg，gif，png</div>
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
  $('#user_date').fdatepicker();
  
  //院内导航图上传按钮处理
  $(".upload").click(function(){
    console.log("Sd");
    $("#fileUpload").click();
  });
  $("#fileUpload").change(function(){
    var path = $(this).val();
    var filename = path.substring(path.lastIndexOf("\\")+1);
    $("#filePath").text(filename);
  });


$("#city").citySelect({   
    url:"<?php echo (ADMIN_JS_URL); ?>city.min.js",   
    prov:"<?php echo ($data["user_city"]["0"]); ?>", //省份  
    city:"<?php echo ($data["user_city"]["1"]); ?>", //城市  
    dist:"<?php echo ($data["user_city"]["2"]); ?>", //区县  
    nodata:"none" //当子集无数据时，隐藏select  
});
</script>
</html>