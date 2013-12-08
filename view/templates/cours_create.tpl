{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Ajout d'un cours</h1>
				<form name="cours_create" action="" method="post">
					<div  id="main_items">
						<table>
							<tr>
								<th><label for="debut">debut{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="debut" name="debut" value="" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<th><label for="fin">fin{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="fin" name="fin" value="" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<th><label for="nbPlacesMax">Nombre de places maximum{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"}<span class="required">*</span>{/if} : </label></th>
								<td><input type="text" id="nbPlacesMax" name="nbPlacesMax" value="" maxlength="{$item_fields[1].size}"{if isset($item_fields[1].constraint) && $item_fields[1].constraint=="NOT NULL"} required="required"{/if}></td>
							</tr>
							<tr>
								<td colspan="2"><span class="required">* Champ obligatoire</span></td>
							</tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="Créer">
						<input type="submit" formaction=".." formnovalidate="formnovalidate" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["cours_create"].elements["debut"].focus();
					document.forms["cours_create"].elements["debut"].select();
				</script>
			</div>
{include file="document_footer.tpl"}