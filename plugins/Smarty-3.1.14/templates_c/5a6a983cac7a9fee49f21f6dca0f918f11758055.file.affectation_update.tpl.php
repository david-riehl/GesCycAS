<?php /* Smarty version Smarty-3.1.14, created on 2013-12-06 11:15:02
         compiled from "view\templates\affectation_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1388152a1a3a64c6b89-77179559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a6a983cac7a9fee49f21f6dca0f918f11758055' => 
    array (
      0 => 'view\\templates\\affectation_update.tpl',
      1 => 1386060852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1388152a1a3a64c6b89-77179559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'right_items' => 0,
    'left_items' => 0,
    'links' => 0,
    'droits' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52a1a3a65bead1_91832229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1a3a65bead1_91832229')) {function content_52a1a3a65bead1_91832229($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Modification des Affectations</h1>
				<form name="affectation_update" action="" method="post">
					<table>
						<tr><th></th><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['head'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['head']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['name'] = 'head';
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['right_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['head']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['head']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['head']['total']);
?><th><?php echo $_smarty_tpl->tpl_vars['right_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['head']['index']]['nom'];?>
</th><?php endfor; endif; ?></tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['rows'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['name'] = 'rows';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['left_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rows']['total']);
?>
						<tr><th><?php echo $_smarty_tpl->tpl_vars['left_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rows']['index']]['login'];?>
</th><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['columns'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['name'] = 'columns';
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['right_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['columns']['total']);
?><td style="text-align:center;"><input type="checkbox" name="affectation_utl_<?php echo $_smarty_tpl->tpl_vars['left_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rows']['index']]['id'];?>
_grp_<?php echo $_smarty_tpl->tpl_vars['right_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['columns']['index']]['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['left_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['rows']['index']]['id']][$_smarty_tpl->tpl_vars['right_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['columns']['index']]['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['left_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rows']['index']]['id']][$_smarty_tpl->tpl_vars['right_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['columns']['index']]['id']]==true){?> checked="checked"<?php }?><?php if (!in_array('Affectation::update',$_smarty_tpl->tpl_vars['droits']->value)){?> disabled="disabled"<?php }?>></td><?php endfor; endif; ?></tr>
<?php endfor; endif; ?>
						<tr><td colspan="<?php echo count($_smarty_tpl->tpl_vars['right_items']->value)+1;?>
" style="text-align:right;">
<?php if (in_array('Affectation::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
							<input type="submit" name="btn_valider" value="Mettre-à-jour">
<?php }?>
						</td></tr>
					</table>
				</form>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>