<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 21:17:29
         compiled from "view\templates\utilisateur_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23616528f361c07a122-88606397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84937555293a8fe7e7a316a385bd7c1ded2933fd' => 
    array (
      0 => 'view\\templates\\utilisateur_list.tpl',
      1 => 1385583447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23616528f361c07a122-88606397',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f361c5f5e14_16189617',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
    'fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f361c5f5e14_16189617')) {function content_528f361c5f5e14_16189617($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Utilisateur::create',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="./create/" title="Ajouter">Ajouter</a></li>
<?php }?>
				</ul>
			</div>
			<div id="main">
				<h1>Liste des Utilisateurs</h1>
<?php if (count($_smarty_tpl->tpl_vars['item']->value)==0){?>
				<p>Aucun utilisateur.</p>
<?php if (in_array('Utilisateur::create',$_smarty_tpl->tpl_vars['droits']->value)){?>
				<form action="./create/" method="post">
				<button type="submit" name="btn_create" class="create" title="Ajouter"></button>Ajouter un utilisateur
				</form>
<?php }?>
<?php }else{ ?>
				<table class="utilisateur_list">
					<tr>
						<th>login</th><th>nom</th><th>prenom</th><th>actif</th>
<?php if (in_array('Utilisateur::create',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<th colspan="3" style="text-align:right;"><form><button type="submit" formaction="./create/" formmethod="post" name="btn_create" class="create" title="Ajouter"></button></form></th>
<?php }?>
					</tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
					<tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['list']['index']%2==0){?>pair<?php }else{ ?>impair<?php }?>">
						<td style="width: <?php echo $_smarty_tpl->tpl_vars['fields']->value[4]['size']*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['login'];?>
</td>
						<td style="width: <?php echo $_smarty_tpl->tpl_vars['fields']->value[1]['size']*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nom'];?>
</td>
						<td style="width: <?php echo $_smarty_tpl->tpl_vars['fields']->value[2]['size']*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['prenom'];?>
</td>
						<td><form name="frm_<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" action="./<?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['actif']==1){?>des<?php }?>activate/<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" method="post"><input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['actif']==1){?> checked="checked"<?php }?> onClick="document.forms['frm_<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
'].submit();" <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['actif']==1&&!in_array('Utilisateur::activate',$_smarty_tpl->tpl_vars['droits']->value)||$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['actif']==0&&!in_array('Utilisateur::desactivate',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>></form></td>
<?php if (in_array('Utilisateur::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<td>
							<form action="./read/<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" method="post">
								<button type="submit" name="btn_read" class="read" title="Consulter"></button>
							</form>
						</td>
<?php }?>
<?php if (in_array('Utilisateur::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<td>
							<form action="./update/<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" method="post">
								<button type="submit" name="btn_update" class="update" title="Modifier"></button>
							</form>
						</td>
<?php }?>
<?php if (in_array('Utilisateur::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<td>
							<form action="./delete/<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" method="post">
								<button type="submit" name="btn_delete" class="delete" title="Supprimer"></button>
							</form>
						</td>
<?php }?>
					</tr>
<?php endfor; endif; ?>
				</table>
<?php }?>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>