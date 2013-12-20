<?php
	class Seance_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Seance::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Seance::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Seance::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Seance::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Seance::delete',$_SESSION['droits']))
					{
						self::form_delete();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'activate':
					if(in_array('Seance::activate',$_SESSION['droits']))
					{
						self::update_actif(1);
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'desactivate':
					if(in_array('Seance::desactivate',$_SESSION['droits']))
					{
						self::update_actif(0);
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
		
		private static function update_actif($etat)
		{
			$parameters = Router::get_parameters();
			$id = $parameters[0];
			
			$set[] = array('field'=>'actif', 'value'=> $etat);
			
			$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
			Seance_Mapper::update($set,$where);
			
			header('Location: ..');
		}
		
		private static function form_list()
		{
			$rows = Seance::get_list();
			$fields = Seance_Mapper::get_fields();
			Seance_Viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			if(isset($_POST['btn_valider']))
			{
				$id = $_POST['id'];
				unset($_POST['id']);
				$date = $_POST['date'];
				unset($_POST['date']);
				
				
				
				
				$fields = array('id','date');
				$values[0] = array($nom,$prenom,$email,$login,$password,$actif);
				Seance_Mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'id', 'operator' => '=', 'values' => array($id)),
					array('field' => 'date', 'operator' => '=', 'values' => array($date)),
					
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$Seances = Seance_Mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$Seance = $Seances[0];
				Affectation_Controler::insert(array('id_Seance'=>$Seance['id']));
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$linked_items = Groupe::get_list();
				$item_fields = Seance_Mapper::get_fields();
				$linked_fields = Groupe_Mapper::get_fields();
				Seance_Viewer::form_create($linked_items, $item_fields, $linked_fields);
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
				$Seances = Seance_Mapper::select($select,$where);
				if(! empty($Seances))
				{
					$item = $Seances[0];
					$linked_items = Groupe::get_list();
					
					$select = array();
					$where = array(array('field' => 'id_Seance', 'operator' => '=', 'values' => array($id)));
					$affectations = Affectation_Mapper::select($select,$where);
					$links = array();
					foreach($affectations as $affectation)
					{
						$links[$affectation['id_Seance']][$affectation['id_groupe']] = true;
					}
					
					$item_fields = Seance_Mapper::get_fields();
					$linked_fields = Groupe_Mapper::get_fields();
					Seance_Viewer::form_read($item, $linked_items, $links, $item_fields, $linked_fields);
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
				$date = $_POST['date'];
				unset($_POST['date']);
				
				$set[] = array('field'=>'id', 'value'=> $nom);
				$set[] = array('field'=>'date', 'value'=> $prenom);
				
				
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Seance_Mapper::update($set,$where);
				
				Affectation_Controler::delete(array('id_Seance'=>$id));
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
					$Seances = Seance_Mapper::select($select,$where);
					if(! empty($Seances))
					{
						$item = $Seances[0];
						
						$select = array();
						$where = array(array('field' => 'id_Seance', 'operator' => '=', 'values' => array($id)));
						$affectations = Affectation_Mapper::select($select,$where);
						$links = array();
						
						foreach($affectations as $affectation)
						{
							$links[$affectation['id_Seance']][$affectation['id_groupe']] = true;
						}
						
						$linked_items = Groupe::get_list();
						$item_fields = Seance_Mapper::get_fields();
						$linked_fields = Groupe_Mapper::get_fields();
						Seance_Viewer::form_update($item, $linked_items, $links, $item_fields, $linked_fields);
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
				Seance_Mapper::delete($where);
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
					$rows = Seance_Mapper::select($select,$where);
					if(! empty($rows))
					{
						Seance_Viewer::form_delete($rows[0]);
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
