{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Cours::read',$droits)}
					<li><a href="../read/{$item.id}" title="Consulter">Consulter</a></li>
{/if}
{if in_array('Cours::update',$droits)}
					<li><a href="../update/{$item.id}" title="Modifier">Modifier</a></li>
{/if}
					<li><a href="..">Annuler</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Suppression d'un Cours</h1>
				<form name="Cours_delete" action="" method="post">
					<div id="main_items">
						<input type="hidden" name="id" value="{$item.id}">
						<table>
							<tr><td>Êtes-vous sûrs de vouloir supprimer le cours suivant&nbsp;?</td></tr>
							<tr>
								<td>
									<table>
										<tr>
											<th><label for="debut">debut : </label></th>
											<td id="debut">{$item.debut}</td>
										</tr>
										<tr>
											<th><label for="fin">fin : </label></th>
											<td id="fin">{$item.fin}</td>
										</tr>
										<tr>
											<th><label for="nbPlacesMax">Nombre de place maximum : </label></th>
											<td id="nbPlacesMax">{$item.nbPlacesMax}</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_valider" value="OK">&nbsp;<input type="submit" name="btn_annuler" value="Annuler">
					</div>
				</form>
			</div>
{include file="document_footer.tpl"}
	