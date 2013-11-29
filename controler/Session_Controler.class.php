<?php
	session_start();
	class Session_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Session::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'list':
					if(in_array('Session::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'open':
					self::form_open();
					break;
				case 'read':
					if(in_array('Session::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'close':
					self::form_close();
					break;
				default:
					Viewer::error("Unknown action name `".$action."`.");
			}
		}
		
		private static function session_close()
		{
			unset($_SESSION['session']);
			unset($_SESSION['utilisateur']);
			unset($_SESSION['droits']);
			$_SESSION['connected']=false;
			$_SESSION['droits'] = array();
		}
		
		public static function session_control()
		{
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$linked_classname = "Utilisateur";
			$linked_mapper = $linked_classname."_Mapper";
			$result = false;
			if(isset($_SESSION['connected']) && $_SESSION['connected'])
			{
				if(isset($_SESSION['utilisateur']['login']) && isset($_SESSION['utilisateur']['password']))
				{
					$select=array();
					$where = array(
						array('field' => 'login', 'operator' => '=', 'values' => array($_SESSION['utilisateur']['login'])),
						array('field' => 'password', 'operator' => '=', 'values' => array($_SESSION['utilisateur']['password'])),
						array('field' => 'actif', 'operator' => '=', 'values' => array(1))
					);
					$items = $linked_mapper::select($select,$where);
					if(count($items) == 1)
					{
						$droits = $linked_classname::get_droits($_SESSION['utilisateur']['id']);
						
						unset($_SESSION['droits']);
						$_SESSION['droits']=array();
						foreach($droits as $droit)
						{
							$_SESSION['droits'][]=$droit['controleur'].'::'.$droit['action'];
						}
						$_SESSION['connected']=true;
						if(in_array('Session::open',$_SESSION['droits']))
						{
							$result = true;
						}
						else
						{
							self::session_close();
						}
					}
					else
					{
						self::session_close();
					}
				}
				else
				{
					self::session_close();
				}
			}
			else
			{
				self::session_close();
			}
			return $result;
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
					$item[$key]['date_debut'] = dateToFr(substr($row['debut'],0,10));
					$item[$key]['heure_debut'] = substr($row['debut'],11);
					$item[$key]['date_fin'] = dateToFr(substr($row['fin'],0,10));
					$item[$key]['heure_fin'] = substr($row['fin'],11);
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
		
		private static function form_open()
		{
			$erreur=false;
			$actif=true;
			$message="";
			if(isset($_SESSION['connected']) && $_SESSION['connected'] && self::session_control())
			{
				self::form_welcome();
			}
			else
			{
				$classname=substr(get_class(),0,strlen("_Controler")*-1);
				$class_mapper=$classname."_Mapper";
				$class_viewer=$classname."_Viewer";
				$linked_classname = "Utilisateur";
				$linked_mapper = $linked_classname."_Mapper";
				
				if(isset($_POST['btn_connecter']))
				{
					$login = $_POST['login'];
					$password = $_POST['password'];
					$ip = $_SERVER['REMOTE_ADDR'];
					$debut = date("Y-m-d H:i:s");
					
					$select=array();
					$where = array(
						array('field' => 'login', 'operator' => '=', 'values' => array($login))
					);
					$items = $linked_mapper::select($select,$where);
					
					if(count($items))
					{
						$utilisateur = $items[0];
						$actif=$utilisateur['actif'];
						if ($actif && $utilisateur['password'] == $password)
						{
							$fields = array('ip','debut','fin','id_utilisateur');
							$values[0] = array($ip,$debut,$debut,$utilisateur['id']);
							$class_mapper::insert($fields,$values);
							
							
							$select=array();
							$where = array(
								array('field' => 'ip', 'operator' => '=', 'values' => array($ip)),
								array('field' => 'debut', 'operator' => '=', 'values' => array($debut)),
								array('field' => 'fin', 'operator' => '=', 'values' => array($debut)),
								array('field' => 'id_utilisateur', 'operator' => '=', 'values' => array($utilisateur['id'])),
							);
							$group_by = array();
							$having = array();
							$order_by[] = array('field'=>'id', 'direction'=>'DESC');
							$limit['rows'] = 1;
							$sessions = $class_mapper::select($select,$where,$group_by,$having,$order_by,$limit);
							$session = $sessions[0];
							
							$_SESSION['session']=$session;
							$_SESSION['utilisateur']=$utilisateur;
							$_SESSION['connected']=true;
														
							if(self::session_control())
							{
								self::form_welcome();
							}
							else
							{
								$erreur=true;
								$message = "Votre groupe n'est pas autorisé à ouvrir une session.";

								$fields = array('ip','date_heure','id_utilisateur');
								$values[0] = array($ip,$debut,$utilisateur['id']);
								Tentative_Mapper::insert($fields,$values);
							}
						}
						else
						{
							$erreur=true;
							if($actif)
							{
								$message = "Identifiant ou mot de passe incorrecte.";
							}
							else
							{
								$message = "Votre compte a été bloqué. Veuillez contacter votre administrateur.";
							}

							$fields = array('ip','date_heure','id_utilisateur');
							$values[0] = array($ip,$debut,$utilisateur['id']);
							Tentative_Mapper::insert($fields,$values);
						}
					}
					else
					{
						$erreur=true;
						$message = "Identifiant ou mot de passe incorrecte.";
					}
				}

				if(! isset($_POST['btn_connecter']) || $erreur)
				{
					$linked_fields = $linked_mapper::get_fields();
					$class_viewer::form_open($linked_fields, $erreur, $message);
				}
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
					$item['date_debut'] = dateToFr(substr($item['debut'],0,10));
					$item['heure_debut'] = substr($item['debut'],11);
					$item['date_fin'] = dateToFr(substr($item['fin'],0,10));
					$item['heure_fin'] = substr($item['fin'],11);
					
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
		
		private static function form_welcome()
		{
			$classname=substr(get_class(),0,strlen("_Controler")*-1);
			$class_mapper=$classname."_Mapper";
			$class_viewer=$classname."_Viewer";
			$linked_classname = "Utilisateur";
			$linked_mapper = $linked_classname."_Mapper";
			
			$fin = date("Y-m-d H:i:s");
			$set[] = array('field'=>'fin', 'value'=> $fin);
			$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($_SESSION['session']['id'])));
			$class_mapper::update($set,$where);
			if(isset($_POST['btn_deconnecter']))
			{
				self::session_close();
				self::form_open();
			}
			else
			{
				$linked_item=$_SESSION['utilisateur'];
				$linked_fields = $linked_mapper::get_fields();
				
				$class_viewer::form_welcome($linked_item, $linked_fields);
			}
		}
	}
	Session_Controler::session_control();
?>