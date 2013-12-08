{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Cours::read',$droits)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Cours::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Modification d'un cours</h1>
				<form name="lieu_update" action="" method="post">
					<input type="hidden" name="id" value="{$item.id}">
					<div id="main_item">
						<table>
							<tr><th><label for="debut">debut{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="debut" name="debut" value="{$item.debut}" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><th><label for="fin">fin{if isset($item_fields[2].constraint) && $item_fields[2].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="fin" name="fin" value="{$item.fin}" maxlength="{$item_fields[2].size}"{if isset($item_fields[2].constraint) && $item_fields[2].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><th><label for="nbPlacesMax">Nombre de places maximum{if isset($item_fields[3].constraint) && $item_fields[3].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th><td><input type="text" id="nbPlacesMax" name="nbPlacesMax" value="{$item.nbPlacesMax}" maxlength="{$item_fields[3].size}"{if isset($item_fields[3].constraint) && $item_fields[3].constraint=="NOT NULL"} required="required"{/if}></td></tr>
							<tr><td colspan="2"><span class="required">* Champ obligatoire</span></td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Mettre-à-jour">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["lieu_update"].elements["debut"].focus();
					document.forms["lieu_update"].elements["debut"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
