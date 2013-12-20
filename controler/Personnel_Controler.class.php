<?php
	class Personnel_controleur extends Utilisateur_Controler
	{
		public static function route()
		{
			$action = Router::get_action();
			switch($action)
			{
				case Router::get_default_action():
					if(in_array('Personnel::default',$_SESSION['droits']))
					{
						self::form_list();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'create':
					if(in_array('Personnel::create',$_SESSION['droits']))
					{
						self::form_create();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'read':
					if(in_array('Personnel::read',$_SESSION['droits']))
					{
						self::form_read();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'update':
					if(in_array('Personnel::update',$_SESSION['droits']))
					{
						self::form_update();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'delete':
					if(in_array('Personnel::delete',$_SESSION['droits']))
					{
						self::form_delete();
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'activate':
					if(in_array('Personnel::activate',$_SESSION['droits']))
					{
						self::update_actif(1);
					}
					else
					{
						Viewer::error('Accès Interdit.');
					}
					break;
				case 'desactivate':
					if(in_array('Personnel::desactivate',$_SESSION['droits']))
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
			Personnel_Mapper::update($set,$where);
			
			header('Location: ..');
		}
		
		private static function form_list()
		{
			$rows = Personnel::get_list();
			$fields = Personnel_Mapper::get_fields();
			Personnel_Viewer::form_list($rows,$fields);
		}
		
		private static function form_create()
		{
			if(isset($_POST['btn_valider']))
			{
				$nom = $_POST['nom'];
				unset($_POST['nom']);
				$prenom = $_POST['prenom'];
				unset($_POST['prenom']);
				$email = $_POST['email'];
				unset($_POST['email']);
				$numero = $_POST['numero'];
				unset($_POST['numero']);
				$login = $_POST['login'];
				unset($_POST['login']);
				$password = $_POST['password'];
				unset($_POST['password']);
				unset($_POST['password2']);
				if(isset($_POST['actif']))
				{
					$actif = 1;
					unset($_POST['actif']);
				}
				else
				{
					$actif = 0;
				}
				
				$fields = array('nom','prenom','email','numero','login','password','actif');
				$values[0] = array($nom,$prenom,$email,$numero,$login,$password,$actif);
				Personnel_Mapper::insert($fields,$values);
				
				$select=array();
				$where = array(
					array('field' => 'nom', 'operator' => '=', 'values' => array($nom)),
					array('field' => 'prenom', 'operator' => '=', 'values' => array($prenom)),
					array('field' => 'email', 'operator' => '=', 'values' => array($email)),
					array('field' => 'numero', 'operator' => '=', 'values' => array($numero)),
					array('field' => 'login', 'operator' => '=', 'values' => array($login)),
					array('field' => 'password', 'operator' => '=', 'values' => array($password)),
					array('field' => 'actif', 'operator' => '=', 'values' => array($actif))
				);
				$group_by = array();
				$having = array();
				$order_by[] = array('field'=>'id', 'direction'=>'DESC');
				$limit['rows'] = 1;

				$personnels = Personnel_Mapper::select($select,$where,$group_by,$having,$order_by,$limit);
				$personnel = $personnels[0];
				Affectation_Controler::insert(array('id_personnel'=>$upersonnel['id']));
				
				header('Location: ..');
			}
			elseif(isset($_POST['btn_annuler']))
			{
				header('Location: ..');
			}
			else
			{
				$linked_items = Groupe::get_list();
				$item_fields = Personnel_Mapper::get_fields();
				$linked_fields = Groupe_Mapper::get_fields();
				Personnel_Viewer::form_create($linked_items, $item_fields, $linked_fields);
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
				$personnels = Personnel_Mapper::select($select,$where);
				if(! empty($personnels))
				{
					$item = $personnels[0];
					$linked_items = Groupe::get_list();
					
					$select = array();
					$where = array(array('field' => 'id_personnel', 'operator' => '=', 'values' => array($id)));
					$affectations = Affectation_Mapper::select($select,$where);
					$links = array();
					foreach($affectations as $affectation)
					{
						$links[$affectation['id_personnel']][$affectation['id_groupe']] = true;
					}
					
					$item_fields = Personnel_Mapper::get_fields();
					$linked_fields = Groupe_Mapper::get_fields();
					Personnel_Viewer::form_read($item, $linked_items, $links, $item_fields, $linked_fields);
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
				$prenom = $_POST['prenom'];
				unset($_POST['prenom']);
				$email = $_POST['email'];
				unset($_POST['email']);
				$numero = $_POST['numero'];
				unset($_POST['numero']);
				$login = $_POST['login'];
				unset($_POST['login']);
				$password = $_POST['password'];
				unset($_POST['password']);
				unset($_POST['password2']);
				if(isset($_POST['actif']))
				{
					$actif = 1;
					unset($_POST['actif']);
				}
				else
				{
					$actif = 0;
				}
				
				$set[] = array('field'=>'nom', 'value'=> $nom);
				$set[] = array('field'=>'prenom', 'value'=> $prenom);
				$set[] = array('field'=>'email', 'value'=> $email);
				$set[] = array('field'=>'numero', 'value'=> $numero);
				$set[] = array('field'=>'login', 'value'=> $login);
				$set[] = array('field'=>'actif', 'value'=> $actif);
				
				if(!empty($password))
				{
					$set[] = array('field'=>'password', 'value'=> $password);
				}
				
				$where=array(array('field' => 'id', 'operator' => '=', 'values' => array($id)));
				Personnel_Mapper::update($set,$where);
				
				Affectation_Controler::delete(array('id_personnel'=>$id));
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
					$personnels = Personnel_Mapper::select($select,$where);
					if(! empty($personnels))
					{
						$item = $personnels[0];
						
						$select = array();
						$where = array(array('field' => 'id_personnel', 'operator' => '=', 'values' => array($id)));
						$affectations = Affectation_Mapper::select($select,$where);
						$links = array();
						
						foreach($affectations as $affectation)
						{
							$links[$affectation['id_personnel']][$affectation['id_groupe']] = true;
						}
						
						$linked_items = Groupe::get_list();
						$item_fields = Personnel_Mapper::get_fields();
						$linked_fields = Groupe_Mapper::get_fields();
						Personnel_Viewer::form_update($item, $linked_items, $links, $item_fields, $linked_fields);
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
				Personnel_Mapper::delete($where);
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
					$rows = Personnels_Mapper::select($select,$where);
					if(! empty($rows))
					{
						Personnel_Viewer::form_delete($rows[0]);
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
	//propriete de Cédric BULTE 
	//tous droits réservés
?>