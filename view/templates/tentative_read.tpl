{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
{if in_array('Tentative::list',$droits)}
					<li><a href="{$URI_root}/Tentative/list/{$id}/{$page}" title="Retour">Retour</a></li>
{/if}
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'une Tentative d'ouverture de Session</h1>
				<form name="frm_tentative_read" action="{$URI_root}/Tentative/list/{$id}/{$page}" method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="date">date&nbsp;: </label></th><td id="date">{$item.date}</td></tr>
							<tr><th><label for="heure">heure&nbsp;: </label></th><td id="heure">{$item.heure}</td></tr>
							<tr><th><label for="ip">IP&nbsp;: </label></th><td id="ip">{$item.ip}</td></tr>
							<tr>
								<td colspan="2">
									<fieldset>
										<legend>utilisateur</legend>
											<table>
												<tr><th><label for="login">login&nbsp;: </label></th><td id="login">{$linked_item.login}</td></tr>
												<tr><th><label for="nom">nom&nbsp;: </label></th><td id="nom">{$linked_item.nom}</td></tr>
												<tr><th><label for="prenom">prenom&nbsp;: </label></th><td id="prenom">{$linked_item.prenom}</td></tr>
												<tr><th><label for="email">email&nbsp;: </label></th><td id="email">{$linked_item.email}</td></tr>
												<tr><th><label for="actif">actif&nbsp;: </label></th><td><input id="actif" type="checkbox"{if $linked_item.actif == 1} checked="checked"{/if} disabled="disabled"></td></tr>
											</table>
									</fieldset>
								</td>
							</tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_tentative_read"].elements["btn_retour"].focus();
					document.forms["frm_tentative_read"].elements["btn_retour"].select();
				</script>
			</div>
{include file="document_footer.tpl"}
