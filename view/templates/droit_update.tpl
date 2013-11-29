{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Droit::read',$droits)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Droit::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Modification d'un Droit</h1>
				<form name="frm_droit_update" action="" method="post">
					<input type="hidden" name="id" value="{$item.id}">
					<div id="main_item">
						<table>
							<tr><th><label for="nom">nom{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="nom" name="nom" value="{$item.nom}" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><th><label for="controleur">controleur{if isset($item_fields[2].constraint) && $item_fields[2].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="controleur" name="controleur" value="{$item.controleur}" maxlength="{$item_fields[2].size}"{if isset($item_fields[2].constraint) && $item_fields[2].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><th><label for="action">action{if isset($item_fields[3].constraint) && $item_fields[3].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="action" name="action" value="{$item.action}" maxlength="{$item_fields[3].size}"{if isset($item_fields[3].constraint) && $item_fields[3].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><td colspan="2"><span class="required">* Champ obligatoire</span></td></tr>
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
													<input type="checkbox" id="attribution_drt_{$item.id}_grp_{$linked_items[grp_list].id}" name="attribution_drt_{$item.id}_grp_{$linked_items[grp_list].id}" {if isset($links[$item.id][$linked_items[grp_list].id]) && $links[$item.id][$linked_items[grp_list].id] == true} checked="checked"{/if}{if ! in_array('Attribution::update',$droits)} disabled="disabled"{/if}>
													<label for="attribution_drt_{$item.id}_grp_{$linked_items[grp_list].id}">&nbsp;{$linked_items[grp_list].nom}</label>
												</td>
											</tr>
{/section}
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
{else}
{section name=grp_list loop=$linked_items}
{if isset($links[$item.id][$linked_items[grp_list].id]) && $links[$item.id][$linked_items[grp_list].id] == true}
						<input type="hidden" id="attribution_drt_{$item.id}_grp_{$linked_items[grp_list].id}" name="attribution_drt_{$item.id}_grp_{$linked_items[grp_list].id}" value="on">
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
					document.forms["frm_droit_update"].elements["nom"].focus();
					document.forms["frm_droit_update"].elements["nom"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
