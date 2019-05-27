<?php
/**
* @name SiteActiveRecord.class.php Définition d'une ligne de la table physique "site"
* @author IDea Factory (dev-team@ideafactory.com) - Jan. 2018
* @package App\Entities\Site
* @version 0.1.0
**/

namespace App\Entities\Site;

use \wp\Database\Entities\ActiveRecord as ActiveRecord;
use \App\Entities\Site\Site as Site;

class SiteActiveRecord extends ActiveRecord {
	
	/**
	 * Constructeur de la classe
	 */
	public function __construct($scheme){
		$this->setScheme($scheme);
	}
	
	/**
	 * @see wp\Entities\CRUD.class.php
	 */
	public function delete() {}
	
	/**
	 * @see wp\Entities\CRUD.class.php 
	 */
	public function save(){}
	
	/**
	 * @see wp\Entities\CRUD.class.php
	 */
	public function insert(){}
	
	/**
	 * @see wp\Entities\CRUD.class.php
	 */
	public function update(string $primaryCol){}
	
	/**
	 * Retourne une instance d'objet de contenu JSON
	 * @return \wp\Database\Entities\JSONContent\JSONContent|boolean
	 */
	protected function getJSONObject(){
		if(($JSONObject = $this->scheme->findByType("jsonObject")) !== false && !is_array($this->scheme->findByType("jsonObject"))){
			$JSONClass = "\\App\\Entities\\Site\\" . $JSONObject->jsonObject();
			
			// Instanciation de la classe
			$JSONContent = new $JSONClass($JSONObject->value());
			
			return $JSONContent;
		}
		
		return false;
	}
}