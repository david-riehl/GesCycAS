<?php
	class Autorisation_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Autorisation::default',$_SESSION['droits']))
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
			
			$annees = Annee::get_list();
			$courss = Cours::get_list();
			$autorisations = Autorisation::get_list();
			$links = array();
			
			foreach($autorisations as $autorisation)
			{
				$links[$autorisation['id_annee']][$autorisation['id_cours']] = true;
			}
			$annees_fields = Annee_Mapper::get_fields();
			$cours_fields = Cours_Mapper::get_fields();
			Autorisation_Viewer::form_update($annees, $courss, $links, $annees_fields, $courss_fields);
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
			Autorisation_Mapper::delete($where);
		}
		
		public static function insert($filter=array())
		{
			unset($_POST['btn_valider']);
			$fields = array('id_annee','id_cours');
			$values = array();
			if(empty($filter))
			{
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_annee = (int) $items[2];
					$id_cours = (int) $items[4];
						
					$values[] = array($id_annee,$id_cours);
				}
			}
			elseif(isset($filter['id_annee']))
			{
				$id_annee = $filter['id_annee'];
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_cours = (int) $items[4];
						
					$values[] = array($id_annee,$id_cours);
				}
			}
			elseif(isset($filter['id_cours']))
			{
				$id_cours = $filter['id_cours'];
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_annee = (int) $items[2];
						
					$values[] = array($id_annee,$id_cours);
				}
			}
			if(!empty($values))
			{
				Autorisation_Mapper::insert($fields,$values);
			}
		}
	}
?>