<?php /* Smarty version Smarty-3.1.14, created on 2013-11-22 11:45:43
         compiled from "view\templates\groupe_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20605528f35d7baeb98-84577988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2b76f4f328b9b57ac95170145d8c03e778b60d6' => 
    array (
      0 => 'view\\templates\\groupe_update.tpl',
      1 => 1385049402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20605528f35d7baeb98-84577988',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'item_fields' => 0,
    'linked_items' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f35d8393877_07275442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f35d8393877_07275442')) {function content_528f35d8393877_07275442($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href="../.." title="Accueil">Accueil</a></li>
					<li><a href="../read/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Consulter">Consulter</a></li>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Modification d'un Groupe</h1>
				<form name="frm_groupe_update" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div id="main_item">
						<table>
							<tr><th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th><td><input type="text" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td></tr>
							<tr><td colspan="2"><span class="required">* Champ obligatoire</span></td></tr>
						</table>
					</div>
					<div id="main_links">
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Affectations</legend>
										<table>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['name'] = 'utl_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['linked_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['utl_list']['total']);
?>
											<tr>
												<td>
													<input type="checkbox" id="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['utl_list']['index']]['id']][$_smarty_tpl->tpl_vars['item']->value['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id']][$_smarty_tpl->tpl_vars['item']->value['id']]==true){?> checked="checked"<?php }?>>
													<label for="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['login'];?>
 (<span style="font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['nom'];?>
</span>)</label>
												</td>
											</tr>
<?php endfor; endif; ?>
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Mettre-à-jour">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_groupe_update"].elements["nom"].focus();
					document.forms["frm_groupe_update"].elements["nom"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>