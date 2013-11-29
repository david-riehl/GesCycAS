<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 20:20:53
         compiled from "view\templates\utilisateur_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3215552934c07ca2dd1-82788079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f31160ee081faff7d2927d11c4534814500ffff8' => 
    array (
      0 => 'view\\templates\\utilisateur_update.tpl',
      1 => 1385579889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3215552934c07ca2dd1-82788079',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52934c084f8f67_17871303',
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
<?php if ($_valid && !is_callable('content_52934c084f8f67_17871303')) {function content_52934c084f8f67_17871303($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Utilisateur::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../read/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Consulter">Consulter</a></li>
<?php }?>
<?php if (in_array('Utilisateur::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
<?php }?>
					<li><a href="..">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<script type="text/javascript">
					function valid()
					{
						var pwd1 = document.forms["utilisateur_update"].elements["password"].value;
						var pwd2 = document.forms["utilisateur_update"].elements["password2"].value;
						if (pwd1 != pwd2)
						{
							alert("les mots de passent sont différents.")
							document.forms["utilisateur_update"].elements["password"].focus();
							document.forms["utilisateur_update"].elements["password"].select();
						}
						return (pwd1 == pwd2);
					}
				</script>
				<h1>Modification d'un Utilisateur</h1>
				<form name="utilisateur_update" action="" method="post" onSubmit="return valid();">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[1]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[1]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="prenom">prenom<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="prenom" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['prenom'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[2]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[2]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="email">email<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="email" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[3]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[3]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="login">login<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="text" id="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[4]['size'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint']=="NOT NULL"){?> required="required"<?php }?>></td>
							</tr>
							<tr>
								<th><label for="password1">password : </label></th>
								<td><input type="password" id="password1" name="password" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[5]['size'];?>
"></td>
							</tr>
							<tr>
								<th><label for="password2"></label></th>
								<td><input type="password" id="password2" value="" maxlength="<?php echo $_smarty_tpl->tpl_vars['item_fields']->value[5]['size'];?>
"></td>
							</tr>
							<tr>
								<th><label for="actif">actif<?php if (isset($_smarty_tpl->tpl_vars['item_fields']->value[6]['constraint'])&&$_smarty_tpl->tpl_vars['item_fields']->value[4]['constraint']=="NOT NULL"){?><span class="required">*</span><?php }?> : </label></th>
								<td><input type="checkbox" id="actif" name="actif"<?php if ($_smarty_tpl->tpl_vars['item']->value['actif']==1){?> checked="checked"<?php }?>></td>
							</tr>
							<tr>
								<td colspan="3">
									<span class="required">* Champ obligatoire</span>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<span class="required">ne saisir le mot de passe que si vous voulez le changer.</span>
								</td>
							</tr>
						</table>
					</div>
					<div id="main_links">
<?php if (in_array('Affectation::list',$_smarty_tpl->tpl_vars['droits']->value)){?>
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
													<input type="checkbox" id="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
" name="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['grp_list']['index']]['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id']]==true){?> checked="checked"<?php }?><?php if (!in_array('Affectation::update',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>>
													<label for="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
<?php }?>
					</div>
					<div  id="main_buttons">
						<input type="submit" name="btn_valider" value="Mettre-à-jour">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["utilisateur_update"].elements["nom"].focus();
					document.forms["utilisateur_update"].elements["nom"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>