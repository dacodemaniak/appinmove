<?php
/**
 * @name index.class.php Instance d'affichage du slider des activités
 * @author web-Projet.com (contact@web-projet.com) - Mai. 2017
 * @package App/Defaut/Activite
 * @version 1.0
**/
namespace App\Defaut\Index\Activite;

use \wp\wp as framework;
use \App\Mappers\Menu\categoriesStore as Categories;
use \wp\Collections\collection as Collection;
use \wp\Collections\item as Item;

class Activites {
	/**
	 * Instance de Store sur les Catégories
	 * @var Categories
	 */
	private $categories;
	
	/**
	 * Collection des catégories à afficher
	 * @var Collection
	 */
	private $collection;
	
	/**
	 * Nom de la vue à charger
	 * @var string
	 */
	private $template;
	
	/**
	 * Insancie le contrôleur par défaut
	 */
	public function __construct(){
		
		$this->template();
		
		$this->categories = new Categories();
		
		// Instancie une nouvelle collection
		$this->collection = new Collection();
		
		$this->process();
	}
	
	/**
	 * Retourne la collection des catégories à afficher
	 * @return \wp\Collections\collection
	 */
	public function getCollection(){
		return $this->collection;
	}
	
	/**
	 * Retourne le nom du template à utiliser
	 * @return string
	 */
	public function getTemplateName(){
		return $this->template;
	}
	/**
	 * Coeur du contrôleur
	 * 	- Instancie le module de gestion des tuiles de réservations
	 * 	- Récupère les articles de la page d'accueil (pavés descriptifs)
	 **/
	protected function process(){
		$data = $this->categories->get("slug");
		$data->searchValue("accueil");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("different");
		$this->categories->addClause($clause);
		
		$data = $this->categories->get("parent");
		$data->searchValue(0);
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$this->categories->addClause($clause);
		
		$select = new \wp\Database\Query\select($this->categories, false);
		
		if($select->nbRows() > 0){
			$datas = $select->select();
			
			while($option = $datas->fetch()){
				$category = new \App\Mappers\Menu\categoriesActiveRecord($this->categories);
				foreach($this->categories->getCollection() as $data){
					$name = $data->selectName();
					$category->{$name} = $option->$name;
				}
				// Restreint l'ajout de la catégorie au fait qu'elle soit ou non enabled
				if($category->cat_enabled){
					$item = new Item($this->collection);
					$item->id($category->slug)
						->value($category)
						->hydrate();
				}
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
		$templateName = "activities" . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/../_templates/" . $templateName;
		
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			die("Le template : " . $templateFilePath . " n'a pas pu être trouvé !");
			parent::template();
		}
	}
	
	private function hydrate(){
		$this->tuiles = new Collection();
		
		$date = clone $this->startDate;
		
		for($semaine = 0; $semaine < sizeof($this->navette->jours); $semaine++){
			for($tours = 0; $tours < sizeof($this->navette->horaires); $tours++){
				$date->setTime($this->navette->horaires[$tours], $this->navette->minute);
				$tuile = new Tuile();
				$tuile->heure($date->format("H:i"))
					->dispos($this->navette->dispo)
					->tourDate($date->format("Y-m-d H:i"))
					->isNearEnd($this->navette->nearAt);
				
				$item = new Item($this->tuiles);
				$item->id($date->format("Y-m-d H:i"));
				$item->value($tuile);
				$item->hydrate();
			}
			
			$date = $this->navette->nextDate($date);
			#begin_debug
			#echo "Next : " . $date->format("d-m-Y H:i") . "<br />\n";
			#end_debug
		}
	}
}