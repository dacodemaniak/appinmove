<?php
/**
 * @name siteStore.class.php Service de mapping de données sur la table des sites
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App\Mappers\Site
 * @version 1.0
**/
namespace App\Mappers\Site;

use wp\Database\Mapper\dataStoreMapper as Store;
use wp\Database\Mapper\dataMapper as Data;

class siteStore extends \wp\Database\Mapper\dataStoreMapper {

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
		->alias("site_id")
		->hydrate();
	
		$column = new Data($this);
		$column->name("content")
		->primary(false)
		->type("text/json")
		->alias("site_content")
		->hydrate();
	}
}