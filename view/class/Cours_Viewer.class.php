<?php
	class Cours_Viewer extends Viewer
	{
		private static $smarty;
		
		public static function form_list($item, $fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("fields",$fields);
			$smarty->display('cours_list.tpl');
		}
		
		public static function form_create($item_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item_fields",$item_fields);
			$smarty->display('cours_create.tpl');
		}

		public static function form_read($item)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->display('cours_read.tpl');
		}

		public static function form_update($item, $item_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("item_fields",$item_fields);
			$smarty->display('cours_update.tpl');
		}
		
		public static function form_delete($item)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->display('cours_delete.tpl');
		}
	}
?>