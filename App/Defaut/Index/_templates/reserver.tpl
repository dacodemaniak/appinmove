{**
*	@name reserver.tpl Vues pour l'affichage des tournées
*	@author web-Projet.com (contact@web-projet.com)
*	@design web-Projet.com
*	@version 1.0

**}
<div class="container">
	{assign var=counter value=0}
	<div class="row">
		<div class="col-sm-12 tour-date">
			<i class="glyphicon glyphicon-calendar"></i> {$index->getReservation()->getShortStartDate()}
		</div> 
		{foreach $index->getReservation()->getTuiles() as $item}
			{if $counter > 3}
				{$counter = 0}
				</div>	
				<div class="row">
					<div class="col-sm-12 tour-date">
						<i class="glyphicon glyphicon-calendar"></i> {$item->value()->tourDate()->format("d-m-Y")}
					</div>
			{/if}
			<section class="tuile col-lg-3 col-md-3 col-sm-6 col-xs-12 {if $item->value()->pastedTour()} pasted{else}{if $item->value()->getNearEndStatus()} near-end{/if}{/if}">
				<div class="inner">
					<header>
						<h3>
							<span class="">{$item->value()->tourDate()->format("H:i")}</span>
						</h3>
					</header>
		
					<form id="resa_{$item->value()->tourDate()->format("dmYHi")}" class="form-horizontal">
						<p>Il reste : <span class="badge available_{$item->value()->tourDate()->format("dmYHi")}">{$item->value()->dispos()}</span> places disponibles</p>
						<div class="form-group">
							<div class="col-sm-6 col-xs-12">
								<label for="places_{$item->value()->tourDate()->format("dmYHi")}">
									Nombre de places :
								</label>
								<input type="number" value="1" id="places_{$item->value()->tourDate()->format("dmYHi")}" name="places_{$item->value()->tourDate()->format("dmYHi")}" placeholder="1" class="form-control wished-places" min="1" max="{$item->value()->dispos()}" {if $item->value()->pastedTour()} disabled readonly{/if}/>
							</div>
							<div class="col-sm-6 col-xs-12">
								<button type="button" name="valide_{$item->value()->tourDate()->format("dmYHi")}" class="btn btn-success btn-resa" {if $item->value()->pastedTour()} disabled{/if}>
									{if $item->value()->pastedTour()} Trop tard !!!{else} Réservez{/if}
								</button>
							</div>
						</div>
					</form>
				</div>
			</section>
			{$counter = $counter + 1}
		{/foreach}
	</div>
</div>

{* Inclusion du modèle pour la gestion d'une réservation *}
{include file="./aResa.tpl"}