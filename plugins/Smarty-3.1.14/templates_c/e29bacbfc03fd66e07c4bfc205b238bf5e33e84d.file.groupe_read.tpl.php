<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 22:02:25
         compiled from "view\templates\groupe_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18742528f317d7de298-56889405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e29bacbfc03fd66e07c4bfc205b238bf5e33e84d' => 
    array (
      0 => 'view\\templates\\groupe_read.tpl',
      1 => 1385584726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18742528f317d7de298-56889405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f317dc65d48_29883682',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
    'linked_items' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f317dc65d48_29883682')) {function content_528f317dc65d48_29883682($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Groupe::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../update/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Modifier">Modifier</a></li>
<?php }?>
<?php if (in_array('Groupe::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
<?php }?>
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un Groupe</h1>
				<form name="frm_groupe_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom"><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td></tr>
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
													<input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['utl_list']['index']]['id']][$_smarty_tpl->tpl_vars['item']->value['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['id']][$_smarty_tpl->tpl_vars['item']->value['id']]==true){?> checked="checked"<?php }?> disabled="disabled">
													<label>&nbsp;<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['utl_list']['index']]['login'];?>
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
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_groupe_read"].elements["btn_retour"].focus();
					document.forms["frm_groupe_read"].elements["btn_retour"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>