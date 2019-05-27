<?php
/**
 * @name index.class.php Instance des pavés de réservation
 * @author web-Projet.com (contact@web-projet.com) - Fév. 2017
 * @package App/Defaut/Reserver
 * @version 1.0
**/
namespace App\Defaut\Index\Reserver;

use \wp\wp as framework;
use \wp\Http\Request\requestData as Request;
use \wp\Collections\collection as Collection;
use \App\Defaut\Index\Reserver\navette as Navette;
use \App\Defaut\Index\Reserver\tuile as Tuile;
use \wp\Collections\item as Item;

class index {
	/**
	 * Contenu des tuiles de base pour la réservation
	 * @var Collection
	 */
	private $tuiles;
	
	/**
	 * Date de départ de la tournée courante
	 * @var \DateTime
	 */
	private $startDate;
	
	/**
	 * Instance de définition des tournées
	 * @var \App\Defaut\Reserver\navette
	 */
	private $navette;
	
	/**
	 * Nom de la vue à charger
	 * @var string
	 */
	private $template;
	
	/**
	 * Insancie le contrôleur par défaut
	 */
	public function __construct(){
		
		$this->template();
		
		$this->navette = new Navette;
		
		$this->process();
	}
	
	public function getTuiles(){
		return $this->tuiles->get();
	}
	
	public function getShortStartDate(){
		return $this->startDate->format("d-m-Y");	
	}
	
	/**
	 * Retourne la date du début de la tournée
	 * @return DateTime
	 */
	public function getStartDate(){
		return $this->startDate->format("d-m-Y H:i");
	}
	
	/**
	 * Retourne l'objet de définition des tournées
	 * @return \App\Defaut\Reserver\navette
	 */
	public function getNavette(){
		return $this->navette;
	}
	
	/**
	 * Retourne le nom du template à utiliser
	 * @return string
	 */
	public function getTemplateName(){
		return $this->template;
	}
	/**
	 * Coeur du contrôleur
	 * 	- Instancie le module de gestion des tuiles de réservations
	 * 	- Récupère les articles de la page d'accueil (pavés descriptifs)
	 **/
	protected function process(){
		$this->startDate = $this->navette->getStartDate();
		
		// Définit la collection des tuiles à afficher
		$this->hydrate();
	}
	
	
	/**
	 * Définit le nom de la vue à charger
	 * La vue est stockée dans le dossier _templates du dossier courant
	 **/
	protected function template(){
		$classParts = explode("\\",__CLASS__);
		$class = array_pop($classParts);
		$templateName = "reserver" . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/../_templates/" . $templateName;
		
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			die("Le template : " . $templateFilePath . " n'a pas pu être trouvé !");
			parent::template();
		}
	}
	
	private function hydrate(){
		$this->tuiles = new Collection();
		
		$date = clone $this->startDate;
		
		for($semaine = 0; $semaine < sizeof($this->navette->jours); $semaine++){
			for($tours = 0; $tours < sizeof($this->navette->horaires); $tours++){
				$date->setTime($this->navette->horaires[$tours], $this->navette->minute);
				$tuile = new Tuile();
				$tuile->heure($date->format("H:i"))
					->dispos($this->navette->dispo)
					->tourDate($date->format("Y-m-d H:i"))
					->isNearEnd($this->navette->nearAt);
				
				$item = new Item($this->tuiles);
				$item->id($date->format("Y-m-d H:i"));
				$item->value($tuile);
				$item->hydrate();
			}
			
			$date = $this->navette->nextDate($date);
			#begin_debug
			#echo "Next : " . $date->format("d-m-Y H:i") . "<br />\n";
			#end_debug
		}
	}
}