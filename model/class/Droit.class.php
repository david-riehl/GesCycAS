<?php
	class Droit extends Data
	{
		/**
		 * Liste des propriétés
		 */
		
		private $id;
		private $nom;
		private $controleur;
		private $action;
		
		public function __construct()
		{
			$mapper_classname = get_class()."_Mapper";
			switch(func_num_args())
			{
				case 2:
					/*construction d'un objet avec tous les paramètres*/
					$this->id = func_get_arg(0);
					$this->nom = func_get_arg(1);
					$this->controleur = func_get_arg(2);
					$this->action = func_get_arg(3);
					break;
				case 1:
					/*construction d'un objet à partir de l'id*/
					$this->id = func_get_arg(0);
					$res = $mapper_classname::select(array(),array(array('field' => 'id', 'operator' => '=', 'values' => array($this->id))));
					if(count($res))
					{
						$this->nom = $res[0]['nom'];
						$this->controleur = $res[0]['controleur'];
						$this->action = $res[0]['action'];
					}
					break;
			}
		}
		
		function get_id()
		{
			return $this->id;
		}
		
		function set_id($id)
		{
			$this->id = $id;
		}
		
		function get_nom()
		{
			return $this->nom;
		}
		
		function set_nom($nom)
		{
			$this->nom = $nom;
		}
		
		function get_controleur()
		{
			return $this->controleur;
		}
		
		function set_controleur($controleur)
		{
			$this->controleur = $controleur;
		}
		
		function get_action()
		{
			return $this->action;
		}
		
		function set_action($action)
		{
			$this->action = $action;
		}
		
		static function get_list()
		{
			$mapper_classname = get_class()."_Mapper";
			$rows = $mapper_classname::select();
			return $rows;
		}
	}
?>