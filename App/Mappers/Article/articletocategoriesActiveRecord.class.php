<?php
/**
 * @name articletocategoriesActiveRecord.class.php Service de gestion de l'enregistrement actif de mapping d'article vers une catégorie
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App/Common/Mappers/Article
 * @version 1.0
 * @see App/Mappers/Article/articlesStore
**/
namespace App\Mappers\Article;

use \wp\wp as framework;
use \wp\Database\dbConnector as dbConnector;
use \App\Mappers\Article\articletocategoriesStore as Store;
use \wp\Database\Collection\activeRecord;
use \wp\Database\Query\select as Query;


class articletocategoriesActiveRecord extends \wp\Database\Collection\activeRecord {
	
	
	/**
	 * Instancie un nouvel objet actif de données du site
	**/
	public function __construct(Store $articletocategories){
		$this->store = $articletocategories;
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
		
		$content = json_decode($this->article_content);
		
		if(property_exists($content,$propertyName)){
			$data = $content->{$propertyName};
			if(property_exists($data,$args[0])){
				return $this->extract($data->{$args[0]});
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
	
}