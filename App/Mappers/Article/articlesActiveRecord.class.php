<?php
/**
 * @name articlesActiveRecord.class.php Service de gestion de l'enregistrement actif Article
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App/Common/Mappers/Article
 * @version 1.0
 * @see App/Mappers/Article/articlesStore
**/
namespace App\Mappers\Article;

use \wp\wp as framework;
use \wp\Database\dbConnector as dbConnector;
use \App\Mappers\Article\articlesStore as Store;
use \wp\Database\Collection\activeRecord;
use \wp\Database\Query\select as Query;

class articlesActiveRecord extends \wp\Database\Collection\activeRecord {
	
	/**
	 * Collection des éditoriaux de l'article
	 * @var array
	 */
	private $editos;
	
	
	/**
	 * Instancie un nouvel objet actif de données du site
	**/
	public function __construct(Store $article){
		$this->store = $article;
	}
	
	/**
	 * Retourne une donnée active du jeu de résultat
	 * @param string $attributeName
	 */
	public function __get($attributeName){
		if(property_exists($this,$attributeName))
			return $this->{$attributeName};
		
		$content = json_decode($this->article_content);
		
		if(property_exists($content,$attributeName)){
			if($attributeName == "label_tel"){
				return $this->logo($content->logo);
			}
			return $this->extract($content->{$attributeName});
		}
		return "/!\\" . $attributeName . "/!\\";
	}
	
	/**
	 * Retourne l'objet éditorial de l'article à l'indice concerné
	 * @param int $indice
	 * @return \App\Mappers\Article\articleContent
	 */
	public function editorial($indice=0){
		if($indice <= sizeof($this->editos) -1){
			return $this->editos[$indice];
		}
	}
	/**
	 * Instance de méthode pour la récupération de données inconsistante
	 * @param string $method Nom de la méthode sous la forme getProperty
	 * @param array $args Arguments à traiter
	 */
	public function __call($method,$args){
		$propertyName = strtolower(substr($method,3,strlen($method)));
		
		$content = json_decode($this->article_content);
		
		if(property_exists($content,$propertyName)){
			$data = $content->{$propertyName};
			
			if(property_exists($data,$args[0])){
				return $this->extract($data->{$args[0]});
			}
		}
		
		if(property_exists($content,$args[0])){
			return $content->{$args[0]};
		}
	}
	
	/**
	 * Retourne le tableau des données éditoriales
	 */
	public function editos(){
		return $this->editos;
	}
	
	/**
	 * Retourne le tableau des indices des données éditoriales
	 */
	public function editosToNumbers(){
		$numbers = array();
		for($i=0;$i<sizeof($this->editos);$i++){
			$numbers[] = $i;
		}
		@reset($this->editos);
		return $numbers;
	}
	
	/**
	 * Définit le contenu courant, sans passer par une requête préalable
	 * @param Object $record
	 */
	public function setRecord($record){
		if($record){
			$this->activeRecord = true;
			foreach($this->store->getCollection() as $data){
				$name = $data->selectName();
				$data->value($record->$name);
				$this->{$name} = $record->$name;
			}
			if(!is_null($editorials = $this->getContent("editorial"))){
				foreach($editorials as $editorial){
					$this->editos[] = new \App\Mappers\Article\articleContent($editorial);
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
			if(!is_null($editorials = $this->getContent("editorial"))){
				foreach($editorials as $editorial){
					$this->editos[] = new \App\Mappers\Article\articleContent($editorial);
				}
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