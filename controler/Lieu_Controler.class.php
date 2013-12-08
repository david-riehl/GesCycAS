<?php
	class Lieu_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Lieu::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Lieu::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Lieu::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Lieu::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Lieu::delete',$_SESSION['droits']))
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
			$rows = Lieu::get_list();
			$fields = Lieu_Mapper::get_fields();
			Lieu_Viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			if(isset($_POST['btn_valider']))
			{
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				
				$fields = array('nom');
				$values[0] = array($nom);
				Lieu_Mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'nom', 'operator' => '=', 'values' => array($nom))	
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$lieux = Lieu_Mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$lieu = $lieux[0];
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$item_fields = Lieu_Mapper::get_fields();
				Lieu_Viewer::form_create($item_fields);
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
				$lieux = Lieu_Mapper::select($select,$where);
				if(! empty($lieux))
				{
					$item = $lieux[0];
					
					$select = array();
					$where = array(array('field' => 'id_lieu', 'operator' => '=', 'values' => array($id)));
					
					$item_fields = Lieu_Mapper::get_fields();
					Lieu_Viewer::form_read($item, $item_fields);
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
				Lieu_Mapper::update($set,$where);
				
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
					$lieux = Lieu_Mapper::select($select,$where);
					if(! empty($lieux))
					{
						$item = $lieux[0];
						
						$select = array();
						$where = array(array('field' => 'id_lieu', 'operator' => '=', 'values' => array($id)));
						
						$item_fields = Lieu_Mapper::get_fields();
						Lieu_Viewer::form_update($item, $item_fields);
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
				Lieu_Mapper::delete($where);
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
					$rows = Lieu_Mapper::select($select,$where);
					if(! empty($rows))
					{
						Lieu_Viewer::form_delete($rows[0]);
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