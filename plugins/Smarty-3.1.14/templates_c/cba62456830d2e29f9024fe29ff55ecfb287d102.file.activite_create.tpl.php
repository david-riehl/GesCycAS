<?php /* Smarty version Smarty-3.1.14, created on 2013-12-12 09:55:19
         compiled from "view\templates\activite_create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1705452a9793230a649-00849891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cba62456830d2e29f9024fe29ff55ecfb287d102' => 
    array (
      0 => 'view\\templates\\activite_create.tpl',
      1 => 1386838517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1705452a9793230a649-00849891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52a979323c17f4_01281161',
  'variables' => 
  array (
    'item_fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a979323c17f4_01281161')) {function content_52a979323c17f4_01281161($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Création d'une Activité</h1>
				<form name="frm_droit_create" action="" method="post">
					<div  id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="nom" name="nom" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="place">place disponible<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="place" name="place" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[2]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<td colspan="2"><span class="required">* Champ obligatoire</span></td>
							</tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Créer">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_droit_create"].elements["nom"].focus();
					document.forms["frm_droit_create"].elements["nom"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>