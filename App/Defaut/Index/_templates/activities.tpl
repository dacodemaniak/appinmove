{**
* @name activities.tpl : Affichage du slider d'activités
* @param $index : Toutes les activités
**}

{** Affichage de la liste des items **}
<div id="activities" class="carousel slide" data-ride="carousel" data-interval="6000">
	<!-- Indicateurs nécessaires pour l'affichage des images -->
	<ol class="carousel-indicators">
		{foreach $index->getCollection() as $item}
			<li {if $index->getCollection()->getIndice() == 0} class="active"{/if} data-target="#activities" data-slide-to="{$index->getCollection()->getIndice()}"></li>
		{/foreach}
	</ol>
	
	<!-- Conteneur des slides eux-même //-->
	<div class="carousel-inner" role="listbox">
		{foreach $index->getCollection() as $item}
			<div class="item {if $index->getCollection()->getIndice() == 0} active{/if}">
				<img src="./_assets/images/slider/{$item->image}" alt="{$item->pagetitle}" />
				<div class="carousel-caption animated fadeInUpBig">
					{$item->abstract}
					<a href="#" class="btn btn-default more" role="button" title="{$item->pagetitle} - En savoir plus">Découvrez notre offre <i class="glyphicon glyphicon-share-alt"></i></a>
				</div>
			</div>
		{/foreach}
	</div>
</div>
