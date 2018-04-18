	<section id="about" class="row inner-section">
		<header>
			<h2><span>Business</span> & Strategy Partners</h2>
		</header>
		
		<div class="container">

			<!-- Boucle sur les articles concernés About //-->
			
			{foreach from=$index->getCollection()->get() key=key item=about}
				<div class="col-lg-{$index->getBootstrapCols("lg")} col-md-{$index->getBootstrapCols("md")} col-sm-{$index->getBootstrapCols("sm")} col-xs-{$index->getBootstrapCols("xs")}">
					<article>
						<header class="{$about->value()->cssClass}">
							<h3><i class="glyphicon glyphicon-{$about->value()->icon}"></i> {$about->value()->subtitle}</h3>
						</header>
					
						<p>{$about->value()->accroche}</p>
					
					</article>
				</div>
			{/foreach}
		</div>
		<footer>
			<a class="btn btn-default btn-lg see-more" role="button" href="/about" title="{$site->title}" data-slug="About">
				A propos de nous...
			</a>
		</footer>
	</section>