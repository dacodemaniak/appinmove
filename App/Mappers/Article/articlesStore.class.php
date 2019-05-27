<?php
/**
 * @name articlesStore.class.php Service de mapping sur la table des articles
 * @author web-Projet.com (contact@web-projet.com)
 * @package App\Mappers\Article
 * @version 1.0
 */
namespace App\Mappers\Article;

use wp\Database\Mapper\dataStoreMapper as Store;
use wp\Database\Mapper\dataMapper as Data;
use wp\Database\Mapper\association as Assoc;

class articlesStore extends \wp\Database\Mapper\dataStoreMapper {

	/**
	 * Instancie un nouveau Mapper de données
	 */
	public function __construct(){
		// Détermine le nom du Store à partir du nom de la classe elle-même
		$storeName = $this->name();

		$this->scheme();
	}
	/**
	 * Expose la méthode alias parente
	 * @param unknown $alias
	 */
	public function alias($alias=null){
		return parent::alias($alias);
	}

	/**
	 * Retourne un objet de stockage de données par son nom ou alias
	 * @param string $column
	 */
	public function get($column){
		foreach($this->collection as $data){
			if($data->name() == $column){
				return $data;
			}
		}
	}

	/**
	 * Définit les éléments de stockage du Store
	 */
	private function scheme(){
		$column = new Data($this);
		$column->name("id")
		->primary(true)
		->type("int")
		->maxLength(64)
		->alias("article_id")
		->hydrate();

		$column = new Data($this);
		$column->name("slug")
		->primary(false)
		->type("varchar")
		->alias("article_slug")
		->hydrate();

		$column = new Data($this);
		$column->name("content")
		->primary(false)
		->type("text/json")
		->alias("article_content")
		->hydrate();
		
	}
}