{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Bienvenue {$linked_item.prenom} {$linked_item.nom}</h1>
				<p>Vous êtes actuellement connectés avec le compte suivant&nbsp;:</p>
				<form name="session_open" action="" method="post">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="login">identifiant&nbsp;:</label></th>
								<td id="login">{$linked_item.login}</td>
								<td><input type="submit" name="btn_deconnecter" value="Déconnecter"></td>
							</tr>
						</table>
					</div>
				</form>
			</div>
{include file="document_footer.tpl"}