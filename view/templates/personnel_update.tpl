{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Utilisateur::read',$droits)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Utilisateur::read',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href="..">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<script type="text/javascript">
					function valid()
					{
						var pwd1 = document.forms["utilisateur_update"].elements["password"].value;
						var pwd2 = document.forms["utilisateur_update"].elements["password2"].value;
						if (pwd1 != pwd2)
						{
							alert("les mots de passent sont différents.")
							document.forms["utilisateur_update"].elements["password"].focus();
							document.forms["utilisateur_update"].elements["password"].select();
						}
						return (pwd1 == pwd2);
					}
				</script>
				<h1>Modification d'un Utilisateur</h1>
				<form name="utilisateur_update" action="" method="post" onSubmit="return valid();">
					<input type="hidden" name="id" value="{$item.id}">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="nom" name="nom" value="{$item.nom}" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<th><label for="prenom">prenom{if isset($item_fields[2].constraint) && $item_fields[2].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="prenom" name="prenom" value="{$item.prenom}" maxlength="{$item_fields[2].size}"{if isset($item_fields[2].constraint) && $item_fields[2].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<th><label for="email">email{if isset($item_fields[3].constraint) && $item_fields[3].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="email" id="email" name="email" value="{$item.email}" maxlength="{$item_fields[3].size}"{if isset($item_fields[3].constraint) && $item_fields[3].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<th><label for="login">login{if isset($item_fields[4].constraint) && $item_fields[4].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="login" name="login" value="{$item.login}" maxlength="{$item_fields[4].size}"{if isset($item_fields[4].constraint) && $item_fields[4].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<th><label for="password1">password : </label></th>
								<td><input type="password" id="password1" name="password" value="" maxlength="{$item_fields[5].size}"></td>
							</tr>
							<tr>
								<th><label for="password2"></label></th>
								<td><input type="password" id="password2" value="" maxlength="{$item_fields[5].size}"></td>
							</tr>
							<tr>
								<th><label for="actif">actif{if isset($item_fields[6].constraint) && $item_fields[4].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="checkbox" id="actif" name="actif"{if $item.actif == 1} checked="checked"{/if}></td>
							</tr>
							<tr>
								<td colspan="3">
									<span class="required">* Champ obligatoire</span>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<span class="required">ne saisir le mot de passe que si vous voulez le changer.</span>
								</td>
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
													<input type="checkbox" id="affectation_utl_{$item.id}_grp_{$linked_items[grp_list].id}" name="affectation_utl_{$item.id}_grp_{$linked_items[grp_list].id}"{if isset($links[$item.id][$linked_items[grp_list].id]) && $links[$item.id][$linked_items[grp_list].id] == true} checked="checked"{/if}{if ! in_array('Affectation::update',$droits)} disabled="disabled"{/if}>
													<label for="affectation_utl_{$item.id}_grp_{$linked_items[grp_list].id}">&nbsp;{$linked_items[grp_list].nom}</label>
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
													<input type="hidden" id="affectation_utl_{$item.id}_grp_{$linked_items[grp_list].id}" name="affectation_utl_{$item.id}_grp_{$linked_items[grp_list].id}"value="on">
{/if}
{/section}
{/if}
					</div>
					<div  id="main_buttons">
						<input type="submit" name="btn_valider" value="Mettre-à-jour">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["utilisateur_update"].elements["nom"].focus();
					document.forms["utilisateur_update"].elements["nom"].select();
				</script>
			</div>
{include file="document_footer.tpl"}