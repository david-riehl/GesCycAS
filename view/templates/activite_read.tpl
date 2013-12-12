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
				<h1>Consultation d'une activité</h1>
				<form name="frm_droit_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="nom">nom : </label></th><td id="nom">{$item.nom}</td></tr>
							<tr><th><label for="Nombre">nombre de places : </label></th><td id="place"><!--{$item.place}!--> 20/20</td></tr>
						</table>
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
