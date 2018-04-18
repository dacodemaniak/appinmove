<?php
/**
 * @name tuile.class.php Définition d'une tuile de réservation
 * @author web-Projet.com (contact@web-projet.com) - Fév. 2017
 * @package App\Defaut\Index\Reserver
 * @version 1.0
**/
namespace App\Defaut\Index\Reserver;

class tuile {
	/**
	 * Heure de la tournée
	 * @var string
	 */
	private $heure; // Heure de la tournée
	
	/**
	 * Date complète de la tournée jour et heure
	 * @var string
	 */
	private $tourDate;
	
	/**
	 * Nombre de places disponibles
	 * @var int
	 */
	private $dispos; // Nombre de places disponible
	
	/**
	 * Vrai si l'heure est dépassée
	 * @var boolean
	 */
	private $isPasted;
	
	/**
	 * Vrai si l'heure atteint un seuil critique
	 * @var boolean
	 */
	private $isNearEnd;
	
	/**
	 * Définit ou retourne la date complète de la tournée
	 * @param string $date
	 * @return DateTime|\App\Defaut\Index\Reserver\tuile
	 */
	public function tourDate($date=null){
		if(is_null($date)){
			return new \DateTime($this->tourDate);
		}
		$this->tourDate = $date;
		
		$this->isPasted(new \DateTime($date));
		
		return $this;
	}
	
	/**
	 * Retourne le statut dépassé de la tournée courante
	 * @return boolean
	 */
	public function pastedTour(){
		return $this->isPasted;
	}
	
	/**
	 * Définit ou retourne l'heure de la tournée du jour
	 * @param string $heure
	 * @return string|\App\Defaut\Index\Reserver\tuile
	 */
	public function heure($heure=null){
		if(is_null($heure)){
			return $this->heure;
		}
		$this->heure = $heure;
		return $this;
	}
	
	/**
	 * Définit ou retourne le nombre de places disponibles
	 * @param int $dispos
	 * @return unknown|\App\Defaut\Index\Reserver\tuile
	 */
	public function dispos($dispos=null){
		if(is_null($dispos)){
			return $this->dispos;
		}
		$this->dispos = $dispos;
		return $this;
	}
	
	/**
	 * Détermine si l'heure courante est proche de l'heure de la tournée
	 * @param int $nearAt
	 */
	public function isNearEnd($nearAt){
		$currentDateTime = new \DateTime();
		$tourDate = new \DateTime($this->tourDate);
		
		// Retranche $nearDate de l'heure de la tournée
		$tourDate->sub(new \DateInterval("PT" . $nearAt . "M"));
		
		$this->isNearEnd = $currentDateTime >= $tourDate ? true : false;
	}
	
	/**
	 * Retourne le statut de proximité du départ
	 * @return boolean
	 */
	public function getNearEndStatus(){
		return $this->isNearEnd;
	}
	/**
	 * Détermine si la date courante est dépassée
	 * @param \DateTime $date
	 */
	private function isPasted(\DateTime $date){
		$this->isPasted = false;
		
		$currentDateTime = new \DateTime();
		if($currentDateTime >= $date){
			$this->isPasted = true;
		}
		
		return;
	}
}