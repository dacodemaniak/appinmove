{**
* @name contact.tpl Affichage du contact Business&Strategy Partners
* @author web-Projet.com (contact@web-projet.com) Août 2017
* @package Defaut\Index
* @version 1.0
**}

	<section id="contact" class="row inner-section">
		<header>
			<h2>B&SP <span>Team</span></h2>
		</header>
		
		<div class="container">

			<!-- Affichage du trombinoscope //-->
			<figure class="trombinoscope col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<img src="./_assets/images/{$index->get()->image}" alt="{$index->get()->title}" class="img-responsive">
				<figcaption>
					<h3>{$index->get()->title}</h3>
					<h4>{$index->get()->subtitle}</h4>
					<p>
						<a href="{$index->get()->getLinkedin("link")}" target="_new" title="Profil {$index->get()->getLinkedin("label")}">
							<img src="./_assets/images/{$index->get()->getLinkedin("icon")}" alt="Profil {$index->get()->getLinkedin("label")} de {$index->get()->title}">
						</a>
						<a href="{$index->get()->getViadeo("link")}" target="_new" title="Profil {$index->get()->getViadeo("label")}">
							<img src="./_assets/images/{$index->get()->getViadeo("icon")}" alt="Profil {$index->get()->getViadeo("label")} de {$index->get()->title}">
						</a>
					</p>
				</figcaption>
			</figure>
			
		</div>
		
	</section>