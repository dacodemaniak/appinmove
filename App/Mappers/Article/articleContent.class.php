<?php
/**
 * @name articleContent.class.php Contenu de la clé "editorial" d'un article
 * @author web-Projet.com (contact@web-projet.com) - Oct. 2016
 * @package App\Mappers\Article
 * @version 1.0
 */
namespace App\Mappers\Article;

class articleContent {
	/**
	 * Objet contenant les données de l'éditorial
	 * @var JSONObject
	 */
	private $editorial;
	
	public function __construct($content){
		$this->editorial = $content;
		
	}
	
	/**
	 * Retourne le contenu localisé
	 */
	public function getContent(){
		return $this->editorial->content;
	}
	
	/**
	 * Retourne le source de l'image concernée
	 */
	public function getImageSrc(){
		return $this->editorial->image->src;
	}

	/**
	 * Retourne le source de l'image concernée
	 */
	public function getImageAlt(){
		return $this->extract($this->editorial->image->alt);
	}
	
	/**
	 * Extrait une donnée d'une structure
	 * @param object $data
	 */
	private function extract($data){
		#begin_debug
		#echo "Retourne la donnée avec une localisation définie à : " . \App\appLoader::wp()->defaultLanguage() . "<br />\n";
		#end_debug
		if(is_array($data)){
			if(sizeof($data) == 1){
				return $data[0]->content;
			} else {
				foreach($data as $object){
					if($object->language == \App\appLoader::wp()->defaultLanguage){
						return $object->content;
					}
				}
			}
		}
		if(is_bool($data)){
			return (bool) $data;
		}
	
		if(is_object($data)){
			return $data;
		}
		/**
		 * Il s'agit d'une simple chaîne de caractère
		 */
		return (string) $data;
	}
}