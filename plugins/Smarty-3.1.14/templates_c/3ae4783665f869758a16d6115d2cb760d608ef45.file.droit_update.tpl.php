<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 17:50:30
         compiled from "view\templates\droit_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4877528f33c47a1209-70465565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ae4783665f869758a16d6115d2cb760d608ef45' => 
    array (
      0 => 'view\\templates\\droit_update.tpl',
      1 => 1385571013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4877528f33c47a1209-70465565',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f33c52dc6c4_15332082',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
    'item_fields' => 0,
    'linked_items' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f33c52dc6c4_15332082')) {function content_528f33c52dc6c4_15332082($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Droit::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../read/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Consulter">Consulter</a></li>
<?php }?>
<?php if (in_array('Droit::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
<?php }?>
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Modification d'un Droit</h1>
				<form name="frm_droit_update" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div id="main_item">
						<table>
							<tr><th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th><td><input type="text" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td></tr>
							<tr><th><label for="controleur">controleur<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th><td><input type="text" id="controleur" name="controleur" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['controleur'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[2]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td></tr>
							<tr><th><label for="action">action<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th><td><input type="text" id="action" name="action" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[3]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td></tr>
							<tr><td colspan="2"><span class="required">* Champ obligatoire</span></td></tr>
						</table>
					</div>
					<div id="main_links">
<?php if (in_array('Attribution::list',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Attributions</legend>
										<table>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['name'] = 'grp_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['linked_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total']);
?>
											<tr>
												<td>
													<input type="checkbox" id="attribution_drt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
" name="attribution_drt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['grp_list']['index']]['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id']]==true){?> checked="checked"<?php }?><?php if (!in_array('Attribution::update',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>>
													<label for="attribution_drt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['nom'];?>
</label>
												</td>
											</tr>
<?php endfor; endif; ?>
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
<?php }else{ ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['name'] = 'grp_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['linked_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total']);
?>
<?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['grp_list']['index']]['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id']]==true){?>
						<input type="hidden" id="attribution_drt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
" name="attribution_drt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
" value="on">
<?php }?>
<?php endfor; endif; ?>
<?php }?>
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