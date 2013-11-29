<?php
	class Viewer
	{
		private static $smarty;
		private static $debug_mode = false;
		private static $debug_var;
		private static $debug_msg;
		private static $warning_msg;
		private static $error_msg;
		
		private static function get_func_argnames($funcName) {
			$f = new ReflectionMethod('Viewer',$funcName);
			$result = array();
			foreach ($f->getParameters() as $param) {
				$result[] = $param->name;   
			}
			return $result;
		}
		
		public static function debug(&$var,$varname="unknonw variable name")
		{
			$caller = debug_backtrace();
			self::$debug_var[] = array('var_name'=>$varname,'var_dump'=>print_r($var,true),'file'=>$caller[0]['file'],'line'=>$caller[0]['line']);
		}

		public static function debug_msg($msg)
		{
			$caller = debug_backtrace();
			self::$debug_msg[] = array('msg'=>$msg,'file'=>$caller[0]['file'],'line'=>$caller[0]['line']);
		}
		
		public static function warning_msg($msg,$origin="",$line="")
		{
			$caller = debug_backtrace();
			self::$warning_msg[] = array('msg'=>$msg,'file'=>$caller[0]['file'],'line'=>$caller[0]['line']);
		}

		public static function error_msg($msg,$origin="",$line="")
		{
			$caller = debug_backtrace();
			self::$error_msg[] = array('msg'=>$msg,'file'=>$caller[0]['file'],'line'=>$caller[0]['line']);
		}

		public static function start_debug_mode()
		{
			self::$debug_mode = true;
		}

		public static function stop_debug_mode()
		{
			self::$debug_mode = false;
		}
		
		public static function init_viewer()
		{
			global $PARAM;
			self::$smarty = new Smarty;
			//$smarty->force_compile = true;
			self::$smarty->template_dir = $PARAM['folders']['view']['templates'];
			self::$smarty->compile_dir = $PARAM['folders']['plugins']['smarty'].'/'.'templates_c';
			self::$smarty->config_dir = $PARAM['folders']['plugins']['smarty'].'/'.'configs';
			
			// $smarty->debugging = true;
			// $smarty->caching = true;
			// $smarty->cache_lifetime = 120;
			self::$smarty->caching = false;
			self::$smarty->cache_lifetime = 0;
			
			self::$smarty->assign("head_title", $PARAM['html']['title']);
			self::$smarty->assign("generator", 'D. [R]iehl Framework 1.1');
			self::$smarty->assign("head_charset", $PARAM['html']['charset']);
			
			foreach($PARAM['html']['meta'] as $name => $content)
			{
				$metas[] = array('name' => $name, 'content' => $content);
			}
			self::$smarty->assign("head_metas", $metas);
			// $smarty->assign("Name","Fred Irving Johnathan Bradley Peppergill",true);
			
			$folder = $PARAM['folders']['scripts']['css'];
			$files = get_files($folder);
			$styles = array();
			foreach ($files as $file)
			{
				if(strtolower(substr($file,strlen($file)-4,4)) == ".css")
				{
					$styles[] = $folder.'/'.$file;
				}
			}
			self::$smarty->assign("head_styles", $styles);
			
			$folder = $PARAM['folders']['scripts']['javascript'];
			$files = get_files($folder);
			$scripts = array();
			foreach ($files as $file)
			{
				if(strtolower(substr($file,strlen($file)-3,3)) == ".js")
				{
					$scripts[] = $folder.'/'.$file;
				}
			}
			self::$smarty->assign("head_scripts", $scripts);
			
			self::$smarty->assign("head_favicon", is_file('favicon.ico'));

			self::$smarty->assign("debug_mode", self::$debug_mode);
			self::$smarty->assign("debug_var", self::$debug_var);
			self::$smarty->assign("debug_msg", self::$debug_msg);
			self::$smarty->assign("warning_msg", self::$warning_msg);
			self::$smarty->assign("error_msg", self::$error_msg);
			
			self::$smarty->assign("URI_root", Router::get_URI_root());

			self::$smarty->assign("banner_title", $PARAM['application']['name']);
			self::$smarty->assign("copyright", $PARAM['html']['meta']['copyright']);
			
			if(isset($_SESSION['droits']))
			{
				self::$smarty->assign("droits", $_SESSION['droits']);
			}
			if(isset($_SESSION['connected']))
			{
				self::$smarty->assign("connected", $_SESSION['connected']);
			}
			return self::$smarty;
		}
		
		public static function error($msg)
		{
			self::$smarty = self::init_viewer();
			
			self::$smarty->assign("error_msg",$msg);
			self::$smarty->display('error.tpl');
		}
	}
?>
