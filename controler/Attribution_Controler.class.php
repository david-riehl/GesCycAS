<?php
	class Attribution_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Attribution::default',$_SESSION['droits']))
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
			
			$droits = Droit::get_list();
			$groupes = Groupe::get_list();
			$attributions = Attribution::get_list();
			$links = array();
			
			foreach($attributions as $attribution)
			{
				$links[$attribution['id_droit']][$attribution['id_groupe']] = true;
			}
			$droits_fields = Droit_Mapper::get_fields();
			$groupes_fields = Groupe_Mapper::get_fields();
			Attribution_Viewer::form_update($droits, $groupes, $links, $droits_fields, $groupes_fields);
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
			Attribution_Mapper::delete($where);
		}
		
		public static function insert($filter=array())
		{
			unset($_POST['btn_valider']);
			$fields = array('id_droit','id_groupe');
			$values = array();
			if(empty($filter))
			{
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_droit = (int) $items[2];
					$id_groupe = (int) $items[4];
						
					$values[] = array($id_droit,$id_groupe);
				}
			}
			elseif(isset($filter['id_droit']))
			{
				$id_droit = $filter['id_droit'];
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_groupe = (int) $items[4];
						
					$values[] = array($id_droit,$id_groupe);
				}
			}
			elseif(isset($filter['id_groupe']))
			{
				$id_groupe = $filter['id_groupe'];
				foreach($_POST as $key => $value)
				{
					$items = explode('_',$key);
					$id_droit = (int) $items[2];
						
					$values[] = array($id_droit,$id_groupe);
				}
			}
			if(!empty($values))
			{
				Attribution_Mapper::insert($fields,$values);
			}
		}
	}
?>