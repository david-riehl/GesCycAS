<?php
	class Welcome_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case '':
					/*empty action that wait to be defined.*/
					break;
				case Router::get_default_action():
					self::display_default();
					break;
				default:
					Welcome_Viewer::display_error("Unknown action name `".$action."`.");
			}
		}
		
		
		private static function display_default()
		{
			global $PARAM;
			$title="Accueil";
			$subtitle = "Bienvenue";
			$message = "Bienvenue sur l'application de gestion des utilisateurs.";
			Welcome_Viewer::display_default($title,$subtitle,$message);
		}
	}
?>