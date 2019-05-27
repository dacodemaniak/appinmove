<?php
/**
* @name Sponsors.class.php Service pour la pr�sentation des sponsors    
* @author web-Projet.com (contact@web-projet.com) Juil. 2017
* @package App\Defaut\Index\About
* @version 1.0
**/
namespace App\Defaut\Index\sponsors;

use \wp\wp as framework;

class Sponsors {
	
	/**
	 * Nom de la vue à charger
	 * @var string
	 */
	private $template;
	
	/**
	 * Instance du document spécifique
	 * @var Object
	 */
	private $sponsors;
	
	/**
	 * Insancie le contrôleur par défaut
	 */
	public function __construct(){
		
		$this->template();
		
		
		$this->process();
	}
	
	/**
	 * Retourne le nom du template à utiliser
	 * @return string
	 */
	public function getTemplateName(){
		return $this->template;
	}
	
	/**
	 * Retourne l'instance de l'objet Sponsors
	 * @return \App\Defaut\Index\Sponsors\Object
	 */
	public function get(){
		return $this->sponsors;
	}
	
	/**
	 * Coeur du contrôleur
	 * 	- Instancie le module de gestion des tuiles de réservations
	 * 	- Récupère les articles de la page d'accueil (pavés descriptifs)
	 **/
	protected function process(){
		
		// sponsors
		$sponsors = new \App\Mappers\Article\articlesStore();
		$data = $sponsors->get("slug");
		$data->searchValue("sponsors");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$sponsors->addClause($clause);
		
		$select = new \wp\Database\Query\select($sponsors);
		
		$this->sponsors = new \App\Mappers\Article\articlesActiveRecord($sponsors);

		if($select->nbRows() > 0){
			$datas = $select->select();
			$activeData = $datas->fetch();
			$this->sponsors->setRecord($activeData);
		}
	}
	
	/**
	 * Définit le nom de la vue à charger
	 * La vue est stockée dans le dossier _templates du dossier courant
	 **/
	protected function template(){
		$classParts = explode("\\",__CLASS__);
		$class = array_pop($classParts);
		$templateName = "sponsors" . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/../_templates/" . $templateName;
		
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			die("Le template : " . $templateFilePath . " n'a pas pu être trouvé !");
			parent::template();
		}
	}
}