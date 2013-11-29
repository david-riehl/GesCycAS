<?php
	function __autoload($classname)
	{
		$filename = "./kernel/". $classname .".class.php";
		require_once($filename);
	}
	/**
	 * Fonction de récupération de fichiers à partir d'un dossier
	 * @author David RIEHL
	 * @param string $dir
	 * @since 1.0
	 * @return array files
	 */
	function get_files($dir)
	{
		$elements = scandir($dir);
		$files = array();
		foreach($elements as $item)
		{
			if (is_file($dir."/".$item))
			{
				$files[] = $item;
			}
		}
		return $files;
	}

	/**
	 * Fonction d'importation de fichier à partir d'un dossier
	 * @author David RIEHL
	 * @param $directory dossier où se trouve les fichier php à importer
	 * @since 1.0
	 */
	function import_directory($directory)
	{
		$files = get_files($directory);
		
		foreach ($files as $file)
		{
			if(substr($file,strlen($file)-4,4) == '.php')
			{
				require_once($directory."/".$file);
			}
		}
	}

	/**
	 * Fonction dateToFR
	 * @author David RIEHL
	 * @param String $date au format YYYY-MM-DD
	 * @since 1.0
	 * @return string date au format DD/MM/YYYY
	 */
	function dateToFR($date)
	{
		$annee = substr($date,0,4);
		$mois = substr($date,5,2);
		$jour = substr($date,8,2);
		return $jour . "/" . $mois . "/" . $annee;
	}

	/**
	 * Fonction dateToEN
	 * @author David RIEHL
	 * @param String $date au format DD/MM/YYYY
	 * @since 1.1
	 * @return String date au format YYYY-MM-DD
	 */
	function dateToEN($date)
	{
		$annee = substr($date,6,4);
		$mois = substr($date,3,2);
		$jour = substr($date,0,2);
		return $annee . "-" . $mois . "-" . $jour;
	}

	/**
	 * Fonction de génération de date au format français
	 * @author David RIEHL
	 * @param string $dir
	 * @since 1.0
	 * @return array files
	 */
	function gen_date()
	{
		$correspondance['Jour']['Mon']='Lun';
		$correspondance['Jour']['Tue']='Mar';
		$correspondance['Jour']['Wed']='Mer';
		$correspondance['Jour']['Thu']='Jeu';
		$correspondance['Jour']['Fri']='Ven';
		$correspondance['Jour']['Sat']='Sam';
		$correspondance['Jour']['Sun']='Dim';
		
		$correspondance['Mois']['January']='Janvier';
		$correspondance['Mois']['February']='Février';
		$correspondance['Mois']['March']='Mars';
		$correspondance['Mois']['April']='Avril';
		$correspondance['Mois']['May']='Mai';
		$correspondance['Mois']['June']='Juin';
		$correspondance['Mois']['July']='Juillet';
		$correspondance['Mois']['August']='Août';
		$correspondance['Mois']['September']='Septembre';
		$correspondance['Mois']['October']='Octobre';
		$correspondance['Mois']['November']='Novembre';
		$correspondance['Mois']['December']='Décembre';
		
		$date = $correspondance['Jour'][date("D")] . " ";
		$date.= date("j") . " ";
		$date.= $correspondance['Mois'][date("F")] . " ";
		$date.= date("Y") . " à " . date("H:i");
		
		return $date;
	}
?>