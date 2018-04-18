{**
* @name image.tpl Affichage d'un composant HTML de type image
* @author web-Projet.com (contact@web-projet.com) - Sept. 2016
* @package Components
* @version 1.0
**}

<img src="{$component->src()}" id="{$component->id()}" alt="{$component->alt()}" class="{$component->cssClass()}" {$component->attributes()}/>