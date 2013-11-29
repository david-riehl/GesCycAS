<?php
	class Session extends Data
	{
		/**
		 * Liste des propriétés
		 */
		
		private $id;
		private $ip;
		private $debut;
		private $fin;
		private $id_utilisateur;
		private $utilisateur;
		
		public function __construct()
		{
			$mapper_classname = get_class()."_Mapper";
			switch(func_num_args())
			{
				case 5:
					/*construction d'un objet avec tous les paramètres*/
					$this->id = func_get_arg(0);
					$this->ip = func_get_arg(1);
					$this->debut = func_get_arg(2);
					$this->fin = func_get_arg(3);
					$this->id_utilisateur = func_get_arg(4);
					break;
				case 1:
					/*construction d'un objet à partir de l'id*/
					$this->id = func_get_arg(0);
					$rows = $mapper_classname::select(array(),array(array('field' => 'id', 'operator' => '=', 'values' => array($this->id))));
					if(count($rows))
					{
						$item = $rows[0];
						$this->ip = $item['ip'];
						$this->debut = $item['debut'];
						$this->fin = $item['fin'];
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
		
		function get_debut()
		{
			return $this->debut;
		}
		
		function set_debut($debut)
		{
			$this->debut = $debut;
		}
		
		function get_fin()
		{
			return $this->fin;
		}
		
		function set_fin($fin)
		{
			$this->fin = $fin;
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