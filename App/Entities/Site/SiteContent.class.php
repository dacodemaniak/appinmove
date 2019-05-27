<?php
/**
* @name SiteContent.class.php Service de récupération des données JSON de l'entité "site"
* @author IDea Factory (dev-team@ideafactory.fr) - Jan. 2018
* @package App\Entities\Site
* @version 0.1.0
**/
namespace App\Entities\Site;

use \wp\Database\Entities\JSONContent\JSONContent as JSON;

class SiteContent extends JSON {
	
	public function __construct(string $content){
		$this->content($content);
	}
	
	/**
	 * Retourne le label associé à l'e-mail
	 * @return string
	 */
	public function getMailLabel(){
		return $this->mailLabel;
	}
	
	/**
	 * Retourne la légende associé à l'e-mail
	 * @return unknown
	 */
	public function getMailLegend(){
		return $this->mailLegende;
	}
}