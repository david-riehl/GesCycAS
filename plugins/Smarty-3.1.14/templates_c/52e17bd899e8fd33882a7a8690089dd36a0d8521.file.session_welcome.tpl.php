<?php /* Smarty version Smarty-3.1.14, created on 2013-12-05 09:06:13
         compiled from "view\templates\session_welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5152a033f53033a3-53418158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52e17bd899e8fd33882a7a8690089dd36a0d8521' => 
    array (
      0 => 'view\\templates\\session_welcome.tpl',
      1 => 1386060852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5152a033f53033a3-53418158',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'linked_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52a033f534f852_37521342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a033f534f852_37521342')) {function content_52a033f534f852_37521342($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Bienvenue <?php echo $_smarty_tpl->tpl_vars['linked_item']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['linked_item']->value['nom'];?>
</h1>
				<p>Vous êtes actuellement connectés avec le compte suivant&nbsp;:</p>
				<form name="session_open" action="" method="post">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="login">identifiant&nbsp;:</label></th>
								<td id="login"><?php echo $_smarty_tpl->tpl_vars['linked_item']->value['login'];?>
</td>
								<td><input type="submit" name="btn_deconnecter" value="Déconnecter"></td>
							</tr>
						</table>
					</div>
				</form>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>