<?php /* Smarty version Smarty-3.1.14, created on 2013-12-05 08:49:30
         compiled from "view\templates\welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1166352a0300ad39c56-22343662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '546599b00a0fd1e6b164ba6e9e6b2a242f4a1d03' => 
    array (
      0 => 'view\\templates\\welcome.tpl',
      1 => 1386060852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1166352a0300ad39c56-22343662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'subtitle' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52a0300ad811a8_55740463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a0300ad811a8_55740463')) {function content_52a0300ad811a8_55740463($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
			</div>
			<div id="main">
				<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
				<h2><?php echo $_smarty_tpl->tpl_vars['subtitle']->value;?>
</h2>
				<p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>