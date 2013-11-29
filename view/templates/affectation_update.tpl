{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Modification des Affectations</h1>
				<form name="affectation_update" action="" method="post">
					<table>
						<tr><th></th>{section name=head loop=$right_items}<th>{$right_items[head].nom}</th>{/section}</tr>
{section name=rows loop=$left_items}
						<tr><th>{$left_items[rows].login}</th>{section name=columns loop=$right_items}<td style="text-align:center;"><input type="checkbox" name="affectation_utl_{$left_items[rows].id}_grp_{$right_items[columns].id}"{if isset($links[$left_items[rows].id][$right_items[columns].id]) && $links[$left_items[rows].id][$right_items[columns].id] == true} checked="checked"{/if}{if ! in_array('Affectation::update',$droits)} disabled="disabled"{/if}></td>{/section}</tr>
{/section}
						<tr><td colspan="{$right_items|@count +1}" style="text-align:right;">
{if in_array('Affectation::update',$droits)}
							<input type="submit" name="btn_valider" value="Mettre-à-jour">
{/if}
						</td></tr>
					</table>
				</form>
			</div>
{include file="document_footer.tpl"}
