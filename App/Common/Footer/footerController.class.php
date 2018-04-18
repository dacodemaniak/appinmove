<?php
/**
 * @name menuController.class.php Service d'affichage du menu principal
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App\Common\Menu
 * @version 1.0
 */
namespace App\Common\Footer;

use \wp\wp as framework;
use \wp\Controller\controller as Controller;
use \wp\Http\Request\requestData as Request;
use \wp\Http\Response\htmlResponse as Response;

class footerController extends \wp\Controller\controller {

	/**
	 * Options du menu principal de l'application
	 * @var array
	 */
	private $options;
	
	/**
	 * Instance d'un objet de type articlesActiveRecord
	 * @var \App\Mappers\Article\articlesActiveRecord
	 */
	private $adresse;
	
	public function __construct(){
		$this->name = "footer";
		$this->region = "_main_footer";
		
		$this->template();
		
		$this->process();
		
	}

	/**
	 * Retourne l'état des options du menu
	 * @return boolean
	 */
	public function hasOptions(){
		return sizeof($this->options) ? true : false;
	}

	/**
	 * Retourne les options du menu
	 */
	public function options(){
		return $this->options;
	}
	
	/**
	 * Retourne l'enregistrement article spécifique à l'adresse
	 */
	public function adresse(){
		return $this->adresse;
	}
	
	/**
	 * Coeur du contrôleur
	 **/
	protected function process(){
		// Récupérer la collection des éléments de menu de la région _main_menu
		$store = new \App\Mappers\Menu\menuStore();
		$data = $store->get("slug");
		$data->searchValue("main");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$store->addClause($clause);
		
		$categories = new \App\Mappers\Menu\categoriesStore();
		
		$select = new \wp\Database\Query\select($store);
		if($select->nbRows() > 0){
			$datas = $select->select();
			while($option = $datas->fetch()){
				$category = new \App\Mappers\Menu\categoriesActiveRecord($categories);
				foreach($categories->getCollection() as $data){
					$name = $data->selectName();
					$category->{$name} = $option->$name;
				}

				// Restreint l'ajout de la catégorie au fait qu'elle soit ou non enabled
				if($category->sitemap)
					$this->options[] = $category;
			}
		}
		
		// Récupérer les données de contact
		$coords = new \App\Mappers\Article\articlesStore();
		$data = $coords->get("slug");
		$data->searchValue("adresse");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$coords->addClause($clause);
		
		$select = new \wp\Database\Query\select($coords);
		if($select->nbRows() > 0){
			$datas = $select->select();
			$activeRecord = $datas->fetch();
			// Hydrate l'enregistrement courant
			$this->adresse = new \App\Mappers\Article\articlesActiveRecord($coords);
			foreach($coords->getCollection() as $data){
				$name = $data->selectName();
				$this->adresse->{$name} = $activeRecord->$name;
			}			
		}		
	}
	
	/**
	 * Définit le nom de la vue à charger
	 * La vue est stockée dans le dossier _templates du dossier courant
	 **/
	protected function template(){
		$classParts = explode("\\",__CLASS__);
		$class = array_pop($classParts);
		$templateName = substr($class,0,strpos($class,"Controller")) . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/_templates/" . $templateName;
	
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			parent::template();
		}
	}
}