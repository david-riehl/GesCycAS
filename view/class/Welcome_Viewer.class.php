<?php
	class Welcome_Viewer extends Viewer
	{
		private static $smarty;
		
		public static function display_default($title, $subtitle, $message)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("title",$title);
			$smarty->assign("subtitle",$subtitle);
			$smarty->assign("message",$message);
			$smarty->display('welcome.tpl');
		}
		
		public static function display_error($message)
		{
			$smarty = parent::init_viewer();
			
			$smarty->assign("error_msg",$message);
			$smarty->display('error.tpl');
		}
	}
?>
