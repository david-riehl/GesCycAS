<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 14:44:40
         compiled from "view\templates\droit_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20535528f31e7baeb98-18787847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3aa2987458cb46ba11bac5fbf15dce79c0389f01' => 
    array (
      0 => 'view\\templates\\droit_read.tpl',
      1 => 1385544756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20535528f31e7baeb98-18787847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f31e80f4245_34567155',
  'variables' => 
  array (
    'URI_root' => 0,
    'item' => 0,
    'linked_items' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f31e80f4245_34567155')) {function content_528f31e80f4245_34567155($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
" title="Accueil">Accueil</a></li>
					<li><a href="../update/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Modifier">Modifier</a></li>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un droit</h1>
				<form name="frm_droit_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom"><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td></tr>
							<tr><th><label for="controleur">controleur : </label></th><td id="controleur"><?php echo $_smarty_tpl->tpl_vars['item']->value['controleur'];?>
</td></tr>
							<tr><th><label for="action">action : </label></th><td id="action"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</td></tr>
						</table>
					</div>
					<div id="main_links">
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
													<input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['grp_list']['index']]['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id']]==true){?> checked="checked"<?php }?> disabled="disabled">
													<label>&nbsp;<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['nom'];?>
</label>
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
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_droit_read"].elements["btn_retour"].focus();
					document.forms["frm_droit_read"].elements["btn_retour"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>