{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Utilisateur::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
{if in_array('Utilisateur::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href="..">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un Utilisateur</h1>
				<form name="frm_utilisateur_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom : </label></th>
								<td id="nom" style="width:169px;">{$item.nom}</td>
							</tr>
							<tr>
								<th><label for="prenom">prenom : </label></th>
								<td id="prenom">{$item.prenom}</td>
							</tr>
							<tr>
								<th><label for="email">email : </label></th>
								<td id="email">{$item.email}</td>
							</tr>
							<tr>
								<th><label for="login">login : </label></th>
								<td id="login">{$item.login}</td>
							</tr>
							<tr>
								<th><label for="actif">actif : </label></th>
								<td><input type="checkbox"{if $item.actif == 1} checked="checked"{/if} disabled="disabled"></td>
							</tr>
						</table>
					</div>
					<div id="main_links">
{if in_array('Affectation::default',$droits)}
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Affectations</legend>
										<table>
{section name=grp_list loop=$linked_items}
											<tr>
												<td>
													<input type="checkbox" {if isset($links[$item.id][$linked_items[grp_list].id]) && $links[$item.id][$linked_items[grp_list].id] == true} checked="checked"{/if} disabled="disabled">
													<label>&nbsp;{$linked_items[grp_list].nom}</label>
												</td>
											</tr>
{/section}
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
{/if}
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour"></td>
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_utilisateur_read"].elements["btn_retour"].focus();
					document.forms["frm_utilisateur_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}