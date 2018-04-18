{**
* @name buttonTag.tpl Affichage d'un composant HTML de type button
* @author web-Projet.com (contact@web-projet.com) - Sept. 2016
* @package Components
* @version 1.0
**}

<button type="{$component->type()}" id="{$component->id()}" title="{$component->title()}" class="{$component->cssClass()}" {$component->attributes()}>
	{$component->content()}
</button>