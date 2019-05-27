<?php
/**
* @name CategoriesEntity.class.php Mapping de l'entité "categories"
* @author IDea Factory (dev-team@ideafactory.fr) - Jan. 2018
* @package App\Entities\Category
* @version 0.1.0
**/

namespace App\Entities\Categories;

use \wp\Database\Entities\Transitive as Entity;
use \wp\Database\Entities\Columns\Columns as Columns;
use \wp\Database\Entities\Columns\Column as Column;
use \App\Entities\Categories\CategoriesActiveRecord as ActiveRecord;

class CategoriesEntity extends Entity {
	
	/**
	 * Constructeur de l'entité courante
	 * 	- Détermine le nom de l'entité physique à partir du nom de la classe
	 * 	- Définit le schéma de la classe
	 */
	public function __construct(){
		$classPath = explode("\\", __CLASS__);
		$className = array_pop($classPath);
		
		$this->name(strtolower(substr($className,0, -6)))
		->alias(strtoupper(substr($this->name(),0,1)));
		
		$this->columns = new Columns();
		
		$this->setScheme();
	}
	
	/**
	 * Retourne une nouvelle instance d'enregistrement actif
	 * @return \App\Entities\Site\SiteActiveRecord
	 */
	public function getActiveRecordInstance(){
		return new ActiveRecord($this->columns);
	}
	
	/**
	 * Retourne la collection des colonnes de l'entité courante
	 * @return \wp\Database\Entities\Columns\Columns
	 */
	public function getScheme(){
		return $this->columns;
	}
	
	/**
	 * Définit l'instance de l'entité courante
	 */
	protected function getParentEntity(){
		if(is_null($this->parentEntity)){
			$entityName = $this->columns->findByType("parentEntity");
		
			$entityParts = \wp\Helpers\String\Helper::camelToArray($entityName);
			
			$entityRoot = ucfirst($entityParts[0]);
			
			$fullQualifiedNamespace = "\\App\\Entities\\" . $entityRoot . "\\";
			
			$qualifiedClassName = $fullQualifiedNamespace . $entityRoot;
			
			$this->parentEntity = new $qualifiedClassName();
		}
		
		return $this->parentEntity;
		
	}
	
	/**
	 * Définit le schéma de l'entité courante
	 * @return void
	 */
	protected function setScheme(){
		$column = new Column();
		$column->name("id")
		->alias($this->name . "_" . $column->name())
		->type("int")
		->primary(true)
		->auto(true);
		$this->hydrate($column);

		$column = new Column();
		$column->name("slug")
		->alias($this->name . "_" . $column->name())
		->type("varchar")
		->length(255)
		->nullAuto(false);
		$this->hydrate($column);

		$column = new Column();
		$column->name("route")
		->alias($this->name . "_" . $column->name())
		->type("varchar")
		->length(255)
		->nullAuto(false);
		$this->hydrate($column);
		
		$column = new Column();
		$column->name("content")
		->alias($this->name . "_" . $column->name())
		->type("longtext")
		->nullAuto(false)
		->jsonObject("CategoriesContent");
		$this->hydrate($column);
		
		$column = new Column();
		$column->name("enabled")
		->alias($this->name . "_" . $column->name())
		->type("smallint")
		->nullAuto(false);
		$this->hydrate($column);
		
		$column = new Column();
		$column->name("created_at")
		->alias($this->name . "_" . $column->name())
		->type("timestamp")
		->nullAuto(false);
		$this->hydrate($column);
		
		$column = new Column();
		$column->name("updated_at")
		->alias($this->name . "_" . $column->name())
		->type("timestamp")
		->nullAuto(false);
		$this->hydrate($column);
		
		$column = new Column();
		$column->name("parent")
		->alias($this->name . "_" . $column->name())
		->type("int")
		->parentEntity("CategoriesEntity")
		->nullAuto(false);
		$this->hydrate($column);
		
	}
}