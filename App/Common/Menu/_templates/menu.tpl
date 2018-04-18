{**
* @name menu.tpl Vue pour l'affichage du menu principal de l'application
* @author web-Projet.com (contact@web-projet.com) - Fév. 2017
* @designer web-Projet.com
* @version 1.0
* @see \App\Common\Menu\menu.class.php
**}
<div class="logo col-lg-3 col-md-3 hidden-sm hidden-xs">
	<img src="/_assets/images/identite.png" alt="{$site->description}" class="" />
</div>

<h1 class="titre col-lg-9 col-md-9 hidden-sm hidden-xs pull-right">
	{$site->slogan}
</h1>
			
{if $menu->hasOptions()}
	<nav class="topnav navbar navbar-default col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container-fluid">
			<!-- En-tête du menu //-->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
	        		<span class="sr-only">Afficher / Masquer</span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	      		</button>
	      		<!-- <a class="navbar-brand hidden-sm hidden-xs"><img src="/_assets/images/identite.png" alt="{$site->description}" class="" /></a> -->
			</div>
		
			<div class="collapse navbar-collapse" id="main-menu">
				{function name=toUL}
					<ul class="{if $isChildren}dropdown-menu{else}nav navbar-nav{/if}">
				    	{foreach $items as $item}
				        	{if $item->hasChildren()}
				        		<li class="dropdown">
				        			<a href="#" title="{$item->title|stripTags}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				        				{$item->menutitle|stripTags}
				        				<span class="caret"></span>
				        			</a>
				            		{call name=toUL items=$item->getChildren() isChildren=true}
				            	</li>
				        	{else}
				        		<li>
									<a href="{$item->toHref()}" title="{$item->title|stripTags}" data-slug="{$item->cat_route}" class="{if $item->isActiveCategory()}active{/if}" target="_self">
				        				{$item->menutitle|stripTags}
				        			</a>
				        		</li>
				        	{/if}
				    	{/foreach}
					</ul>
				{/function}
				{call name=toUL items=$menu->options() isChildren=false}
			</div>
		</div>
	</nav>
{/if}