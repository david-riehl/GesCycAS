<?php /* Smarty version Smarty-3.1.14, created on 2013-12-12 09:00:22
         compiled from "view\templates\activite_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1974952a96bd0797c60-29822424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f93d984cbcdb833e8552ce6fd268b67e7d72739d' => 
    array (
      0 => 'view\\templates\\activite_read.tpl',
      1 => 1386835220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1974952a96bd0797c60-29822424',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52a96bd080a373_79236125',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a96bd080a373_79236125')) {function content_52a96bd080a373_79236125($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Droit::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../update/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Modifier">Modifier</a></li>
<?php }?>
<?php if (in_array('Droit::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
<?php }?>
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'une activité</h1>
				<form name="frm_droit_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom"><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td></tr>
							<tr><th><label for="Nombre">nombre de places : </label></th><td id="place"><!--<?php echo $_smarty_tpl->tpl_vars['item']->value['place'];?>
!--> 20/20</td></tr>
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