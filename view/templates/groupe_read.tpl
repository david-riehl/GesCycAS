{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Groupe::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
{if in_array('Groupe::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un Groupe</h1>
				<form name="frm_groupe_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
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
{section name=utl_list loop=$linked_items}
											<tr>
												<td>
													<input type="checkbox" {if isset($links[$linked_items[utl_list].id][$item.id]) && $links[$linked_items[utl_list].id][$item.id] == true} checked="checked"{/if} disabled="disabled">
													<label>&nbsp;{$linked_items[utl_list].login} (<span style="font-style:italic;">{$linked_items[utl_list].prenom} {$linked_items[utl_list].nom}</span>)</label>
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
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_groupe_read"].elements["btn_retour"].focus();
					document.forms["frm_groupe_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
