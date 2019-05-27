<?php
/**
 * @name categoriesStore.class.php Service de mapping de données sur la structure de gestion des catégories
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App\Mappers\Menu
 * @version 1.0
**/
namespace App\Mappers\Menu;

use wp\Database\Mapper\dataStoreMapper as Store;
use wp\Database\Mapper\dataMapper as Data;
use wp\Database\Mapper\association as Assoc;

class categoriesStore extends \wp\Database\Mapper\dataStoreMapper {

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
		->alias("cat_id")
		->hydrate();

		$column = new Data($this);
		$column->name("slug")
		->primary(false)
		->type("varchar")
		->alias("cat_slug")
		->hydrate();

		$column = new Data($this);
		$column->name("route")
		->primary(false)
		->type("varchar")
		->alias("cat_route")
		->hydrate();

		$column = new Data($this);
		$column->name("enabled")
		->primary(false)
		->type("varchar")
		->alias("cat_enabled")
		->hydrate();
		
		$column = new Data($this);
		$column->name("parent")
		->primary(false)
		->type("int")
		->alias("cat_parent")
		->hydrate();
		
		$column = new Data($this);
		$column->name("content")
		->primary(false)
		->type("text/json")
		->alias("cat_content")
		->hydrate();
		
		// Ajoute l'association entre les tables
		$association = new Assoc();
		$association->mainStore(new \App\Mappers\Article\articletocategoriesStore())
		->associationStore(new \App\Mappers\Article\articletocategoriesStore())
		->mainStore($this)
		->secondaryStore(new \App\Mappers\Article\articlesStore());
		$this->relations[] = $association;
		
	}
}