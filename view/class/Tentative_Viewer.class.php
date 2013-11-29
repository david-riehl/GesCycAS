<?php
	class Tentative_Viewer extends Viewer
	{
		private static $smarty;
		
		public static function form_list($item, $linked_item, $item_fields, $linked_fields, $id, $page, $pages)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("linked_item",$linked_item);
			$smarty->assign("item_fields",$item_fields);
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->assign("id",$id);
			$smarty->assign("page",$page);
			$smarty->assign("pages",$pages);
			$smarty->display('tentative_list.tpl');
		}
		
		public static function form_read($item, $linked_item, $item_fields, $linked_fields, $id, $page)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("item",$item);
			$smarty->assign("linked_item",$linked_item);
			$smarty->assign("item_fields",$item_fields);
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->assign("id",$id);
			$smarty->assign("page",$page);
			$smarty->display('tentative_read.tpl');
		}
	}
?>
