{include file="document_header.tpl"}
			<div id="menu_left">
				<ul id="buttons">
				</ul>
			</div>
			<div id="main">
				<h1>Ouverture d'une Session</h1>
{if $erreur}
				<p class="erreur">Erreur&nbsp;: {$message}</p>
{/if}
				<form name="session_open" action="" method="post">
					<div id="main_items">
						<table>
							<tr>
								<td><input type="text" id="login" name="login" value="" maxlength="{$linked_item_fields[4].size}" required="required" placeholder="identifiant"></td>
							</tr>
							<tr>
								<td><input type="password" id="password" name="password" value="" maxlength="{$linked_fields[5].size}" required="required" placeholder="mot de passe"></td>
								<td><input type="submit" name="btn_connecter" value="Connecter"></td>
							</tr>
						</table>
					</div>
				</form>
			</div>
{include file="document_footer.tpl"}