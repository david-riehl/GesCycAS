<?php
	class Cours_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Cours::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Cours::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Cours::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Cours::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Cours::delete',$_SESSION['droits']))
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
			$rows = Cours::get_list();
			$fields = Cours_Mapper::get_fields();
			Cours_Viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			if(isset($_POST['btn_valider']))
			{
				$debut = $_POST['debut'];
				unset($_POST['debut']);
				$fin = $_POST['fin'];
				unset($_POST['fin']);
				$nbPlacesMax = $_POST['nbPlacesMax'];
				unset($_POST['nbPlacesMax']);
				
				$fields = array('debut', 'fin', 'nbPlacesMax');
				$values[0] = array($debut, $fin, $nbPlacesMax);
				Cours_Mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'debut', 'operator' => '=', 'values' => array($debut)),
					array('field' => 'fin', 'operator' => '=', 'values' => array($fin)),
					array('field' => 'nbPlacesMax', 'operator' => '=', 'values' => array($nbPlacesMax)),
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$courss = Cours_Mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$cours = $courss[0];
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$item_fields = Cours_Mapper::get_fields();
				Cours_Viewer::form_create($item_fields);
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
				$courss = Cours_Mapper::select($select,$where);
				if(! empty($courss))
				{
					$item = $courss[0];
					
					$select = array();
					$where = array(array('field' => 'id_cours', 'operator' => '=', 'values' => array($id)));
					
					$item_fields = Cours_Mapper::get_fields();
					Cours_Viewer::form_read($item, $item_fields);
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
				$debut = $_POST['debut'];
				unset($_POST['debut']);
				$fin = $_POST['fin'];
				unset($_POST['fin']);
				$nbPlacesMax = $_POST['nbPlacesMax'];
				unset($_POST['nbPlacesMax']);
				
				$set[] = array('field'=>'debut', 'value'=> $debut);
				$set[] = array('field'=>'fin', 'value'=> $fin);
				$set[] = array('field'=>'nbPlacesMax', 'value'=> $nbPlacesMax);
				
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Cours_Mapper::update($set,$where);
				
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
					$courss = Cours_Mapper::select($select,$where);
					if(! empty($courss))
					{
						$item = $courss[0];
						
						$select = array();
						$where = array(array('field' => 'id_cours', 'operator' => '=', 'values' => array($id)));
						
						$item_fields = Cours_Mapper::get_fields();
						Cours_Viewer::form_update($item, $item_fields);
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
						
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Cours_Mapper::delete($where);
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
					$rows = Cours_Mapper::select($select,$where);
					if(! empty($rows))
					{
						Cours_Viewer::form_delete($rows[0]);
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