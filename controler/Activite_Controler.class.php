<?php
	class Activite_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Activite::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Activite::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'list':
					if(in_array('Activite::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					 if(in_array('Activite::read',$_SESSION['droits']))
					 {
						 self::form_read();
					 }
					else
					 {
						 Viewer::error('Accès Interdit.');
					 }
					 break;
					case 'update':
					if(in_array('Activite::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
					case 'delete':
					if(in_array('Activite::delete',$_SESSION['droits']))
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
			$parameters = Router::get_parameters();
			switch(count($parameters))
			{
				case 2:
					$page = $parameters[1];
				case 1:
					$id = $parameters[0];
					break;
				case 0:
				default:
					$id = 'all';
					$page = 1;
			}
			
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$linked_classname = "Utilisateur";
			$linked_mapper = $linked_classname."_Mapper";
			
			$items_in_page = 20;
			
			$results=array();
			$select=array();
			if($id != 'all')
			{
				$where = array(
					array('field' => 'id_utilisateur', 'operator' => '=', 'values' => array($id)),
				);
				$results = $linked_mapper::select($select,$where);
			}
			
			if($id == 'all' || $id != 'all' && count($results))
			{
				$select=array(
					'functions' => array(
											array('function'=>'count', 'alias'=>'count')
										)
				);
				if($id != 'all')
				{
					$where = array(
						array('field' => 'id_utilisateur', 'operator' => '=', 'values' => array($id)),
					);
				}
				else
				{
					$where = array();
				}
				$results = $class_mapper::select($select,$where);
				$count = $results[0]['count'];
				
				if($count % $items_in_page)
				{
					$pages = (int) ($count / $items_in_page + 1);
				}
				else
				{
					$pages = (int) ($count / $items_in_page);
				}
				
				$select=array();
				$where = array();
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'nom', 'direction'=>'ASC');
				$limit['offset'] = $items_in_page * ($page - 1);
				$limit['rows'] = $items_in_page;
				$rows = $class_mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				foreach($rows as $key => $row)
				{
					 $item[$key] = $row;
					// $item[$key]['date'] = dateToFr(substr($row['date_heure'],0,10));
					// $item[$key]['heure'] = substr($row['date_heure'],11);
				}
				$item_fields = $class_mapper::get_fields();
				
				$rows = $linked_classname::get_list();
				foreach($rows as $key => $row)
				{
					$linked_item[$row['id']] = $row;
				}
				$linked_fields = $linked_mapper::get_fields();
				
				$class_viewer::form_list($item, $linked_item, $item_fields, $linked_fields, $id, $page, $pages);
			}
			else
			{
				Viewer::error("Unknown id.");
			}
		}

		 private static function form_read()
		{
			 $classname=substr(get_class(),0,strlen("_Controler")*-1);
			 $class_mapper=$classname."_Mapper";
			 $class_viewer=$classname."_Viewer";
			 $linked_classname = "Utilisateur";
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
					 // $item['date'] = dateToFr(substr($item['date_heure'],0,10));
					 // $item['heure'] = substr($item['date_heure'],11);
					
					 $select = array();
					 $where = array(array('field' => 'id', 'operator' => '=', 'values' => array($item['id_place'])));
					 $linked_items = $linked_mapper::select($select,$where);
					 $linked_item = $linked_items[0];
					
					 $item_fields = $class_mapper::get_fields();
					 $linked_fields = $linked_mapper::get_fields();
					
					 $id = $_POST['id'];
					 $page = $_POST['page'];
					
					 $class_viewer::form_read($item, $linked_item, $item_fields, $linked_fields, $id, $page);
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
				//$place = $_POST['place'];
				//unset($_POST['place'];
				
				$set[] = array('field'=>'nom', 'value'=> $nom);
				
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
				//$place = $_POST['place'];
				//unset($_POST['place'];
			
				
				$fields = array('nom');
				$values[0] = array($nom);
				$class_mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'nom', 'operator' => '=', 'values' => array($nom))
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'nom'=>'ASC');
				$limit['rows'] = 1;

				$items = $class_mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$item = $items[0];
				//$link_place::insert(array('id_place'=>$item['id']));  // Lien place libre
				
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
		
		private static function form_delete()
		{
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$link_classname = "Attribution";
			$linked_classname = "Groupe";
			$link_mapper = $link_classname."_Mapper";
			$link_controler = $link_classname."_Controler";
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