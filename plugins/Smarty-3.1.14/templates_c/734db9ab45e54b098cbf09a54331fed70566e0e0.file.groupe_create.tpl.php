<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 21:55:34
         compiled from "view\templates\groupe_create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15427529645a30bac77-70768785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '734db9ab45e54b098cbf09a54331fed70566e0e0' => 
    array (
      0 => 'view\\templates\\groupe_create.tpl',
      1 => 1385584712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15427529645a30bac77-70768785',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_529645a3c44134_50268911',
  'variables' => 
  array (
    'item_fields' => 0,
    'droits' => 0,
    'linked_items' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529645a3c44134_50268911')) {function content_529645a3c44134_50268911($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Création d'un Groupe</h1>
				<form name="frm_groupe_create" action="" method="post">
					<div  id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="nom" name="nom" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<td colspan="2"><span class="required">* Champ obligatoire</span></td>
							</tr>
						</table>
					</div>
					<div id="main_links">
<?php if (in_array('Affectation::default',$_smarty_tpl->tpl_vars['droits']->value)){?>
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
_grp_last" name="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id'];?>
_grp_last"<?php if (!in_array('Affectation::update',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>>
													<label for="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id'];?>
_grp_last">&nbsp;<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['login'];?>
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
<?php }?>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Créer">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_groupe_create"].elements["nom"].focus();
					document.forms["frm_groupe_create"].elements["nom"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>