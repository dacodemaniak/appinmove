<?php
/**
 * @name index.class.php Contrôleur de la page d'accueil par défaut de l'application
 * @author web-Projet.com (contact@web-projet.com) - Juil 2016
 * @package App/Default/Index
 * @version 1.0
**/
namespace App\Defaut\Index;

use \wp\wp as framework;
use \wp\Controller\controller as Controller;
use \wp\Http\Request\requestData as Request;
use \App\Defaut\Index\Activite\Activites as Activites;
use \App\Defaut\Index\About\About as About;
use \App\Defaut\Index\Contact\Contact as Contact;

use \wp\Database\Entities\ActiveRecords as ActiveRecords;
use \App\Entities\Site\SiteEntity as Site;
use \App\Entities\Site\SiteActiveRecord as SiteActiveRecord;
use App\Defaut\Index\sponsors\Sponsors;
use App\Defaut\Index\Skills\Skills;


class index extends \wp\Controller\controller {
	/**
	 * Instance des activités
	 * @var \Activites
	 */
	private $activities;

	/**
	 * Instance d'un objet de type articlesActiveRecord
	 * @var \About
	 */
	private $about;
	
	/**
	 * Instance d'un objet de type Contact
	 * @var \Contact
	 */
	private $contact;
	
	/**
	 * Insancie le contrôleur par défaut
	 * @param Request $data
	 */
	public function __construct(){
		
		
		$this->name = "index";
		
		$this->pageClass = "index";
		
		$this->template();
		
		// Pour test, instance de l'entité SiteEntity
		$site = new Site();
		$site->id = 1;
		$sites = new ActiveRecords($site);
		$sites->findBy();
		/* @begin_use_entity
		echo $sites->length() . " lignes dans la table !";
		$site = $sites->get(); // Récupère l'ActiveRecord
		echo "<br>id : " . $site->id;
		echo "<br>Téléphone : " . $site->telephoneValue;
		echo "<br>Titre : " . $site->title;
		echo "<br>E-Mail :" . $site->getMailLegend();
		*/
		$this->process();
	}
	
	/**
	 * Retourne la collection des objets du slider
	 * @return \wp\Collections\collection
	 */
	public function getCollection(){
		return $this->activities->getCollection();
	}
	
	/**
	 * Retourne l'objet des activités
	 * @return object|\App\Defaut\Index\App\Defaut\Index\Activite\index
	 */
	public function getActivities(){
		return $this->activities;
	}

	/**
	 * Retourne l'enregistrement article spécifique A propos de
	 */
	public function getAbout(){
		return $this->about;
	}
	
	/**
	 * Retourne l'instance de l'objet Contact
	 * @return Contact
	 */
	public function getContact(){
		return $this->contact;
	}
	
	/**
	 * Coeur du contrôleur
	 * 	- Instancie le module d'affichage des grands thèmes définis
	 **/
	protected function process(){
		$this->activities = new \App\Defaut\Index\Activite\Activites();
		
		$this->about = new \App\Defaut\Index\About\About();
		
		$this->skills = new Skills();
		
		$this->team = new Team();
		
		$this->sponsors = new Sponsors();
	}
	
	/**
	 * Définit le nom de la vue à charger
	 * La vue est stockée dans le dossier _templates du dossier courant
	 **/
	protected function template(){
		$classParts = explode("\\",__CLASS__);
		$class = array_pop($classParts);
		$templateName = "index" . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/_templates/" . $templateName;
		
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			die("Le template : " . $templateFilePath . " n'a pas pu être trouvé !");
			parent::template();
		}
	}
}