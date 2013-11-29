<?php
	class Session_Viewer extends Viewer
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
			$smarty->display('session_list.tpl');
		}
		
		public static function form_open($linked_fields, $erreur, $message="")
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->assign("erreur",$erreur);
			$smarty->assign("message",$message);
			$smarty->display('session_open.tpl');
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
			$smarty->display('session_read.tpl');
		}
		
		public static function form_welcome($linked_item, $linked_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("linked_item",$linked_item);
			$smarty->assign("linked_fields",$linked_fields);
			$smarty->display('session_welcome.tpl');
		}
	}
?>
