<?php
	class Autorisation extends Data
	{
		/**
		 * Liste des propriétés
		 */
		
		private $id_annee;
		private $id_cours;
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 2:
					/*construction d'un objet avec tous les paramètres*/
					$this->id_annee = func_get_arg(0);
					$this->id_cours = func_get_arg(1);
					break;
			}
		}
		
		function get_id_annee()
		{
			return $this->id_annee;
		}
		
		function set_id_annee($id_annee)
		{
			$this->id_annee = $id_annee;
		}
		
		function get_id_cours()
		{
			return $this->id_cours;
		}
		
		function set_id_cours($id_cours)
		{
			$this->id_cours = $id_cours;
		}
		
		static function get_list()
		{
			$mapper_classname = get_class()."_Mapper";
			$rows = $mapper_classname::select();
			return $rows;
		}
	}
?>