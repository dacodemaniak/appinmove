<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Nouvelle demande de réservation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    /* Fonts and Content */
    body, td { font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size:18px; }
    body { background-color: #ffffff; margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
    h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+ */color:#0E7693; font-size:22px; }

    </style>
   
</head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#fff;" >
        <tbody>
            <tr>
                <td align="center" bgcolor="#fff">
                    <table  cellpadding="0" cellspacing="0" border="0">
                        <tbody>                            
                            <tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>

                            <tr>
                                <td align="center" class="w640"  width="640" height="20"> <a style="color:#ffffff; font-size:12px;" href="http://www.o-osmose.fr"><span style="color:#ffffff; font-size:12px;">ORTHOSCOOT by OSMOSE</span></a> </td>
                            </tr>
                            <tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>


                            <!-- entete -->
                            <tr class="pagetoplogo">
                                <td class="w640"  width="640">
                                    <table  class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#fff">
                                        <tbody>
                                            <tr>
                                                <td class="w30"  width="30"></td>
                                                <td  class="w580"  width="580" valign="middle" align="left">
                                                    <div class="pagetoplogo-content">
                                                        <img class="w580" style="text-decoration: none; display: block; color:#476688; font-size:30px;" src="http://www.o-osmose.fr/_assets/images/logo_email.jpg" alt="ORTHOSCOOT by OSMOSE" width="314" height="80"/>
                                                    </div>
                                                </td> 
                                                <td class="w30"  width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td  class="w640"  width="640" height="1"></td>
                            </tr>

                             <!-- contenu -->
                            <tr class="content">
                                <td class="w640" class="w640"  width="640" bgcolor="#ffffff">
                                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td  class="w30"  width="30"></td>
                                                <td  class="w580"  width="580">
                                                    <!-- Patient -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">

                                                                    <div align="left" class="article-content">
                                                                    	<h3>Patient</h3>
                                                                    	<ul>
																			<li>Nom : <strong>{$object->getCustomerName("pn")}</strong></li>
																			<li>Téléphone : <strong>{$object->getCustomerTelephone()}</strong></li>
																			<li>Email : <strong>{$object->getCustomerMail()}</strong></li>
																			<li>N° de rue : <strong>{$object->getCustomerNumRue()}</strong></li>
																			<li>Adresse : <strong>{$object->getCustomerAdresse()}</strong></li>
																			<li>Cpl. Adresse : <strong>{$object->getCustomerComplementAdresse()}</strong></li>
																			<li>Code postal : <strong>{$object->getCustomerCodePostal()}</strong> Ville : <strong>{$object->getCustomerVille()}</strong></li>
																		</ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- Fin patient -->
                                                    <!-- Chirurgie -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">

                                                                    <div align="left" class="article-content">
                                                                    	<h3>Chirurgie</h3>
                                                                    	<ul>
																			<li>Chirurgien : <strong>{$object->getChirName()}</strong></li>
																			<li>Etablissement de santé : <strong>{$object->getEtablissement()}</strong></li>
																			<li>N° Sécurité Sociale : <strong>{$object->getNumSecu()}</strong></li>
																			<li><strong>{$object->getPorteBequille()}</strong></li>
																			<li>Jambe opérée : <strong>{$object->getJambe()}</strong></li>
																		</ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--  Fin Chirurgie -->
                                                    <!-- Morphologie -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">

                                                                    <div align="left" class="article-content">
                                                                    	<h3>Morphologie</h3>
                                                                    	<ul>
																			<li>Age : <strong>{$object->getCustomerAge()}</strong></li>
																			<li>Fourchette de poids : <strong>{$object->getPoids()}</strong></li>
																			<li>Fourchette de taille : <strong>{$object->getTaille()}</strong></li>
																		</ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--  Fin Morphologie -->
                                                    <!-- Durée -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">

                                                                    <div align="left" class="article-content">
                                                                    	<h3>Durée</h3>
                                                                    	<ul>
																			<li><strong>{$object->getDuree()}</strong></li>
																		</ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--  Fin Durée -->
                                                    <!-- Livraison et Retour -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">

                                                                    <div align="left" class="article-content">
                                                                    	<h3>Livraison & Retour</h3>
                                                                    	<ul>
																			<li>Date de livraison : <strong>{$object->getDebut()}</strong></li>
																			<li>Date de retour : <strong>{$object->getRetour()}</strong></li>
																			<li>Lieu de livraison : <strong>{$object->getLivraison()}</strong></li>
																			<li>Mode de retour : <strong>{$object->getModeRetour()}</strong></li>
																			{if $object->getLivraison() eq "Relais Colis"}
																				<li>Relais Colis : <strong>{$object->getRelaisColis()}</strong></li>
																			{/if}
																		</ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--  Fin Livraison & Retour -->
                                                    <!-- Total -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">

                                                                    <div align="left" class="article-content">
                                                                    	<h3>Total</h3>
                                                                    	<ul>
																			<li>Total : <strong>{$object->getTotal()}</strong></li>
																			<li>Mode de paiement : <strong>{$object->getModePaiement()}</strong></li>
																		</ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--  Fin Total -->                                                                                                                          
                                                </td>
                                                <td class="w30" class="w30"  width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!--  separateur horizontal de 15px de  haut-->
                            <tr>
                                <td class="w640"  width="640" height="15" bgcolor="#ffffff"></td>
                            </tr>

                            <!-- pied de page -->
                            <tr class="pagebottom">
                                <td class="w640"  width="640">
                                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#fff">
                                        <tbody>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td class="w30"  width="30"></td>
                                                <td class="w580"  width="580" valign="top">
                                                    <p align="left" class="pagebottom-content-left" style="color:#E22242; font-style:italic;">
                                                        L'équipe OSMOSE
                                                    </p>
                                                </td>

                                                <td class="w30"  width="30"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="w640"  width="640" height="60"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>