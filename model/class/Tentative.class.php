<?php
	class Tentative extends Data
	{
		/**
		 * Liste des propriétés
		 */
		
		private $id;
		private $ip;
		private $date_heure;
		private $id_utilisateur;
		private $utilisateur;
		
		public function __construct()
		{
			$mapper_classname = get_class()."_Mapper";
			switch(func_num_args())
			{
				case 4:
					/*construction d'un objet avec tous les paramètres*/
					$this->id = func_get_arg(0);
					$this->ip = func_get_arg(1);
					$this->date_heure = func_get_arg(2);
					$this->id_utilisateur = func_get_arg(3);
					break;
				case 1:
					/*construction d'un objet à partir de l'id*/
					$this->id = func_get_arg(0);
					$rows = $mapper_classname::select(array(),array(array('field' => 'id', 'operator' => '=', 'values' => array($this->id))));
					if(count($rows))
					{
						$item = $rows[0];
						$this->ip = $item['ip'];
						$this->date_heure = $item['date_heure'];
						$this->id_utilisateur = $item['id_utilisateur'];
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
		
		function get_ip()
		{
			return $this->ip;
		}
		
		function set_ip($ip)
		{
			$this->ip = $ip;
		}
		
		function get_date_heure()
		{
			return $this->date_heure;
		}
		
		function set_date_heure($date_heure)
		{
			$this->date_heure = $date_heure;
		}
		
		function get_id_utilisateur()
		{
			return $this->id_utilisateur;
		}
		
		function set_id_utilisateur($id_utilisateur)
		{
			$this->id_utilisateur = $id_utilisateur;
		}
		
		function get_utilisateur()
		{
			return $utilisateur;
		}
		
		function set_utilisateur($utilisateur)
		{
			$this->utilisateur = $utilisateur;
		}
		
		static function get_list()
		{
			$mapper_classname = get_class()."_Mapper";
			$rows = $mapper_classname::select();
			return $rows;
		}
	}
?>