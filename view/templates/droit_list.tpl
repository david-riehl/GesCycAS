{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Droit::create',$droits)}
					<li><a href="./create/" title="Ajouter" title="Ajouter">Ajouter</a></li>
{/if}
				</ul>
			</div>
			<div id="main">
				<h1>Liste des Droits</h1>
{if $item|@count == 0}
				<p>Aucun Droit.</p>
{if in_array('Droit::create',$droits)}
				<form action="./create/" method="post">
				<button type="submit" name="btn_create" class="create" title="Ajouter"></button>Ajouter un Droit
				</form>
{/if}
{else}
				<table class="list">
					<tr>
						<th>nom</th><th>controleur</th><th>action</th>
{if in_array('Droit::create',$droits)}
						<th colspan="3" style="text-align:right;"><form><button type="submit" formaction="./create/" formmethod="post" name="btn_create" class="create" title="Ajouter"></button></form></th>
{/if}
					</tr>
{section name=list loop=$item}
					<tr class="{if $smarty.section.list.index %2 == 0}pair{else}impair{/if}">
						<td style="width: {$fields[1].size*10}px;">{$item[list].nom}</td>
						<td style="width: {$fields[2].size*10}px;">{$item[list].controleur}</td>
						<td style="width: {$fields[3].size*10}px;">{$item[list].action}</td>
{if in_array('Droit::read',$droits)}
						<td>
							<form action="./read/{$item[list].id}" method="post">
								<button type="submit" name="btn_read" class="read" title="Consulter"></button>
							</form>
						</td>
{/if}
{if in_array('Droit::update',$droits)}
						<td>
							<form action="./update/{$item[list].id}" method="post">
								<button type="submit" name="btn_update" class="update" title="Modifier"></button>
							</form>
						</td>
{/if}
{if in_array('Droit::delete',$droits)}
						<td>
							<form action="./delete/{$item[list].id}" method="post">
								<button type="submit" name="btn_delete" class="delete" title="Supprimer"></button>
							</form>
						</td>
{/if}
					</tr>
{/section}
				</table>
{/if}
			</div>
{include file="document_footer.tpl"}
