<?php
class Router
{
	const default_controler = "Welcome";
	const default_action = "default";
	const route_method_name = "route";
	
	private static $controler;
	private static $action;
	private static $parameters;
	private static $URI_root;
	
	public static function get_controler()
	{
		return self::$controler;
	}
	
	public static function get_action()
	{
		return self::$action;
	}
	
	public static function get_parameters()
	{
		return self::$parameters;
	}
	
	public static function get_default_action()
	{
		return self::default_action;
	}
	
	public static function get_URI_root()
	{
		return self::$URI_root;
	}
	
	public static function parse_url()
	{
		$requestURI = explode('/', urldecode($_SERVER['REQUEST_URI']));
		$scriptName = explode('/', urldecode($_SERVER['SCRIPT_NAME']));
		
		for($i= 0;$i < sizeof($scriptName);$i++)
		{
			if ($requestURI[$i] == $scriptName[$i])
			{
				$requestURI_root[]=$requestURI[$i];
				unset($requestURI[$i]);
			}
		}
		
		self::$URI_root = implode('/',$requestURI_root);
		$command = array_values($requestURI);
		
		if(isset($command[0]))
		{
			if($command[0] != "")
			{
				self::$controler = $command[0].'_Controler';
				unset($command[0]);
			}
			else
			{
				self::$controler = self::default_controler;
				if(! empty(self::$controler))
				{
					self::$controler .= '_Controler';
				}
			}
			if(isset($command[1]) && $command[1] != "")
			{
				self::$action = $command[1];
				unset($command[1]);
				self::$parameters = array_values($command);
			}
			else
			{
				self::$action = self::default_action;
				self::$parameters = array();
			}
		}
	}
	
	public static function load_controler()
	{
		global $PARAM;
		$files = get_files($PARAM['folders']['controler']['root']);
		$controlers = array();
		foreach($files as $file)
		{
			$controlers[] = substr($file,0,strlen($file)-10);
		}
		/**
		 * loading the controler
		 */
		if(class_exists(self::$controler) && in_array(self::$controler,$controlers))
		{
			$class_name = self::$controler;
			$method = self::route_method_name;
			if(method_exists($class_name,$method))
			{
				$class_name::$method();
			}
			else
			{
			
				$message = "Controler's dispatch method not defined for `".self::$controler."`.";
				$smarty = Viewer::init_viewer();
				$smarty->assign("error_msg",$message);
				$smarty->display('error.tpl');
			}
		}
		else
		{
			if(self::$controler != "")
			{
				$message = "Unknown `".self::$controler."` controler.";
				$smarty = Viewer::init_viewer();
				$smarty->assign("error_msg",$message);
				$smarty->display('error.tpl');
			}
			else
			{
				$message = "Undefined default controler.";
				$smarty = Viewer::init_viewer();
				$smarty->assign("error_msg",$message);
				$smarty->display('error.tpl');
			}
		}
	}
}
?>