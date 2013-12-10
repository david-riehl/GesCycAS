{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Création d'une Classe</h1>
				<form name="frm_classe_create" action="" method="post">
					<div  id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="nom" name="nom" value="" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<td colspan="2"><span class="required">* Champ obligatoire</span></td>
							</tr>
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
													<input type="checkbox" id="acceptation_annee_{$linked_items[annee_list].id}_classe_last" name="acceptation_annee_{$linked_items[annee_list].id}_classe_last"{if ! in_array('Acceptation::update',$droits)} disabled="disabled"{/if}>
													<label for="acceptation_annee_{$linked_items[annee_list].id}_classe_last">&nbsp;{$linked_items[annee_list].login} (<span style="font-style:italic;">{$linked_items[annee_list].prenom} {$linked_items[annee_list].nom}</span>)</label>
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
						<input type="submit" name="btn_valider" value="Créer">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_classe_create"].elements["nom"].focus();
					document.forms["frm_classe
					_create"].elements["nom"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
