<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 14:55:17
         compiled from "view\templates\document_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28245528f317ab71b06-55386344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a3e7e6473d51242436274c87c5df3db1ca37ed2' => 
    array (
      0 => 'view\\templates\\document_header.tpl',
      1 => 1385560488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28245528f317ab71b06-55386344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f317b90f565_90428730',
  'variables' => 
  array (
    'head_title' => 0,
    'head_charset' => 0,
    'generator' => 0,
    'head_metas' => 0,
    'head_styles' => 0,
    'URI_root' => 0,
    'head_scripts' => 0,
    'head_favicon' => 0,
    'debug_mode' => 0,
    'debug_var' => 0,
    'debug_msg' => 0,
    'warning_msg' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f317b90f565_90428730')) {function content_528f317b90f565_90428730($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['head_title']->value;?>
</title>
		<meta charset="<?php echo $_smarty_tpl->tpl_vars['head_charset']->value;?>
">
		<meta name="generator" content="<?php echo $_smarty_tpl->tpl_vars['generator']->value;?>
">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['name'] = 'head_sec0';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['head_metas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec0']['total']);
?>
		<meta name="<?php echo $_smarty_tpl->tpl_vars['head_metas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec0']['index']]['name'];?>
" content="<?php echo $_smarty_tpl->tpl_vars['head_metas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec0']['index']]['content'];?>
">
<?php endfor; endif; ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['name'] = 'head_sec1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['head_styles']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec1']['total']);
?>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['head_styles']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec1']['index']];?>
">
<?php endfor; endif; ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['name'] = 'head_sec2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['head_scripts']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head_sec2']['total']);
?>
		<script src="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['head_scripts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head_sec2']['index']];?>
"></script>
<?php endfor; endif; ?>
<?php if ($_smarty_tpl->tpl_vars['head_favicon']->value){?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/favicon.ico">
<?php }?>
	</head>
	<body>
		<div id="container">
<?php if ($_smarty_tpl->tpl_vars['debug_mode']->value){?>
			<pre>
				Debug Mode : [ ON ]
<?php if (!empty($_smarty_tpl->tpl_vars['debug_var']->value)){?>
				<table style="border:1px solid black; color:gray;">
				<caption style="text-align:left;">You have <?php echo count($_smarty_tpl->tpl_vars['debug_var']->value);?>
 debugged variable(s).</caption>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['name'] = 'debug_sec0';
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['debug_var']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec0']['total']);
?>
					<tr>
						<td>
							<table style="border:1px solid black; color:gray;">
								<caption style="text-align:left;">Message #<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['debug_sec0']['index']+1;?>
</caption>
								<tr>
									<td style="vertical-align:top;"><label>Variable : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['debug_var']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec0']['index']]['var_name'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>Dump : </label></td>
									<td><pre><?php echo $_smarty_tpl->tpl_vars['debug_var']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec0']['index']]['var_dump'];?>
</pre></td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['debug_var']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec0']['index']]['file'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : <label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['debug_var']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec0']['index']]['line'];?>
</td>
								</tr>
							</table>
						</td>
					</tr>
<?php endfor; endif; ?>
				</table>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['debug_msg']->value)){?>
				<table style="border:1px solid black; color:gray;">
				<caption style="text-align:left;">You have <?php echo count($_smarty_tpl->tpl_vars['debug_msg']->value);?>
 debug message(s)</caption>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['name'] = 'debug_sec1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['debug_msg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec1']['total']);
?>
					<tr>
						<td>
							<table style="border:1px solid black; color:gray;">
								<caption style="text-align:left;">Message #<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['debug_sec1']['index']+1;?>
</caption>
								<tr>
									<td style="vertical-align:top;"><label>message : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['debug_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec1']['index']]['msg'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['debug_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec1']['index']]['file'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['debug_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec1']['index']]['line'];?>
</td>
								</tr>
							</table>
						</td>
					</tr>
<?php endfor; endif; ?>
				</table>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['warning_msg']->value)){?>
				<table style="border:1px solid black; color:orange;">
				<caption style="text-align:left;">You have <?php echo count($_smarty_tpl->tpl_vars['warning_msg']->value);?>
 warning message(s)</caption>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['name'] = 'debug_sec2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['warning_msg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec2']['total']);
?>
					<tr>
						<td>
							<table style="border:1px solid black; color:orange;">
								<caption style="text-align:left;">Message #<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['debug_sec2']['index']+1;?>
</caption>
								<tr>
									<td style="vertical-align:top;"><label>message : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['warning_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec2']['index']]['msg'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['warning_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec2']['index']]['file'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['warning_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec2']['index']]['line'];?>
</td>
								</tr>
							</table>
						</td>
					</tr>
<?php endfor; endif; ?>
				</table>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['error_msg']->value)){?>
				<table style="border:1px solid black; color:red;">
				<caption style="text-align:left;">You have <?php echo count($_smarty_tpl->tpl_vars['error_msg']->value);?>
 error message(s)</caption>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['name'] = 'debug_sec3';
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['error_msg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['debug_sec3']['total']);
?>
					<tr>
						<td>
							<table style="border:1px solid black; color:red;">
								<caption style="text-align:left;">Message #<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['debug_sec3']['index']+1;?>
</caption>
								<tr>
									<td style="vertical-align:top;"><label>message : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['error_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec3']['index']]['msg'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>in file : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['error_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec3']['index']]['file'];?>
</td>
								</tr>
								<tr>
									<td style="vertical-align:top;"><label>line : </label></td>
									<td><?php echo $_smarty_tpl->tpl_vars['error_msg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['debug_sec3']['index']]['line'];?>
</td>
								</tr>
							</table>
						</td>
					</tr>
<?php endfor; endif; ?>
				</table>
<?php }?>
			</pre>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>