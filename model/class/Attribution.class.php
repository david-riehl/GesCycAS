<?php
	class Attribution extends Data
	{
		/**
		 * Liste des propriétés
		 */
		
		private $id_droit;
		private $id_groupe;
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 2:
					/*construction d'un objet avec tous les paramètres*/
					$this->id_droit = func_get_arg(0);
					$this->id_groupe = func_get_arg(1);
					break;
			}
		}
		
		function get_id_droit()
		{
			return $this->id_droit;
		}
		
		function set_id_droit($id_droit)
		{
			$this->id_droit = $id_droit;
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