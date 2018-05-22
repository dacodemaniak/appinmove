	<section id="about" class="row inner-section">
		<header>
			<h2><span>App'inMove</span></h2>
		</header>
		
		<div class="container">

			<!-- Boucle sur les articles concernÃ©s About //-->
			
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
			<ul class="list-unstyled list-inline">
				<li>IMAGINER</li>
				<li>CROIRE</li>
				<li>CRÉER</li>
				<li>ACCOMPAGNER</li>
				</ul>
		</footer>
	</section>