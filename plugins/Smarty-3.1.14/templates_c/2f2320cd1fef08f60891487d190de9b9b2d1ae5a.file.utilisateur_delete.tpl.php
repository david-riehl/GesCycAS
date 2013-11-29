<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 20:30:36
         compiled from "view\templates\utilisateur_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229435296485ca28758-91419379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f2320cd1fef08f60891487d190de9b9b2d1ae5a' => 
    array (
      0 => 'view\\templates\\utilisateur_delete.tpl',
      1 => 1385577024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229435296485ca28758-91419379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5296485d1eb2f6_97635264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5296485d1eb2f6_97635264')) {function content_5296485d1eb2f6_97635264($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Utilisateur::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../read/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Consulter">Consulter</a></li>
<?php }?>
<?php if (in_array('Utilisateur::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../update/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Modifier">Modifier</a></li>
<?php }?>
					<li><a href="..">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Suppression d'un Utilisateur</h1>
				<form name="utilisateur_delete" action="" method="post">
					<div id="main_items">
						<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<table>
							<tr><td>Êtes-vous sûrs de vouloir supprimer l'utilisateur suivant&nbsp;?</td></tr>
							<tr>
								<td>
									<table>
										<tr>
											<th><label for="nom">nom : </label></th>
											<td id="nom"><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td>
										</tr>
										<tr>
											<th><label for="prenom">prenom : </label></th>
											<td id="prenom"><?php echo $_smarty_tpl->tpl_vars['item']->value['prenom'];?>
</td>
										</tr>
										<tr>
											<th><label for="email">email : </label></th>
											<td id="email"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
										</tr>
										<tr>
											<th><label for="login">login : </label></th>
											<td id="login"><?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="OK">&nbsp;<input type="submit" name="btn_annuler" value="Annuler">
					</div>
				</form>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>