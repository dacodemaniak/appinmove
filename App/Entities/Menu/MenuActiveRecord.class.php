<?php
/**
* @name MenuActiveRecord.class.php Définition d'une ligne de la table physique "menu"
* @author IDea Factory (dev-team@ideafactory.com) - Jan. 2018
* @package App\Entities\Menu
* @version 0.1.0
**/

namespace App\Entities\Menu;

use \wp\Database\Entities\ActiveRecord as ActiveRecord;
use \App\Entities\Menu\Menu as Menu;

class SiteActiveRecord extends ActiveRecord {
	
	/**
	 * Constructeur de la classe
	 */
	public function __construct($scheme){
		$this->setScheme($scheme);
	}
	
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