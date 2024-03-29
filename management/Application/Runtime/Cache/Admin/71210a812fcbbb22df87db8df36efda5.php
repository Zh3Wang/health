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
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>jquery-ui.min.css">
<link rel="stylesheet" href="<?php echo (ADMIN_LAYUI_URL); ?>css/layui.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>font-awesome.min.css">
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>jquery-ui.min.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>
<style type="text/css">
	.dialogtable{border-collapse: collapse; width: 100%;padding-top: 12px;}
	.dialogtable th{background-color: #E8E8E8;}
	.dialogtable th,
	.dialogtable td{border: solid 1px #ccc; padding: 8px;valign:middle;}
	.button.border-green{ color:#22CC77;}
	.pagelist span.current{background: #22CC77}
	.level li{float:left;}
	.bread{}
</style>
</head>
<body>
<form method="post" action="/healthSystem/management/Application/index.php/Admin/User/listUser" id="listform">
  <div class="panel admin-panel">
    <!-- <div class="panel-head">
	    <strong class="icon-reorder"> 内容列表</strong>
	</div> -->
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li>
        <a class="layui-btn layui-btn-primary" href="/healthSystem/management/Application/index.php/Admin/User/add"><i class="layui-icon">&#xe654;</i>  添加用户</a> </li>
        <li style="margin-left: 500px">
          <input type="text" placeholder="请输入用户手机号" name="searchValue" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a class="layui-btn layui-btn" style="cursor:pointer" onclick="$('#listform').submit()"><i class="layui-icon">&#xe615;</i>  搜索</a>	
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="8%" style="text-align:left; padding-left:20px;">ID</th>
        <th width="8%">帐号</th>
        <th width="10%">用户名称</th>
        <th width="14%">所属地址</th>
        <th width="5%">性别</th>
        <th width="20%">注册时间</th>
        <th width="30%">操作</th>
      </tr>
      <?php if(empty($data)): ?>
      		<tr>
      			<td></td>
      			<td></td>
      			<td></td>
      			<td>
      				<div style="padding:20px"><i class="layui-icon" style="font-size: 30px; color: #22CC77;">&#xe650;</i>空空如也~</div>
      			</td>
      		</tr>
      <?php endif; ?>
    <?php foreach ($data as $k => $v): ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="user_id[]" value="<?php echo $v['user_id']; ?>" /><?php echo $v['user_id']; ?></td>
          <td><?php echo $v['user_phone']; ?></td>
          <td><?php echo $v['user_name']; ?></td>
          <td><?php echo $v['user_city']; ?></td>
          <td><?php echo $v['user_sex']; ?></td>
          <td><?php echo $v['user_time']; ?></td>
          <td>
          <a class="layui-btn layui-btn-primary layui-btn-mini" style="cursor:pointer" onclick="showDialog(<?php echo $v['user_id']; ?>)"><i class="layui-icon">&#xe615;</i>　查　看</a>
          <a class="layui-btn layui-btn layui-btn-mini" href="/healthSystem/management/Application/index.php/Admin/User/edit/user_id/<?php echo $v['user_id']; ?>"><i class="layui-icon">&#xe642;</i>　修　改</a> 
          <a class="layui-btn layui-btn-danger layui-btn-mini" style="cursor:pointer" onclick="del(<?php echo $v['user_id']; ?>)"> <i class="layui-icon">&#xe640;</i>　删　除</a></br>
          <div style="margin-top: 10px;margin-left: 0px">
          	  <a class="layui-btn layui-btn-primary layui-btn-mini" href="/healthSystem/management/Application/index.php/Admin/HistoryVis/listHis/user_id/<?php echo $v['user_id']; ?>/relative_id/0"><i class="layui-icon">&#xe642;</i>历史就诊</a>
			  <a class="layui-btn layui-btn-danger layui-btn-mini" href="/healthSystem/management/Application/index.php/Admin/User/edit/user_id/<?php echo $v['user_id']; ?>"><i class="layui-icon">&#xe63c;</i>用药日记</a>
			  <a class="layui-btn layui-btn-normal layui-btn-mini" href="/healthSystem/management/Application/index.php/Admin/relative/listRela/user_id/<?php echo $v['user_id']; ?>"><i class="layui-icon">&#xe612;</i>亲友管理</a>
          </div>
		  </td>
          <td colspan="0">
          	<!-- 详情页面 -->
        	<div id="dialog<?php echo $v['user_id']; ?>" style="display:none;" title="详情信息">
    		<table class="dialogtable" cellspacing="0" cellpadding="0">
    			<tr>
	    			<td valign="middle">头像：</td>
	    			<td><?php showImage($v['user_img'],120,80); ?></td>
	    		</tr>
	    		<tr>
	    			<td>用户名称：</td>
	    			<td><?php echo $v['user_name']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>用户昵称：</td>
	    			<td><?php echo $v['user_nickname']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>年龄：</td>
	    			<td><?php echo $v['user_age']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>用户电话：</td>
	    			<td><?php echo $v['user_phone']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>用户密码：</td>
	    			<td><?php echo $v['user_password']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>性别：</td>
	    			<td><?php echo $v['user_sex']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>所在城市：</td>
	    			<td><?php echo $v['user_city']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>出生日期：</td>
	    			<td><?php echo $v['user_date']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>证件类型：</td>
	    			<td><?php echo $v['papers_type']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>证件号码：</td>
	    			<td><?php echo $v['papers_num']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>民族：</td>
	    			<td><?php echo $v['nation']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>职业：</td>
	    			<td><?php echo $v['profession']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>文化程度：</td>
	    			<td><?php echo $v['education']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>婚姻状况：</td>
	    			<td><?php echo $v['marriage']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>QQ：</td>
	    			<td><?php echo $v['user_qq']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>微信：</td>
	    			<td><?php echo $v['user_weixin']; ?></td>
	    		</tr>
	    		<tr>
	    			<td>创建时间：</td>
	    			<td><?php echo $v['user_time']; ?></td>
	    		</tr>
    		</table>
       		</div>
          </td>
        </tr>
        
    <?php endforeach; ?>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a>
      </tr>
      <tr>
      	<td colspan="8">
      	<div class="pagelist">
      		<?php echo ($page); ?>
      		</div>
      	</td>
      </tr>
    </table>
</form>
<script src="<?php echo (ADMIN_LAYUI_URL); ?>lay/dest/layui.all.js"></script>
<script type="text/javascript">

//详情列表框
function showDialog(id) {
	layer.open({
        type: 1,
        area: ['450px', '460px'],
        content: $("#dialog"+id),
        shade:0,
        skin:'layui-layer-lan',
        offset: ['10px', '200px'],
        cancel:function(index, layero){
          $("#dialog"+id).css('display','none');
          layer.close(index);
        }
    });	
  };
//单个删除
function del(user_id){
	if(confirm("您确定要删除吗?")){
		window.location="/healthSystem/management/Application/index.php/Admin/User/delete/user_id/"+user_id;
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='user_id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	var user_id = new Array();
	 $("input[name='user_id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;
		var i = 0;
		$("input[name='user_id[]']:checked").each(function(){
			user_id[i] = this.value;
			i++;
		});
		window.location="/healthSystem/management/Application/index.php/Admin/User/delete/user_id/"+user_id;	
		//$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body>
</html>