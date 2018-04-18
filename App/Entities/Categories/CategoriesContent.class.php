<?php
/**
* @name CategoriesContent.class.php Service de récupération des données JSON de l'entité "categories"
* @author IDea Factory (dev-team@ideafactory.fr) - Jan. 2018
* @package App\Entities\Site
* @version 0.1.0
**/
namespace App\Entities\Categories;

use \wp\Database\Entities\JSONContent\JSONContent as JSON;

class CategoriesContent extends JSON {
	
	public function __construct(string $content){
		$this->content($content);
	}
}