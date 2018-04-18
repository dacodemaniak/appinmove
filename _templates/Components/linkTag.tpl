{**
* @name image.tpl Affichage d'un composant HTML de type a
* @author web-Projet.com (contact@web-projet.com) - Sept. 2016
* @package Components
* @version 1.0
**}

<a href="{$component->href()}" id="{$component->id()}" title="{$component->title()}" class="{$component->cssClass()}" target="{$component->target()}" {$component->attributes()}>
	{$component->content()}
</a>