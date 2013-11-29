<?php
	class Affectation extends Data
	{
		/**
		 * Liste des propriétés
		 */
		
		private $id_utilisateur;
		private $id_groupe;
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 2:
					/*construction d'un objet avec tous les paramètres*/
					$this->id_utilisateur = func_get_arg(0);
					$this->id_groupe = func_get_arg(1);
					break;
			}
		}
		
		function get_id_utilisateur()
		{
			return $this->id_utilisateur;
		}
		
		function set_id_utilisateur($id_utilisateur)
		{
			$this->id_utilisateur = $id_utilisateur;
		}
		
		function get_id_groupe()
		{
			return $this->id_groupe;
		}
		
		function set_id_groupe($id_groupe)
		{
			$this->id_groupe = $id_groupe;
		}
		
		static function get_list()
		{
			$mapper_classname = get_class()."_Mapper";
			$rows = $mapper_classname::select();
			return $rows;
		}
	}
?>