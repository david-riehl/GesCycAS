{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Droit::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
{if in_array('Droit::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un droit</h1>
				<form name="frm_droit_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
							<tr><th><label for="controleur">controleur : </label></th><td id="controleur">{$item.controleur}</td></tr>
							<tr><th><label for="action">action : </label></th><td id="action">{$item.action}</td></tr>
						</table>
					</div>
					<div id="main_links">
{if in_array('Attribution::default',$droits)}
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Attributions</legend>
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
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_droit_read"].elements["btn_retour"].focus();
					document.forms["frm_droit_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
