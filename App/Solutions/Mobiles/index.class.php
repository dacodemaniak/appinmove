<?php
/**
 * @name index.class.php Contrôleur de la page Solutions/Mobiles
 * @author web-Projet.com (contact@web-projet.com) - Juil 2016
 * @package App/Solutions/Mobiles
 * @version 1.0
**/
namespace App\Solutions\Mobiles;

use \wp\wp as framework;
use \wp\Controller\controller as Controller;
use \wp\Http\Request\requestData as Request;
use \App\Defaut\Index\Activite\Activites as Activites;
use \App\Defaut\Index\About\About as About;
use \App\Defaut\Index\Contact\Contact as Contact;

class index extends \wp\Controller\controller {
	
	/**
	 * Insancie le contrôleur par défaut
	 * @param Request $data
	 */
	public function __construct(){
		
		
		$this->name = "index";
		
		$this->pageClass = "index";
		
		$this->template();
		
		$this->process();
	}
	
	/**
	 * Coeur du contrôleur
	 * 	- Instancie le module d'affichage des grands thèmes définis
	 **/
	protected function process(){

	}
	
	/**
	 * Définit le nom de la vue à charger
	 * La vue est stockée dans le dossier _templates du dossier courant
	 **/
	protected function template(){
		$classParts = explode("\\",__CLASS__);
		$class = array_pop($classParts);
		$templateName = "index" . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/_templates/" . $templateName;
		
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			die("Le template : " . $templateFilePath . " n'a pas pu être trouvé !");
			parent::template();
		}
	}
}