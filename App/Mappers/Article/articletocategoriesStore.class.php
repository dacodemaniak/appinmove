<?php
/**
 * @name articletocategoriesStore.class.php Service de mapping de données sur la structure d'association des articles d'une catégorie
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App\Mappers\Menu
 * @version 1.0
**/
namespace App\Mappers\Article;

use wp\Database\Mapper\dataStoreMapper as Store;
use wp\Database\Mapper\dataMapper as Data;
use wp\Database\Mapper\association as Assoc;

class articletocategoriesStore extends \wp\Database\Mapper\dataStoreMapper {

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
	/**
	 * Retourne un objet de stockage de données par son nom ou alias
	 * @param string $column
	 */
	public function get($column){
		foreach($this->collection as $data){
			if($data->name() == $column){
				return $data;
			}
			if($data->alias() == $column){
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
		->alias("a2c_id")
		->hydrate();

		$column = new Data($this);
		$column->name("order")
		->primary(false)
		->type("smallint")
		->alias("a2c_order")
		->hydrate();
		
		$column = new Data($this);
		$column->name("categories_id")
		->primary(false)
		->type("int")
		->alias("a2c_category")
		->hydrate();

		$column = new Data($this);
		$column->name("articles_id")
		->primary(false)
		->type("int")
		->alias("a2c_article")
		->hydrate();
			
	}
}