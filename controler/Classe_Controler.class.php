<?php
	class Classe_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Classe::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Classe::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Classe::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Classe::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Classe::delete',$_SESSION['droits']))
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
			$rows = Classe::get_list();
			$fields = Classe_Mapper::get_fields();
			Classe_Viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			if(isset($_POST['btn_valider']))
			{
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				$fields = array('nom');
				$values[0] = array($nom);
				Classe_Mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'nom', 'operator' => '=', 'values' => array($nom)),
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$classes = Classe_Mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$classe = $classes[0];
				Affectation_Controler::insert(array('id_classe'=>$classe['id']));
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$linked_items = annee::get_list();
				$item_fields = Classe_Mapper::get_fields();
				$linked_fields = Annee_Mapper::get_fields();
				Classe_Viewer::form_create($linked_items, $item_fields, $linked_fields);
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
				$classes = Classe_Mapper::select($select,$where);
				if(! empty($classes))
				{
					$item = $classes[0];
					$linked_items = annee::get_list();
					
					$select = array();
					$where = array(array('field' => 'id_classe', 'operator' => '=', 'values' => array($id)));
					$acceptations = Acceptation_Mapper::select($select,$where);
					$links = array();
					foreach($acceptations as $acceptation)
					{
						$links[$acceptation['id_annee']][$acceptation['id_classe']] = true;
					}
					
					$item_fields = Classe_Mapper::get_fields();
					$linked_fields = Annee_Mapper::get_fields();
					
					Classe_Viewer::form_read($item, $linked_items, $links, $item_fields, $linked_fields);
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
				Classe_Mapper::update($set,$where);
				
				Acceptations_Controler::delete(array('id_classe'=>$id));
				Acceptations_Controler::insert();
				
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
					$classes = Classe_Mapper::select($select,$where);
					if(! empty($classes))
					{
						$item=$classes[0];
						
						$select = array();
						$where = array(array('field' => 'id_classe', 'operator' => '=', 'values' => array($id)));
						$affectations = Acceptation_Mapper::select($select,$where);
						$links = array();
						
						foreach($acceptations as $acceptation)
						{
							$links[$acceptation['id_annee']][$acceptation['id_classe']] = true;
						}
						
						$linked_items = annee::get_list();
						$item_fields = Classe_Mapper::get_fields();
						$linked_fields = Annee_Mapper::get_fields();
						Classe_Viewer::form_update($item, $linked_items, $links, $item_fields, $linked_fields);
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
				
				Acceptation_Controler::delete(array('id_classe'=>$id));
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Classe_Mapper::delete($where);
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
					$classes = Classe_Mapper::select($select,$where);
					if(! empty($classes))
					{
						$item = $classes[0];
						Classe_Viewer::form_delete($item);
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