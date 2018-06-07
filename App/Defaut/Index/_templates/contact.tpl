{**
* @name contact.tpl Affichage du contact Business&Strategy Partners
* @author web-Projet.com (contact@web-projet.com) AoÃ»t 2017
* @package Defaut\Index
* @version 1.0
**}
	<section id="contact" class="row inner-section">
		<header>
			<h2><span>Contactez nous</span></h2>
		</header>
		<div class="container">
		<h3> 12 rue Louis Courtois de Viçose - Les Arches - Bat.3 - 31100 TOULOUSE <br></br> 09 54 92 72 97 </h3>
            
                    <p>
                        <a href="{$index->get()->getLinkedin("link")}" target="_new" title="Profil {$index->get()->getLinkedin("label")}">
                            <img src="./_assets/images/{$index->get()->getLinkedin("icon")}" alt="Profil {$index->get()->getLinkedin("label")} de {$index->get()->title}">
                        </a>
                        <a href="{$index->get()->getFacebook("link")}" target="_new" title="Profil {$index->get()->getFacebook("label")}">
                            <img src="./_assets/images/{$index->get()->getFacebook("icon")}" alt="Profil {$index->get()->getFacebook("label")} de {$index->get()->title}">
                        </a>
                    </p>
		</div>
		
	</section>