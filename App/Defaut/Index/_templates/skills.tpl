{**
* @name skills.tpl Affichage des compétences de l'entreprise
* @author web-Projet.com (contact@web-projet.com) Août 2017
* @package Defaut\Index
* @version 1.0
**}
    <section id="skills" class="row inner-section">
        <header>
            <h2><span>Nos compétences</span></h2>
        </header>
        
        <div class="container">
            <!-- Boucle sur les articles concernés About //-->
            
            {foreach from=$index->getCollection()->get() key=key item=about}
                <div class="col-lg-{$index->getBootstrapCols("lg")} col-md-{$index->getBootstrapCols("md")} col-sm-{$index->getBootstrapCols("sm")} col-xs-{$index->getBootstrapCols("xs")}">
                    <article>
                        <header class="{$about->value()->cssClass}">
                        <img src="./_assets/images/{$about->value()->image}" style="width: 100px;">
                        </header>
                        </br></br></br></br></br></br></br></br>
                        <h3><i class="glyphicon glyphicon-{$about->value()->icon}"></i> {$about->value()->subtitle}</h3>
                    	</br>
                        <p>{$about->value()->accroche}</p>
                    
                    </article>
                </div>
            {/foreach}
                </figcaption>
            </figure>
            
        </div>
        
    </section>