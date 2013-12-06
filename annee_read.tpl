{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Annee::update',$annees)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
{if in_array('Annee::delete',$annees)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'une année</h1>
				<form name="frm_annee_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
							<tr><th><label for="quotaSeances">quotaSeances : </label></th><td id="quotaSeances">{$item.quotaSeances}</td></tr>
							<tr><th><label for="seuilAlerte">seuilAlerte : </label></th><td id="seuilAlerte">{$item.seuilAlerte}</td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_annee_read"].elements["btn_retour"].focus();
					document.forms["frm_annee_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
