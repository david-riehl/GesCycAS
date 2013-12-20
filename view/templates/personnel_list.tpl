{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Utilisateur::create',$droits)}
					<li><a href="./create/" title="Ajouter">Ajouter</a></li>
{/if}
				</ul>
			</div>
			<div id="main">
				<h1>Liste des Utilisateurs</h1>
{if $item|@count == 0}
				<p>Aucun utilisateur.</p>
{if in_array('Utilisateur::create',$droits)}
				<form action="./create/" method="post">
				<button type="submit" name="btn_create" class="create" title="Ajouter"></button>Ajouter un utilisateur
				</form>
{/if}
{else}
				<table class="utilisateur_list">
					<tr>
						<th>login</th><th>nom</th><th>prenom</th><th>actif</th>
{if in_array('Utilisateur::create',$droits)}
						<th colspan="3" style="text-align:right;"><form><button type="submit" formaction="./create/" formmethod="post" name="btn_create" class="create" title="Ajouter"></button></form></th>
{/if}
					</tr>
{section name=list loop=$item}
					<tr class="{if $smarty.section.list.index %2 == 0}pair{else}impair{/if}">
						<td style="width: {$fields[4].size*10}px;">{$item[list].login}</td>
						<td style="width: {$fields[1].size*10}px;">{$item[list].nom}</td>
						<td style="width: {$fields[2].size*10}px;">{$item[list].prenom}</td>
						<td><form name="frm_{$item[list].id}" action="./{if $item[list].actif == 1}des{/if}activate/{$item[list].id}" method="post"><input type="checkbox"{if $item[list].actif == 1} checked="checked"{/if} onClick="document.forms['frm_{$item[list].id}'].submit();" {if $item[list].actif == 1 && ! in_array('Utilisateur::activate',$droits) || $item[list].actif == 0 && ! in_array('Utilisateur::desactivate',$droits)} disabled="disabled"{/if}></form></td>
{if in_array('Utilisateur::read',$droits)}
						<td>
							<form action="./read/{$item[list].id}" method="post">
								<button type="submit" name="btn_read" class="read" title="Consulter"></button>
							</form>
						</td>
{/if}
{if in_array('Utilisateur::update',$droits)}
						<td>
							<form action="./update/{$item[list].id}" method="post">
								<button type="submit" name="btn_update" class="update" title="Modifier"></button>
							</form>
						</td>
{/if}
{if in_array('Utilisateur::delete',$droits)}
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