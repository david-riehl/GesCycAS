<?php
	class Tentative_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Tentative::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'list':
					if(in_array('Tentative::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Tentative::read',$_SESSION['droits']))
					{
						self::form_read();
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
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['offset'] = $items_in_page * ($page - 1);
				$limit['rows'] = $items_in_page;
				$rows = $class_mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				foreach($rows as $key => $row)
				{
					$item[$key] = $row;
					$item[$key]['date'] = dateToFr(substr($row['date_heure'],0,10));
					$item[$key]['heure'] = substr($row['date_heure'],11);
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
					$item['date'] = dateToFr(substr($item['date_heure'],0,10));
					$item['heure'] = substr($item['date_heure'],11);
					
					$select = array();
					$where = array(array('field' => 'id', 'operator' => '=', 'values' => array($item['id_utilisateur'])));
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
	}
?>