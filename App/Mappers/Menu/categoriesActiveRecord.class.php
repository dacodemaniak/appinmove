<?php
/**
 * @name categoriesActiveRecord.class.php Service de gestion de l'enregistrement actif Catégorie
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App/Common/Mappers/Site
 * @version 1.0
 * @see App/Mappers/Site/categoriesStore
**/
namespace App\Mappers\Menu;

use \wp\wp as framework;
use \wp\Database\dbConnector as dbConnector;
use \App\Mappers\Menu\categoriesStore as Store;
use \wp\Database\Collection\activeRecord;
use \wp\Database\Query\select as Query;


class categoriesActiveRecord extends \wp\Database\Collection\activeRecord {
	
	/**
	 * Détermine la cible du lien vers la route concernée par la catégorie
	 * @var string
	 */
	private $target;
	
	
	/**
	 * Instancie un nouvel objet actif de données du site
	**/
	public function __construct(Store $categories){
		$this->store = $categories;
		$this->target = "_self";
	}
	
	/**
	 * Retourne une donnée active du jeu de résultat
	 * @param string $attributeName
	 */
	public function __get($attributeName){
		
		if(property_exists($this,$attributeName))
			return $this->{$attributeName};

		$content = json_decode($this->cat_content);
		
		if(property_exists($content,$attributeName)){
			if($attributeName == "logo"){
				return $this->logo($content->logo);
			}
			return $this->extract($content->{$attributeName});
		}
		return "/!\\" . $attributeName . "/!\\";
	}

	/**
	 * Instance de méthode pour la récupération de données inconsistante
	 * @param string $method Nom de la méthode sous la forme getProperty
	 * @param array $args Arguments à traiter
	 */
	public function __call($method,$args){
		$propertyName = strtolower(substr($method,3,strlen($method)));
	
		//$content = json_decode($this->article_content);
		$content = json_decode($this->cat_content);
		if(property_exists($content,$propertyName)){
			$data = $content->{$propertyName};
			if(property_exists($data,$args[0])){
				return $this->extract($data->{$args[0]});
			}
		}
	}
	
	/**
	 * Retourne le lien pour la catégorie courante
	 */
	public function toHref(){
		if($this->isActiveCategory()){
			return "#";
		}
		
		if(($route = \App\appLoader::wp()->routeByName($this->__get("cat_route"))) !== false){
			$href = $route->getClassName();
			if(strpos($href, "_assets") !== false){
				$this->target = "_new";
			}
			// Détermine l'URI à partir de la définition de la route
			return $route->getURI($this->__get("cat_slug"));
		}
		
		return "#";
	}
	
	public function target($target=null){
		if(!is_null($target)){
			$this->target = $target;
			return $this;
		}
		return $this->target;
	}
	
	/**
	 * Détermine s'il s'agit de la catégorie courante
	 */
	public function isActiveCategory(){
		#begin_debug
		#echo "Compare : " . \App\appLoader::wp()->request()->getRoute()->name() . " à " . $this->cat_route . "<br />\n";
		#end_debug
		if(\App\appLoader::wp()->request()->getRoute()->name() == $this->cat_route){
			return true;
		}
		return false;
	}

	public function getChildren(){
		if(is_null($this->children))
			$this->setChildren();
		return $this->children;
	}
	
	private function setChildren(){
		$parentCol = null;
		foreach($this->store->getCollection() as $data){
			if($data->name() == "parent"){
				$parentCol = $data->alias();
			}
		}
		if(!is_null($parentCol)){
			// On tente de récupérer les enfants de la ligne courante
			$store = clone $this->store;
			$data = $store->get("parent");
			$data->searchValue($this->cat_id);

			
			$clause = new \wp\Database\Mapper\clause($data);
			$clause->type("equal");
			$store->addClause($clause);
			
			
			$select = new \wp\Database\Query\select($store, false);
			
			if($select->nbRows() > 0){
				$datas = $select->select();
				while($option = $datas->fetch()){
					$category = new \App\Mappers\Menu\categoriesActiveRecord($this->store);
					foreach($store->getCollection() as $data){
						$name = $data->selectName();
						$category->{$name} = $option->$name;
					}
					// Restreint l'ajout de la catégorie au fait qu'elle soit ou non enabled
					if($category->cat_enabled){
						$category->getChildren();
						$this->children[] = $category;
					}
				}
			}
		}
	}
	
	/**
	 * Génère et exécute une requête pour alimenter l'enregistrement produit courant
	 */
	public function query(){
	
		$this->query = new Query($this->store);
		$this->select = $this->query->select();
	
		$record = $this->select->fetch();
	
		if($record){
			$this->activeRecord = true;
			foreach($this->store->getCollection() as $data){
				$name = $data->selectName();
				$data->value($record->$name);
				$this->{$name} = $record->$name;
			}
		}
	}
	
	public function toJSON(){}
	
	/**
	 * Retourne le logo de l'application, avec ou sans retour à l'accueil en fonction du contexte
	 * @param string $source Fichier du logo
	 * @return string
	 */
	private function logo($source){
		$logo					= "";
		
		$appPath = \App\appLoader::wp()->getPathes()->getRootPath("App");
		
		if(file_exists($appPath . "_assets/images/" . $source)){
			$source = "_assets/images/" . $source; 
		} else {
			$source = "_assets/fileRepository/images/" . $source;
		}
		
		// Définit le composant image
		$image = new \wp\Html\Components\Image\imageTag();
		$image->src($source);
		$image->id("logo-orthoscoot");
		$image->cssClass("img-responsive")
			->cssClass("offset-top-left");
		
		$route = \App\appLoader::wp()->request()->getRoute();
		if($route->isDefault()){
			// Pas de lien de retour
			$image->alt($this->__get("title"));
			$source = $image->render();
		} else {
			// Lien de retour
			$image->alt("Retour à l'accueil de " . $this->__get("title"));
			$source = $image->render();
			$link = new \wp\Html\Components\Link\linkTag();
			$link->id("home-orthoscoot")
				->href($source)
				->title("Retour à l'accueil de " . $this->__get("title"));
			$source = $link->render();
		}
		
		return $source;
	}
}