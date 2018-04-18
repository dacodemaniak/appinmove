<?php
/**
 * @name navette.class.php : Instance des constantes de définition des tournées de la navette
 * @author web-Projet.com (contact@web-projet.com) - Fév. 2017
 * @package App\Reserver
 * @version 1.0
**/
namespace App\Defaut\Index\Reserver;

class navette{
	/**
	 * @property array $horaires : Définition des heures des tournées
	 * @property int $minute : Minutes des heures de départ
	 * @property array $jours : Définition des journées des tournées
	 * @property float $cout : Définition du coût d'un trajet
	 * @property int $delta : Delta de temps avant clotûre de la réservation
	 * @property int $nearAt : Délai avant expiration
	 */
	
	/**
	 * Instance de mapping de fichier JSON
	 * @var JSON
	 */
	private $config;
	
	/**
	 * Date et heure de la prochaine tournée
	 * @var \DateTime
	 */
	private $startDate;
	
	/**
	 * Instancie un nouvel objet de configuration de navette
	 */
	public function __construct(){
		$this->config = json_decode(file_get_contents(dirname(__FILE__) . "/_configs/navette.json"));
		$this->startDate = $this->setStartDate();
	}
	
	/**
	 * Date de début de la tournée
	 * @return DateTime
	 */
	public function getStartDate(){
		$horaires = $this->config->horaires;
		
		$firstTime = array_shift($horaires);
		$this->startDate->setTime($firstTime,$this->config->minute);
		return $this->startDate;
	}
	
	/**
	 * Retourne la valeur de la configuration courante
	 * @param string $attributeName
	 * @return null | property
	 */
	public function __get($attributeName){
		if(property_exists($this->config, $attributeName)){
			return $this->config->{$attributeName};
		}
	}
	
	/**
	 * Calcule la journée de la prochaine tournée
	 * @param \DateTime $date
	 * @return \\DateTime
	 */
	public function nextDate(\DateTime $date){
		$jour = $date->format("N");
		
		if($this->in($jour)){
			if($this->isLastDay($jour)){
				$date->add(new \DateInterval("P3D"));
			} else {
				$date->add(new \DateInterval("P1D"));
			}
		} else {
			$jours = $this->config->jours;
			$firstDay = array_shift($jours);
			$offset = 7 - $firstDay->num;
			$date->add(new \DateInterval("P" . $offset . "D"));
		}
		$horaires = $this->config->horaires;
		$time = array_shift($horaires);
		$date->setTime($time,$this->config->minute);
		
		return $date;
	}
	
	/**
	 * Détermine la date de début de la tournée... Premier jour de la semaine courante
	 * 	ou premier jour de la semaine suivante
	 * @return unknown
	 */
	private function setStartDate(){
		$currentDateTime = new \DateTime();
		$jour = $currentDateTime->format("N");
		
		// Contrôler si ce n'est ni un dimanche, ni un samedi, ni un vendredi après 16h45
		if($this->in($jour)){
			if($this->isLastDay($jour)){
				// Contrôle l'heure pour déterminer le jour de départ
				$dateInterval = new \DateInterval("PT" . $this->config->delta . "M");
				$limitTime = $this->setLastWeekDayNavette();
				$limitTime->sub($dateInterval); // Heure courante moins n minutes
				if($currentDateTime >= $limitTime){
					return $currentDateTime->add(new \DateInterval("P3D"));
				}
			} else {
				return $currentDateTime;
			}
		} else {
			// Il s'agit d'un jour hors des journées de navettes
			$jours = $this->config->jours;
			$firstDay = array_shift($jours);
			$offset = $this->compute($jour,$firstDay->num);
			return $currentDateTime->add(new \DateInterval("P" . $offset . "D"));
		}
	}
	
	/**
	 * Calcule la valeur de l'intervalle pour passer du n° du jour courant, au n° du premier jour de la tournée
	 * @param int $currentNumDay
	 * @param int $firstNumDay
	 * @return int Nombre de jours de décalage
	 */
	private function compute($currentNumDay, $firstNumDay){
		$offset = 0;
		do{
			$offset++;
			$currentNumDay++;
			if($currentNumDay >= 7){
				$currentNumDay = 1;
			}
		} while($currentNumDay != $firstNumDay);
		
		return $offset;
	}
	
	/**
	 * Détermine si le jour courant fait partie des jours autorisés
	 * @param int $jour
	 * @return boolean
	 */
	private function in($jour){
		$jours = $this->config->jours;
		
		foreach($jours as $tournee){
			if($tournee->num == $jour){
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Détermine si le jour courant est le dernier jour de la tournée
	 * @param int $jour
	 * @return boolean
	 */
	private function isLastDay($jour){
		$jours = $this->config->jours;
		$lastDay = array_pop($jours);
		
		if($jour == $lastDay->num){
			return true;
		}
		
		return false;
	}
	
	/**
	 * Détermine et retourne l'heure de la dernière tournée de la semaine
	 * @return \DateTime
	 */
	private function setLastWeekDayNavette(){
		$date = new \DateTime();
		$horaires = $this->config->horaires;
		$lastTime = array_pop($horaires);
		$currentDate = $date->format("Y-m-d") . " " . $lastTime . ":00";
		return new \DateTime($currentDate);
	}
	
}