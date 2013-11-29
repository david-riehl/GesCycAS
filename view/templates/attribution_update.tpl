{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Modification des Attributions</h1>
				<form name="attribution_update" action="" method="post">
					<table>
						<tr><th rowspan="3"></th>{section name=head loop=$left_items}<th title="nom">{$left_items[head].nom}</th>{/section}</tr>
						<tr>{section name=head loop=$left_items}<th title="controleur">{$left_items[head].controleur}</th>{/section}</tr>
						<tr>{section name=head loop=$left_items}<th title="action">{$left_items[head].action}</th>{/section}</tr>
{section name=rows loop=$right_items}
						<tr><th>{$right_items[rows].nom}</th>{section name=columns loop=$left_items}<td style="text-align:center;"><input type="checkbox" name="attribution_drt_{$left_items[columns].id}_grp_{$right_items[rows].id}"{if isset($links[$left_items[columns].id][$right_items[rows].id]) && $links[$left_items[columns].id][$right_items[rows].id] == true} checked="checked"{/if}{if ! in_array('Attribution::update',$droits)} disabled="disabled"{/if}></td>{/section}</tr>
{/section}
						<tr><td colspan="{$left_items|@count +1}" style="text-align:right;">
{if in_array('Attribution::update',$droits)}
							<input type="submit" name="btn_valider" value="Mettre-à-jour">
{/if}
						</td></tr>
					</table>
				</form>
			</div>
{include file="document_footer.tpl"}
