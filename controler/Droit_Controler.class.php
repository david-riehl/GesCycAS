<?php
	class Droit_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Droit::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Droit::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Droit::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Droit::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Droit::delete',$_SESSION['droits']))
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
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			
			$rows = $classname::get_list();
			$fields = $class_mapper::get_fields();
			$class_viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$link_classname = "Attribution";
			$link_controleur = $link_classname."_Controler";
			$linked_classname = "Groupe";
			$linked_mapper = $linked_classname."_Mapper";
			
			if(isset($_POST['btn_valider']))
			{
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				$controleur = $_POST['controleur'];
				unset($_POST['controleur']);
				$action = $_POST['action'];
				unset($_POST['action']);
				
				$fields = array('nom','controleur','action');
				$values[0] = array($nom,$controleur,$action);
				$class_mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'nom', 'operator' => '=', 'values' => array($nom)),
					array('field' => 'controleur', 'operator' => '=', 'values' => array($controleur)),
					array('field' => 'action', 'operator' => '=', 'values' => array($action))
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$items = $class_mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$item = $items[0];
				$link_controleur::insert(array('id_droit'=>$item['id']));
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$linked_items = $linked_classname::get_list();
				$item_fields = $class_mapper::get_fields();
				$linked_fields = $linked_mapper::get_fields();
				$class_viewer::form_create($linked_items, $item_fields, $linked_fields);
			}
		}

		private static function form_read()
		{
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$link_classname = "Attribution";
			$link_mapper = $link_classname."_Mapper";
			$linked_classname = "Groupe";
			$linked_mapper = $linked_classname."_Mapper";

			$parameters = Router::get_parameters();
			if(count($parameters) == 1 && !empty($parameters[0]))
			{
				$id = $parameters[0];
				$select = array();
				$where = array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				$items = $class_mapper::select($select,$where);
				if(! empty($items))
				{
					$item = $items[0];
					$linked_items = $linked_classname::get_list();
					
					$select = array();
					$where = array(array('field' => 'id_droit', 'operator' => '=', 'values' => array($id)));
					$link_items = $link_mapper::select($select,$where);
					$links = array();
					foreach($link_items as $link_item)
					{
						$links[$link_item['id_droit']][$link_item['id_groupe']] = true;
					}
					
					$item_fields = $class_mapper::get_fields();
					$linked_fields = $linked_mapper::get_fields();
					
					$class_viewer::form_read($item, $linked_items, $links, $item_fields, $linked_fields);
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
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$link_classname = "Attribution";
			$link_mapper = $link_classname."_Mapper";
			$link_controler = $link_classname."_Controler";
			$linked_classname = "Groupe";
			$linked_mapper = $linked_classname."_Mapper";
			
			if(isset($_POST['btn_valider']))
			{
				$id = $_POST['id'];
				unset($_POST['id']);
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				$controleur = $_POST['controleur'];
				unset($_POST['controleur']);
				$action = $_POST['action'];
				unset($_POST['action']);
				
				$set[] = array('field'=>'nom', 'value'=> $nom);
				$set[] = array('field'=>'controleur', 'value'=> $controleur);
				$set[] = array('field'=>'action', 'value'=> $action);
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				$class_mapper::update($set,$where);
				
				$link_controler::delete(array('id_droit'=>$id));
				$link_controler::insert();
				
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
					$items = $class_mapper::select($select,$where);
					if(! empty($items))
					{
						$item=$items[0];
						
						$select = array();
						$where = array(array('field' => 'id_droit', 'operator' => '=', 'values' => array($id)));
						$link_items = $link_mapper::select($select,$where);
						$links = array();
						
						foreach($link_items as $link_item)
						{
							$links[$link_item['id_droit']][$link_item['id_groupe']] = true;
						}
						
						$linked_items = $linked_classname::get_list();
						$item_fields = $class_mapper::get_fields();
						$linked_fields = $linked_mapper::get_fields();
						$class_viewer::form_update($item, $linked_items, $links, $item_fields, $linked_fields);
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
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$link_classname = "Attribution";
			$link_mapper = $link_classname."_Mapper";
			$link_controler = $link_classname."_Controler";
			$linked_classname = "Groupe";
			$linked_mapper = $linked_classname."_Mapper";
			
			if(isset($_POST['btn_valider']))
			{
				$id = $_POST['id'];
				
				$link_controler::delete(array('id_droit'=>$id));
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				$class_mapper::delete($where);
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
					$items = $class_mapper::select($select,$where);
					if(! empty($items))
					{
						$item = $items[0];
						$class_viewer::form_delete($item);
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