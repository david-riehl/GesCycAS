{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Droit::read',$droits)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Droit::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Suppression d'un Droit</h1>
				<form name="frm_droit_delete" action="" method="post">
					<input type="hidden" name="id" value="{$item.id}">
					<div id="main_item">
						<table>
							<tr><td>Êtes-vous sûrs de vouloir supprimer le droit suivant&nbsp;?</td></tr>
							<tr><td>
								<table>
									<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
									<tr><th><label for="controleur">controleur : </label></th><td id="controleur">{$item.controleur}</td></tr>
									<tr><th><label for="action">action : </label></th><td id="action">{$item.action}</td></tr>
								</table>
							</td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="OK">&nbsp;<input type="submit" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_droit_delete"].elements["btn_annuler"].focus();
					document.forms["frm_droit_delete"].elements["btn_annuler"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
