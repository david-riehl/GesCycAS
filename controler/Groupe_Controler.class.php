<?php
	class Groupe_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Groupe::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Groupe::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Groupe::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Groupe::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Groupe::delete',$_SESSION['droits']))
					{
						self::form_delete();
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
		
		private static function form_list()
		{
			$rows = Groupe::get_list();
			$fields = Groupe_Mapper::get_fields();
			Groupe_Viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			if(isset($_POST['btn_valider']))
			{
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				$fields = array('nom');
				$values[0] = array($nom);
				Groupe_Mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'nom', 'operator' => '=', 'values' => array($nom)),
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$groupes = Groupe_Mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$groupe = $groupes[0];
				Affectation_Controler::insert(array('id_groupe'=>$groupe['id']));
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$linked_items = Utilisateur::get_list();
				$item_fields = Groupe_Mapper::get_fields();
				$linked_fields = Utilisateur_Mapper::get_fields();
				Groupe_Viewer::form_create($linked_items, $item_fields, $linked_fields);
			}
		}

		private static function form_read()
		{
			$parameters = Router::get_parameters();
			if(count($parameters) == 1 && !empty($parameters[0]))
			{
				$id = $parameters[0];
				$select = array();
				$where = array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				$groupes = Groupe_Mapper::select($select,$where);
				if(! empty($groupes))
				{
					$item = $groupes[0];
					$linked_items = Utilisateur::get_list();
					
					$select = array();
					$where = array(array('field' => 'id_groupe', 'operator' => '=', 'values' => array($id)));
					$affectations = Affectation_Mapper::select($select,$where);
					$links = array();
					foreach($affectations as $affectation)
					{
						$links[$affectation['id_utilisateur']][$affectation['id_groupe']] = true;
					}
					
					$item_fields = Groupe_Mapper::get_fields();
					$linked_fields = Utilisateur_Mapper::get_fields();
					
					Groupe_Viewer::form_read($item, $linked_items, $links, $item_fields, $linked_fields);
				}
				else
				{
					Viewer::error("Unknown id.");
				}
			}
			else
			{
				Viewer::error("Argument missing.");
			}
		}
		
		private static function form_update()
		{
			if(isset($_POST['btn_valider']))
			{
				$id = $_POST['id'];
				unset($_POST['id']);
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				
				$set[] = array('field'=>'nom', 'value'=> $nom);
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Groupe_Mapper::update($set,$where);
				
				Affectation_Controler::delete(array('id_groupe'=>$id));
				Affectation_Controler::insert();
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$parameters = Router::get_parameters();
				if(count($parameters) == 1 && !empty($parameters[0]))
				{
					$id = $parameters[0];
					$select = array();
					$where = array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
					$groupes = Groupe_Mapper::select($select,$where);
					if(! empty($groupes))
					{
						$item=$groupes[0];
						
						$select = array();
						$where = array(array('field' => 'id_groupe', 'operator' => '=', 'values' => array($id)));
						$affectations = Affectation_Mapper::select($select,$where);
						$links = array();
						
						foreach($affectations as $affectation)
						{
							$links[$affectation['id_utilisateur']][$affectation['id_groupe']] = true;
						}
						
						$linked_items = Utilisateur::get_list();
						$item_fields = Groupe_Mapper::get_fields();
						$linked_fields = Utilisateur_Mapper::get_fields();
						Groupe_Viewer::form_update($item, $linked_items, $links, $item_fields, $linked_fields);
					}
					else
					{
						Viewer::error("Unknown id.");
					}
				}
				else
				{
					Viewer::error("Argument missing.");
				}
			}
		}
		
		private static function form_delete()
		{
			if(isset($_POST['btn_valider']))
			{
				$id = $_POST['id'];
				
				Affectation_Controler::delete(array('id_groupe'=>$id));
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Groupe_Mapper::delete($where);
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$parameters = Router::get_parameters();
				if(count($parameters) == 1 && !empty($parameters[0]))
				{
					$id = $parameters[0];
					$select = array();
					$where = array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
					$groupes = Groupe_Mapper::select($select,$where);
					if(! empty($groupes))
					{
						$item = $groupes[0];
						Groupe_Viewer::form_delete($item);
					}
					else
					{
						Viewer::error("Unknown id.");
					}
				}
				else
				{
					Viewer::error("Argument missing.");
				}
			}
		}
	}
?>