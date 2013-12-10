{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Classe::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
{if in_array('Classe::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un Classe</h1>
				<form name="frm_classe_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
						</table>
					</div>
					<div id="main_links">
{if in_array('Acceptation::default',$droits)}
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Acceptations</legend>
										<table>
{section name=annee_list loop=$linked_items}
											<tr>
												<td>
													<input type="checkbox" {if isset($links[$linked_items[annee_list].id][$item.id]) && $links[$linked_items[annee_list].id][$item.id] == true} checked="checked"{/if} disabled="disabled">
													<label>&nbsp; (<span style="font-style:italic;">{$linked_items[annee_list].nom} {$linked_items[annee_list].quotaSeances} {$linked_items[annee_list].seuilAlerte}</span>)</label>
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
					document.forms["frm_classe_read"].elements["btn_retour"].focus();
					document.forms["frm_classe_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
