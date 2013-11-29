<?php /* Smarty version Smarty-3.1.14, created on 2013-11-22 11:51:17
         compiled from "view\templates\droit_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27838528f37251312d4-96767040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5be285ae3d9ad6dfe77d18e5e290bfbcd7a535f' => 
    array (
      0 => 'view\\templates\\droit_delete.tpl',
      1 => 1385114514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27838528f37251312d4-96767040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f37253d0906_74174475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f37253d0906_74174475')) {function content_528f37253d0906_74174475($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href="../.." title="Ajouter">Accueil</a></li>
					<li><a href="../read/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Consulter">Consulter</a></li>
					<li><a href="../update/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Modifier">Modifier</a></li>
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Suppression d'un Droit</h1>
				<form name="frm_droit_delete" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div id="main_item">
						<table>
							<tr><td>Êtes-vous sûrs de vouloir supprimer le droit suivant&nbsp;?</td></tr>
							<tr><td>
								<table>
									<tr><th><label for="nom">nom : </label></th><td id="nom"><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td></tr>
									<tr><th><label for="controleur">controleur : </label></th><td id="controleur"><?php echo $_smarty_tpl->tpl_vars['item']->value['controleur'];?>
</td></tr>
									<tr><th><label for="action">action : </label></th><td id="action"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</td></tr>
								</table>
							</td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="OK">&nbsp;<input type="submit" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_droit_delete"].elements["btn_annuler"].focus();
					document.forms["frm_droit_delete"].elements["btn_annuler"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>