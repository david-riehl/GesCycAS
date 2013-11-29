<?php
	class Affectation_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Affectation::default',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				default:
					Viewer::error("Unknown action name `".$action."`.");
			}
		}

		private static function form_update()
		{
			if(isset($_POST['btn_valider']))
			{
				self::delete();
				self::insert();
				// header('Location: ..');
			}
			elseif(isset($_POST['btn_retour']))
			{
				header('Location: ..');
			}
			
			$utilisateurs = Utilisateur::get_list();
			$groupes = Groupe::get_list();
			$affectations = Affectation::get_list();
			$links = array();
			
			foreach($affectations as $affectation)
			{
				$links[$affectation['id_utilisateur']][$affectation['id_groupe']] = true;
			}
			$utilisateurs_fields = Utilisateur_Mapper::get_fields();
			$groupes_fields = Groupe_Mapper::get_fields();
			Affectation_Viewer::form_update($utilisateurs, $groupes, $links, $utilisateurs_fields, $groupes_fields);
		}
		
		public static function delete($filter=array())
		{
			if(empty($filter))
			{
				$where=array();
			}
			else
			{
				$item = each($filter);
				$where = array(
					array('field' => $item['key'], 'operator' => '=', 'values' => array($item['value']))
				);
			}
			Affectation_Mapper::delete($where);
		}
		
		public static function insert($filter=array())
		{
			unset($_POST['btn_valider']);
			$fields = array('id_utilisateur','id_groupe');
			$values = array();
			if(empty($filter))
			{
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_utilisateur = (int) $items[2];
					$id_groupe = (int) $items[4];
						
					$values[] = array($id_utilisateur,$id_groupe);
				}
			}
			elseif(isset($filter['id_utilisateur']))
			{
				$id_utilisateur = $filter['id_utilisateur'];
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_groupe = (int) $items[4];
						
					$values[] = array($id_utilisateur,$id_groupe);
				}
			}
			elseif(isset($filter['id_groupe']))
			{
				$id_groupe = $filter['id_groupe'];
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_utilisateur = (int) $items[2];
						
					$values[] = array($id_utilisateur,$id_groupe);
				}
			}
			if(!empty($values))
			{
				Affectation_Mapper::insert($fields,$values);
			}
		}
	}
?>