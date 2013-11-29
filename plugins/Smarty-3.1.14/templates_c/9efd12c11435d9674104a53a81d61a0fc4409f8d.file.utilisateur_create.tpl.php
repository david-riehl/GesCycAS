<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 21:55:12
         compiled from "view\templates\utilisateur_create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1356452934833a2cd05-39880643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9efd12c11435d9674104a53a81d61a0fc4409f8d' => 
    array (
      0 => 'view\\templates\\utilisateur_create.tpl',
      1 => 1385585676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1356452934833a2cd05-39880643',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_529348341312d6_25669635',
  'variables' => 
  array (
    'item_fields' => 0,
    'droits' => 0,
    'linked_items' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529348341312d6_25669635')) {function content_529348341312d6_25669635($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<script type="text/javascript">
					function valid()
					{
						var pwd1 = document.forms["utilisateur_create"].elements["password"].value;
						var pwd2 = document.forms["utilisateur_create"].elements["password2"].value;
						if (pwd1 != pwd2)
						{
							alert("les mots de passent sont différents.")
							document.forms["utilisateur_create"].elements["password"].focus();
							document.forms["utilisateur_create"].elements["password"].select();
						}
						return pwd1 == pwd2;
					}
				</script>
				<h1>Création d'un Utilisateur</h1>
				<form name="utilisateur_create" action="" method="post" onSubmit="return valid();">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="nom" name="nom" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="prenom">prenom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="prenom" name="prenom" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[2]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="email">email<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="email" id="email" name="email" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[3]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="login">login<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="login" name="login" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[4]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="password1">password<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[5]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[5]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="password" id="password1" name="password" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[5]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[5]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[5]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="password2"></label></th>
								<td><input type="password" id="password2" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[5]['size'];?>
"></td>
							</tr>
							<tr>
								<th><label for="actif">actif<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[6]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="checkbox" id="actif" name="actif"<?php if (!in_array('Utilisateur::activate',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>></td>
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
													<input type="checkbox" id="affectation_utl_last_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
" name="affectation_utl_last_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
"<?php if (!in_array('Affectation::update',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>>
													<label for="affectation_utl_last_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
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
<?php }?>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Créer">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["utilisateur_create"].elements["nom"].focus();
					document.forms["utilisateur_create"].elements["nom"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>