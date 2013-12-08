{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Cours::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
{if in_array('Cours::delete',$droits)}
					<li><a href="../delete/{$item.id}" title="Supprimer">Supprimer</a></li>
{/if}
					<li><a href=".." title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un cours</h1>
				<form name="cours_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="debut">debut : </label></th><td id="debut">{$item.debut}</td></tr>
							<tr><th><label for="debut">fin : </label></th><td id="fin">{$item.fin}</td></tr>
							<tr><th><label for="debut">Nombre de places maximum : </label></th><td id="nbPlacesMax">{$item.nbPlacesMax}</td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["cours_read"].elements["btn_retour"].focus();
					document.forms["cours_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
