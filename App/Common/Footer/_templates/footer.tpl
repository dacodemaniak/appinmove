{**
* @name index.tpl Vue pour l'affichage du menu principal de l'application
* @author web-Projet.com (contact@web-projet.com) - Fév. 2017
* @designer web-Projet.com
* @version 1.0
* @see \App\Common\Footer\footerController.class.php
**}
<div id="footer-wrapper" data-region="_main_footer">
	<footer id="main-footer-container" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="container">
		<aside class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-3 hidden-sm hidden-xs">
			<img src="/_assets/images/identite.png" alt="{$site->description}" class="img-responsive" />
		</aside>
		
		<nav id="main-footer-nav" class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-3 col-sm-6 col-xs-12">
			{if $footer->hasOptions()}
				<h3>Plan du site</h3>
				<ul class="menu top horizontal list-unstyled">
					{foreach $footer->options() as $category}
						<li><a href="{$category->toHref()}" title="{$category->title|strip_tags}" data-slug="{$category->cat_route}" target={$category->target()}>{$category->title}</a></li>
					{/foreach}
				</ul>
			{/if}
		</nav>
		
		<!--  Données de contact -->
		<address id="footer-address" class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<h3>{$footer->adresse()->title}</h3>
			<ul itemtype="http://schema.org/Person" class="list-unstyled">
				<li itemprop="name">{$footer->adresse()->name}</li>
				<li itemprop="telephone">{$footer->adresse()->getTelephone("label")} : <a href="tel:{$footer->adresse()->getTelephone("value")}">{$footer->adresse()->getTelephone("value")}</a></li>
				<li itemprop="telephone">{$footer->adresse()->getFixe("label")} : <a href="tel:{$footer->adresse()->getFixe("value")}">{$footer->adresse()->getFixe("value")}</a></li>
				<li itemprop="email">{$footer->adresse()->getMail("label")} : <a href="mailto:{$footer->adresse()->getMail("value")}">{$footer->adresse()->getMail("legende")}</a></li>
				<li><a href="{$footer->adresse()->getFacebook("link")}" title="{$footer->adresse()->getFacebook("label")}" target="_new"><img src="/_assets/images/{$footer->adresse()->getFacebook("icon")}" alt="{$site->title}" /></a>
			</ul>
		</address>
		</div>
	</footer>
</div>