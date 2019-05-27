{*
* @name aResa.tpl
* @author web-Projet.com (contact@web-projet.com)
* @package Defaut/Index/_templates
*}
<div id="dialog-form" title="Finalisez votre commande">
	<form name="" id="detail-resa" class="form-horizontal" method="post" />
		<fieldset>
			<div class="form-group">
				<label for="civilite" class="col-sm-4">Civilité :</label>
				<select name="civilite" id="civilite" size="1" class="text ui-widget-content ui-corner-all">
					<option value="1">Madame</option>
					<option value="2">Mademoiselle</option>
					<option value="3" selected>Monsieur</option>
				</select>
			</div>
			<div class="form-group">
				<label for="nom" class="required-field col-sm-4">Nom:</label>
				<input type="text" name="nom" id="nom" placeholder="Votre nom" size="30" maxlength="75" class="text ui-widget-content ui-corner-all" />
			</div>
			<div class="form-group">
				<label for="prenom" class="col-sm-4">Prénom :</label>
				<input type="text" name="prenom" id="prenom" placeholder="Votre prénom" size="30" maxlength="75" class="text ui-widget-content ui-corner-all" />
			</div>
			<div class="form-group">
				<label for="mail" class="required-field col-sm-4">Adresse e-mail :</label>
				<input type="email" name="mail" id="mail" placeholder="Votre e-mail" size="30" maxlength="75" class="text ui-widget-content ui-corner-all" />
			</div>
			<div class="form-group">
				<label for="telephone" class="required-field col-sm-4">Téléphone :</label>
				<input type="text" name="telephone" id="telephone" placeholder="99-99-99-99-99" size="30" maxlength="75" class="text ui-widget-content ui-corner-all" />
			</div>
		</fieldset>

		<div class="payment-detail">
			<p>
				Montant pour <span class="badge"></span> personnes : <span class="amount"></span>
			</p>
		</div>
	</form>
</div>