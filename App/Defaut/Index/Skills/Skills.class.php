<?php
/**
* @name Skills.class.php Service pour la pr�sentation des comp�tences de l'entreprise
* @author web-Projet.com (contact@web-projet.com) Juil. 2017
* @package App\Defaut\Index\About
* @version 1.0
**/
namespace App\Defaut\Index\Skills;

use \wp\wp as framework;
use wp\Collections\collection;
use \wp\Collections\item as Item;

class Skills {
    /**
     * Collection des catégories à afficher
     * @var Collection
     */
    private $collection;
    
	/**
	 * Nom de la vue à charger
	 * @var string
	 */
	private $template;
	
	private $bootstrapCols = [
	    "lg" => 12,
	    "md" => 12,
	    "sm" => 12,
	    "xs" => 12
	];
	
	/**
	 * Instance du document spécifique
	 * @var Object
	 */
	private $skills;
	
	/**
	 * Insancie le contrôleur par défaut
	 */
	public function __construct(){
		
		$this->template();
		
		$this->collection = new Collection();
		
		$this->process();
	}
	
	/**
	 * Retourne le nom du template à utiliser
	 * @return string
	 */
	public function getTemplateName(){
		return $this->template;
	}
	
	/**
	 * Retourne la collection des articles à traiter
	 * @return \wp\Collections\collection
	 */
	public function getCollection(){
	    return $this->collection;
	}
	
	/**
	 * Retourne la répartition de colonnes Bootstrap
	 * @param string $media
	 * @return number
	 */
	public function getBootstrapCols($media){
	    return $this->bootstrapCols[$media];
	}
	
	/**
	 * Retourne l'instance de l'objet Skills
	 * @return \App\Defaut\Index\Skills\Object
	 */
	public function get(){
		return $this->skills;
	}
	
	/**
	 * Coeur du contrôleur
	 * 	- Instancie le module de gestion des tuiles de réservations
	 * 	- Récupère les articles de la page d'accueil (pavés descriptifs)
	 **/
	protected function process(){
		
		// skills
		$skills = new \App\Mappers\Article\articlesStore();
		$data = $skills->get("slug");
		$data->searchValue("skills");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$skills->addClause($clause);
		
		$select = new \wp\Database\Query\select($skills);
		
		$this->skills = new \App\Mappers\Article\articlesActiveRecord($skills);

		if($select->nbRows() > 0){
		    $datas = $select->select();
		    $activeData = $datas->fetch();
		    $activeRecord->setRecord($activeData);
		    $item = new Item($this->collection);
		    $item->id($activeRecord->article_slug)
		    ->value($activeRecord)
		    ->hydrate();
		}
		
		// Article Appli
		$about = new \App\Mappers\Article\articlesStore();
		$data = $about->get("slug");
		$data->searchValue("appli");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$about->addClause($clause);
		
		$select = new \wp\Database\Query\select($about);
		
		$activeRecord = new \App\Mappers\Article\articlesActiveRecord($about);
		
		if($select->nbRows() > 0){
		    $datas = $select->select();
		    $activeData = $datas->fetch();
		    $activeRecord->setRecord($activeData);
		    $item = new Item($this->collection);
		    $item->id($activeRecord->article_slug)
		    ->value($activeRecord)
		    ->hydrate();
		}
		
		// Article agilité
		$about = new \App\Mappers\Article\articlesStore();
		$data = $about->get("slug");
		$data->searchValue("agilite");
		$clause = new \wp\Database\Mapper\clause($data);
		$clause->type("equal");
		$about->addClause($clause);
		
		$select = new \wp\Database\Query\select($about);
		
		$activeRecord = new \App\Mappers\Article\articlesActiveRecord($about);
		
		if($select->nbRows() > 0){
		    $datas = $select->select();
		    $activeData = $datas->fetch();
		    $activeRecord->setRecord($activeData);
		    $item = new Item($this->collection);
		    $item->id($activeRecord->article_slug)
		    ->value($activeRecord)
		    ->hydrate();
		}
		
		$this->bootstrapCols["lg"] = 12 / $this->collection->length();
		$this->bootstrapCols["md"] = 12 / $this->collection->length();
		
	}
	
	/**
	 * Définit le nom de la vue à charger
	 * La vue est stockée dans le dossier _templates du dossier courant
	 **/
	protected function template(){
		$classParts = explode("\\",__CLASS__);
		$class = array_pop($classParts);
		$templateName = "skills" . \App\appLoader::$tpl->extension();
		$templateFilePath = str_replace("\\","/",__NAMESPACE__) . "/../_templates/" . $templateName;
		
		if(file_exists(framework::getWp()->getPathes()->getRootPath("App").$templateFilePath)){
			//$this->template = "file:/" . framework::getWp()->getPathes()->getRootPath("App") . $templateFilePath;
			$this->template = \App\appLoader::wp()->templateEngine()->absolutePath($templateFilePath);
		} else {
			die("Le template : " . $templateFilePath . " n'a pas pu être trouvé !");
			parent::template();
		}
	}
}