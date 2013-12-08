			<div id="menu_top">
				<ul id="buttons">
					<li><a href="{$URI_root}" title="Accueil">Accueil</a></li>
{if isset($connected) && !$connected}
					<li><a href="{$URI_root}/Session/open" title="Connexion">Connexion</a></li>
{/if}
{if isset($connected) && $connected}
					<li><a href="{$URI_root}/Session/open" title="Déconnexion">Déconnexion</a></li>
{/if}
{if in_array('Utilisateur::default',$droits)}
					<li><a href="{$URI_root}/Utilisateur/" title="Utilisateur">Utilisateurs</a></li>
{/if}
{if in_array('Groupe::default',$droits)}
					<li><a href="{$URI_root}/Groupe/" title="Groupes">Groupes</a></li>
{/if}
{if in_array('Affectation::default',$droits)}
					<li><a href="{$URI_root}/Affectation/" title="Affectations">Affectations</a></li>
{/if}
{if in_array('Droit::default',$droits)}
					<li><a href="{$URI_root}/Droit/" title="Droits">Droits</a></li>
{/if}
{if in_array('Attribution::default',$droits)}
					<li><a href="{$URI_root}/Attribution/" title="Attributions">Attributions</a></li>
{/if}
{if in_array('Session::default',$droits)}
					<li><a href="{$URI_root}/Session/" title="Sessions">Sessions</a></li>
{/if}
{if in_array('Tentative::default',$droits)}
					<li><a href="{$URI_root}/Tentative/" title="Tentatives">Tentatives</a></li>
{/if}
{if in_array('Activite::default',$droits)}
					<li><a href="{$URI_root}/Activite/" title="Activite">Activite</a></li>
{/if}
				</ul>
			</div>