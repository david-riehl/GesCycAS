<?php /* Smarty version Smarty-3.1.14, created on 2013-12-12 09:33:17
         compiled from "view\templates\activite_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1447152a970ced4a160-52804577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd69c58ee191191ac0ba8fa1984c1789cea40a460' => 
    array (
      0 => 'view\\templates\\activite_update.tpl',
      1 => 1386837088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1447152a970ced4a160-52804577',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52a970cee420a9_49917554',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
    'item_fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a970cee420a9_49917554')) {function content_52a970cee420a9_49917554($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Activite::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../read/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Consulter">Consulter</a></li>
<?php }?>
<?php if (in_array('Activite::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
<?php }?>
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Modification d'une Activité</h1>
				<form name="frm_droit_update" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div id="main_item">
						<table>
							<tr><th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th><td><input type="text" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td></tr>
							<tr><th><label for="place">nombre de place <?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th><td><input type="text" id="place" name="place" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['place'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[2]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td></tr>
							<tr><td colspan="2"><span class="required">* Champ obligatoire</span></td></tr>
						</table>
					</div>
					
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Mettre-à-jour">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_droit_update"].elements["nom"].focus();
					document.forms["frm_droit_update"].elements["nom"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>