<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 15:28:43
         compiled from "view\templates\welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2930528f35fbcdfe64-32397916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '546599b00a0fd1e6b164ba6e9e6b2a242f4a1d03' => 
    array (
      0 => 'view\\templates\\welcome.tpl',
      1 => 1385560377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2930528f35fbcdfe64-32397916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f35fbe11133_21318751',
  'variables' => 
  array (
    'title' => 0,
    'subtitle' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f35fbe11133_21318751')) {function content_528f35fbe11133_21318751($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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