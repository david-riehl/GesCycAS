<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 22:45:07
         compiled from "view\templates\session_open.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26456529529daa35dc7-90047904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd744f3dede61029d44f340bd86f3888556bc09d' => 
    array (
      0 => 'view\\templates\\session_open.tpl',
      1 => 1385588704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26456529529daa35dc7-90047904',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_529529dae7bac0_13361871',
  'variables' => 
  array (
    'erreur' => 0,
    'message' => 0,
    'linked_item_fields' => 0,
    'linked_fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529529dae7bac0_13361871')) {function content_529529dae7bac0_13361871($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Ouverture d'une Session</h1>
<?php if ($_smarty_tpl->tpl_vars['erreur']->value){?>
				<p class="erreur">Erreur&nbsp;: <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
<?php }?>
				<form name="session_open" action="" method="post">
					<div id="main_items">
						<table>
							<tr>
								<td><input type="text" id="login" name="login" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['linked_item_fields']->value[4]['size'];?>
" required="required" placeholder="identifiant"></td>
							</tr>
							<tr>
								<td><input type="password" id="password" name="password" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['linked_fields']->value[5]['size'];?>
" required="required" placeholder="mot de passe"></td>
								<td><input type="submit" name="btn_connecter" value="Connecter"></td>
							</tr>
						</table>
					</div>
				</form>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>