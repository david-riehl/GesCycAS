{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Annee::read',$annees)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Annee::update',$annees)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
					<li><a href=".." title="Annuler">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Suppression d'une ann&nbsp;e</h1>
				<form name="frm_annee_delete" action="" method="post">
					<input type="hidden" name="id" value="{$item.id}">
					<div id="main_item">
						<table>
							<tr><td>Êtes-vous sûrs de vouloir supprimer l'ann&nbsp;e s&nbsp;lectionn&nbsp;e?</td></tr>
							<tr><td>
								<table>
									<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
									<tr><th><label for="quotaSeances">quotaSeances : </label></th><td id="quotaSeances">{$item.quotaSeances}</td></tr>
									<tr><th><label for="seuilAlerte">seuilAlerte : </label></th><td id="seuilAlerte">{$item.seuilAlerte}</td></tr>
								</table>
							</td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="OK">&nbsp;<input type="submit" name="btn_annuler" value="Annuler">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_annee_delete"].elements["btn_annuler"].focus();
					document.forms["frm_annee_delete"].elements["btn_annuler"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
