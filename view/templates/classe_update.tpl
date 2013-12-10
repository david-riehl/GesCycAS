{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Classe::read',$droits)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Classe::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Modification d'un Classe</h1>
				<form name="frm_classe_update" action="" method="post">
					<input type="hidden" name="id" value="{$item.id}">
					<div id="main_item">
						<table>
							<tr><th><label for="nom">nom{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="nom" name="nom" value="{$item.nom}" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><td colspan="2"><span class="required">* Champ obligatoire</span></td></tr>
						</table>
					</div>
					<div id="main_links">
{if in_array('Acceptation::default',$droits)}
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Acceptation</legend>
										<table>
{section name=annee_list loop=$linked_items}
											<tr>
												<td>
													<input type="checkbox" id="acceptation_annee_{$linked_items[utl_list].id}_classe_{$item.id}" name="acceptation_annee_{$linked_items[annee_list].id}_classe_{$item.id}" {if isset($links[$linked_items[annee_list].id][$item.id]) && $links[$linked_items[annee_list].id][$item.id] == true} checked="checked"{/if}>
													<label for="acceptation_annee_{$linked_items[annee_list].id}_classe_{$item.id}">&nbsp; (<span style="font-style:italic;">{$linked_items[annee_list].nom} {$linked_items[annee_list].quotaSeances} {$linked_items[annee_list].seuilAlerte}</span>)</label>
												</td>
											</tr>
{/section}
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
{else}
{section name=annee_list loop=$linked_items}
{if isset($links[$linked_items[annee_list].id][$item.id]) && $links[$linked_items[annee_list].id][$item.id] == true}
						<input type="hidden" id="acceptation_utl_{$linked_items[annee_list].id}_classe_{$item.id}" name="acceptation_annee_{$linked_items[annee_list].id}_classe_{$item.id}"  value="on">
{/if}
{/section}
{/if}
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Mettre-à-jour">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_classe_update"].elements["nom"].focus();
					document.forms["frm_classe_update"].elements["nom"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
