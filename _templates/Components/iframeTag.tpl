{**
* @name iframe.tpl : Modèle pour la génération d'un composant iframe
* @author web-Projet.com (contact@web-projet.com)
* @package Components
* @see \wp\Html\Components\Iframe
* @version 1.0
**}
<iframe src="{$component->src()}" id="{$component->id()}" title="{$component->title()}" class="{$component->cssClass()}" height="{$component->height()}" width="{$component->width()}" {$component->attributes()}>
	{$component->content()}
</iframe>