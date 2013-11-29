<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 21:18:45
         compiled from "view\templates\droit_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13580528f317a5f5e12-49510566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ccb68377044a8fa47527dedc8c8f7dc6a5a143a' => 
    array (
      0 => 'view\\templates\\droit_list.tpl',
      1 => 1385583521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13580528f317a5f5e12-49510566',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528f317ab34a77_03648176',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
    'fields' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528f317ab34a77_03648176')) {function content_528f317ab34a77_03648176($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Droit::create',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="./create/" title="Ajouter" title="Ajouter">Ajouter</a></li>
<?php }?>
				</ul>
			</div>
			<div id="main">
				<h1>Liste des Droits</h1>
<?php if (count($_smarty_tpl->tpl_vars['item']->value)==0){?>
				<p>Aucun Droit.</p>
<?php if (in_array('Droit::create',$_smarty_tpl->tpl_vars['droits']->value)){?>
				<form action="./create/" method="post">
				<button type="submit" name="btn_create" class="create" title="Ajouter"></button>Ajouter un Droit
				</form>
<?php }?>
<?php }else{ ?>
				<table class="list">
					<tr>
						<th>nom</th><th>controleur</th><th>action</th>
<?php if (in_array('Droit::create',$_smarty_tpl->tpl_vars['droits']->value)){?>
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
						<td style="width: <?php echo $_smarty_tpl->tpl_vars['fields']->value[1]['size']*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['nom'];?>
</td>
						<td style="width: <?php echo $_smarty_tpl->tpl_vars['fields']->value[2]['size']*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['controleur'];?>
</td>
						<td style="width: <?php echo $_smarty_tpl->tpl_vars['fields']->value[3]['size']*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['action'];?>
</td>
<?php if (in_array('Droit::read',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<td>
							<form action="./read/<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" method="post">
								<button type="submit" name="btn_read" class="read" title="Consulter"></button>
							</form>
						</td>
<?php }?>
<?php if (in_array('Droit::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<td>
							<form action="./update/<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" method="post">
								<button type="submit" name="btn_update" class="update" title="Modifier"></button>
							</form>
						</td>
<?php }?>
<?php if (in_array('Droit::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
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