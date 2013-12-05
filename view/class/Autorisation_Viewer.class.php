<?php
	class Autorisation_Viewer extends Viewer
	{
		private static $smarty;
		
		public static function form_update($left_items, $right_items, $links, $left_fields, $right_fields)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("left_items",$left_items);
			$smarty->assign("right_items",$right_items);
			$smarty->assign("links",$links);
			$smarty->assign("left_fields",$left_fields);
			$smarty->assign("right_fields",$right_fields);
			$smarty->display('autorisation_update.tpl');
		}
	}
?>
