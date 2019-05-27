<?php
/**
 * @name siteActiveRecord.class.php Service de gestion de l'enregistrement actif Site
 * @author web-Projet.com (contact@web-projet.com) - Sept. 2016
 * @package App/Common/Mappers/Site
 * @version 1.0
 * @see App/Mappers/Site/siteMapper
**/
namespace App\Common\Mappers\Site;

use \wp\wp as framework;
use \wp\Database\dbConnector as dbConnector;
use \App\Mappers\Site\siteStore as Store;
use \wp\Database\Collection\activeRecord;
use \wp\Database\Query\select as Query;


class siteActiveRecord extends \wp\Database\Collection\activeRecord {
	
	/**
	 * Instancie un nouvel objet actif de données du site
	**/
	public function __construct(Store $site){
		$this->store = $site;
		$this->id(1);
	}
	
	/**
	 * Retourne une donnée active du jeu de résultat
	 * @param string $attributeName
	 */
	public function __get($attributeName){
		if(property_exists($this,$attributeName))
			return $this->{$attributeName};

		$content = json_decode($this->site_content);
		
		if(property_exists($content,$attributeName)){
			if($attributeName == "logo"){
				return $this->logo($content->logo);
			}
			if($attributeName == "badge"){
				return $this->badge($content->badge);
			}
			
			if($attributeName == "keywords"){
				return implode(",", $this->extract($content->{$attributeName}));
			}
			if($attributeName == "mail"){
				return $this->mail($content->mail);
			}
			
			if($attributeName == "telephone"){
				return $this->telephone($content->telephone);
			}
			
			return $this->extract($content->{$attributeName});
		}
		

		
		return "/!\\" . $attributeName . "/!\\";
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
	
	/**
	 * Retourne le logo de l'application, avec ou sans retour à l'accueil en fonction du contexte
	 * @param string $source Fichier du logo
	 * @return string
	 */
	private function logo($source){
		$logo					= "";
		
		$appPath = \App\appLoader::wp()->getPathes()->getRootPath("App");
		
		if(file_exists($appPath . "_assets/images/" . $source)){
			$source = "/_assets/images/" . $source; 
		} else {
			$source = "/_assets/fileRepository/images/" . $source;
		}
		
		// Définit le composant image
		$image = new \wp\Html\Components\Image\imageTag();
		$image->src($source);
		$image->id("logo-business-strategy-partners");
		$image->cssClass("img-responsive")
			->cssClass("offset-top-left");
		
		$route = \App\appLoader::wp()->request()->getRoute();
		if($route->isDefault()){
			// Pas de lien de retour
			$image->alt($this->__get("title"));
			$source = $image->render();
		} else {
			// Lien de retour
			$image->alt("Retour à l'accueil de " . $this->__get("title"));
			$source = $image->render();
			$link = new \wp\Html\Components\Link\linkTag();
			$link->id("home-business-strategy-partners")
				->href("/")
				->content($source)
				->title("Retour à l'accueil de " . $this->__get("title"));
			$source = $link->render();
		}
		
		return $source;
	}
	
	/**
	 * Retourne le badge de l'application, avec ou sans retour à l'accueil en fonction du contexte
	 * @param string $source Fichier de badge
	 * @return string
	 */
	private function badge($source){
		$logo					= "";
	
		$appPath = \App\appLoader::wp()->getPathes()->getRootPath("App");
	
		if(file_exists($appPath . "_assets/images/" . $source)){
			$source = "/_assets/images/" . $source;
		} else {
			$source = "/_assets/fileRepository/images/" . $source;
		}
	
		// Définit le composant image
		$image = new \wp\Html\Components\Image\imageTag();
		$image->src($source);
		$image->id("badge-lowcost");
		$image->cssClass("img-responsive");
	
		$route = \App\appLoader::wp()->request()->getRoute();
		if($route->isDefault()){
			// Pas de lien de retour
			$image->alt($this->__get("title"));
			$source = $image->render();
		} else {
			// Lien de retour
			$image->alt("Retour à l'accueil de " . $this->__get("title"));
			$source = $image->render();
			$link = new \wp\Html\Components\Link\linkTag();
			$link->id("home-lowcost")
			->href("/")
			->content($source)
			->title("Retour à l'accueil de " . $this->__get("title"))
			->addAttribute("role","button");
			$source = $link->render();
		}
	
		return $source;
	}
	
	/**
	 * Retourne la structure complète de l'affichage de l'adresse e-mail
	 * @param object $source
	 * @return string
	 */
	private function mail($source){
		$output = "";
		
		$output .= "<i class=\"icon-pencil\"></i>";
		$output .= " <a href=\"mailto:" . $this->getMail("value"). "?subject=\"" . $this->getMail("subject") . "\">";
		$output .= $this->getMail("value");
		$output .= "</a>";
		
		return $output;
	}
	
	/**
	 * Retourne la structure complète de l'affichage du téléphone
	 * @param object $source
	 * @return string
	 */
	private function telephone($source){
		$output = "";
		
		$output .= "<i class=\"icon-phone\"></i>";
		$output .= " <a href=\"tel:" . $this->getTelephone("value"). "\">";
		$output .= $this->getTelephone("value");
		$output .= "</a>";
		
		return $output;
	}
}