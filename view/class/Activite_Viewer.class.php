<?php
		class Activite_Viewer extends Viewer
	{
		private static $smarty;
		
		public static function form_list($item, $fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("fields",$fields);
			$smarty->display('activite_list.tpl');
		}
		
		public static function form_create($linked_items, $item_fields, $linked_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("linked_items",$linked_items);
			$smarty->assign("item_fields",$item_fields);
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->display('droit_create.tpl');
		}

		public static function form_read($item, $linked_items, $links, $item_fields, $linked_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("linked_items",$linked_items);
			$smarty->assign("links",$links);
			$smarty->assign("item_fields",$item_fields);
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->display('droit_read.tpl');
		}

		public static function form_update($item, $linked_items, $links, $item_fields, $linked_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("linked_items",$linked_items);
			$smarty->assign("links",$links);
			$smarty->assign("item_fields",$item_fields);
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->display('droit_update.tpl');
		}
		
		public static function form_delete($item)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->display('droit_delete.tpl');
		}
	}
?>
