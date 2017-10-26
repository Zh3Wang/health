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
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>jquery-ui.min.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>
<script src="<?php echo (ADMIN_LAYUI_URL); ?>lay/dest/layui.all.js"></script>
<link rel="stylesheet" href="<?php echo (ADMIN_LAYUI_URL); ?>css/layui.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>font-awesome.min.css">

<style type="text/css">
	

</style>
</head>
<body>
<div class="panel admin-panel">
  <div class="tab-content">
				<h1 class="text-center">为<span style="color:red"><?php echo ($group_data['title']); ?></span>分配权限</h1>
				<form action="/health/management/Application/index.php/Admin/Auth/rule_group" method="post">
					<input type="hidden" name="id" value="<?php echo ($group_data['id']); ?>">
					<table class="layui-table">
						<?php if(is_array($rule_data)): foreach($rule_data as $key=>$v): if(empty($v['_data'])): ?><tr class="b-group">
									<td width="10%">
										<label>
											<?php echo ($v['title']); ?>
											<input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)" >
										</label>
									</td>
									<td></td>
								</tr>
							<?php else: ?>
								<tr class="b-group">
									<td width="10%">
										<label>
											<?php echo ($v['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)">
										</label>
									</td>
									<td class="b-child">
										<?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><table class="layui-table">
												<tr class="b-group">
													<td width="10%">
														<label>
															<?php echo ($n['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($n['id']); ?>" <?php if(in_array($n['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)">
														</label>
													</td>
													<td>
														<?php if(!empty($n['_data'])): if(is_array($n['_data'])): $i = 0; $__LIST__ = $n['_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><label>
																	&emsp;<?php echo ($c['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($c['id']); ?>" <?php if(in_array($c['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> >
																</label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
													</td>
												</tr>
											</table><?php endforeach; endif; ?>
									</td>
								</tr><?php endif; endforeach; endif; ?>
						<tr>
							<th></th>
							<td>
								<input class="btn btn-success" type="submit" value="提交">
							</td>
						</tr>
					</table>
				</form>
</div>
</div>
<script type="text/javascript">
function checkAll(obj){
	    $(obj).parents('.b-group').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
	}

</script>
</body>
</html>