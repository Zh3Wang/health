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
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>jquery-ui.min.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>

<style type="text/css">
	
</style>
</head>
<body>
<form method="post" action="/healthSystem/management/Application/index.php/Admin/Auth/listGroup" id="listform">
  <div class="panel admin-panel">
    <!-- <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div> -->
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="layui-btn layui-btn-primary" onclick="addGroup()"> <i class="layui-icon">&#xe654;</i>  添加权限</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="30%">用户组名称</th>
        <th width="310">操作</th>
      </tr>
    <?php foreach ($data as $k => $v): ?>
        <tr>
          <input type="hidden" name="id" value="<?php echo $v['id']; ?>" />
          <td><?php echo $v['title']; ?></td>
          <td class="text-center"><div class="button-group">
          <a class="layui-btn layui-btn-primary layui-btn-small" groupId="<?php echo ($v['id']); ?>" groupTitle="<?php echo ($v['title']); ?>" onclick="editGroup(this)" href="javascript:;"><i class="layui-icon">&#xe642;</i> 修改</a>
          <a class="layui-btn layui-btn-danger layui-btn-small" onclick="del(<?php echo ($v['id']); ?>)" href="javascript:;"><i class="layui-icon">&#xe640;</i> 删除</a>
          <a class="layui-btn layui-btn layui-btn-small" ruleId="<?php echo ($v['id']); ?>" ruleName="<?php echo ($v['name']); ?>" ruleTitle="<?php echo ($v['title']); ?>" href="/healthSystem/management/Application/index.php/Admin/Auth/rule_group/id/<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe614;</i>分配权限</a>
          <a class="layui-btn layui-btn layui-btn-small" style="cursor:pointer" onclick="del(<?php echo $v['id']; ?>)"><i class="layui-icon">&#xe613;</i> 添加成员</a>
          </div></td>
        </tr>
    <?php endforeach; ?>
    </table>
</form>
<!-- 添加用户组开始 -->
  <div id="groupForm" style="display: none" >
    <form style="margin-top: 40px" class="layui-form" method="post" action="/healthSystem/management/Application/index.php/Admin/Auth/addGroup">
      <div class="layui-form-item">
        <label class="layui-form-label">用户组</label>
        <div class="layui-input-inline">
          <input type="text" name="title" required  lay-verify="required" placeholder="请输入用户组名" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
      </div>
    </form>
</div>
<!-- 添加用户组结束 -->
<!-- 修改用户组开始 -->
  <div id="editGroup" style="display: none" >
    <form style="margin-top: 40px" class="layui-form" method="post" action="/healthSystem/management/Application/index.php/Admin/Auth/editGroup">
      <input type="hidden" name="id">
      <div class="layui-form-item">
        <label class="layui-form-label">用户组</label>
        <div class="layui-input-inline">
          <input type="text" name="title" required  lay-verify="required" placeholder="请输入用户组名" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
      </div>
    </form>
</div>
<!-- 修改用户组结束 -->
<script src="<?php echo (ADMIN_LAYUI_URL); ?>lay/dest/layui.all.js"></script>
<script type="text/javascript">

//添加菜单
function addGroup(){
  $("input[name='title']").val('');
  layer.open({
        type: 1,
        area: ['500px', '230px'],
        content: $('#groupForm'),
        shade:0,
        title:'添加用户组',
        offset: ['40px', '200px'],
        cancel:function(index, layero){
          $('#groupForm').css('display','none');
          layer.close(index);
        }
    }); 
}

// 编辑菜单
function editGroup(obj){
  var groupId = $(obj).attr('groupId');
  var groupTitle = $(obj).attr('groupTitle');
  $("input[name='id']").val(groupId);
  $("input[name='title']").val(groupTitle);
  layer.open({
        type: 1,
        area: ['500px', '230px'],
        content: $('#editGroup'),
        shade:0,
        title:'添加用户组',
        offset: ['40px', '200px'],
        cancel:function(index, layero){
          $('#editGroup').css('display','none');
          layer.close(index);
        }
    }); 
}

//删除
function del(id){
  if(confirm("您确定要删除吗?")){
    window.location="/healthSystem/management/Application/index.php/Admin/Auth/delGroup/id/"+id;
  }
}






</script>
</body>
</html>