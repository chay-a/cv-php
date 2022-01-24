    <h1>Contact</h1>
    <!--Lien pour faire un mail-->
    <a href="mailto:auriane.chay@le-campus-numerique.fr" class="mailink">Envoyez-moi un mail</a>
    <!--Formulaire de contact-->
    <form method="post" action="<?php echo $pageFrontControllerCheminVersPages . $pageContact; ?>">
        <div class="form_center">
            <div class="form_civilite input">
                <div class="label_civilite label">
                    <label for="civilite_selection">Votre civilité</label>
                </div>
                <select name="civilite_selection">
                    <option>Monsieur</option>
                    <option>Madame</option>
                    <option>Autre</option>
                </select>
            </div>
            <div class="form_name input">
                <div class="label_nom label">

                    <label for="name">Votre nom</label>
                </div>
                <input type="text" placeholder="Votre nom" name="name" class="input_text">
            </div>
            <div class="form_firstname input">
                <div class="label_prenom label">

                    <label for="firstname">Votre prénom</label>
                </div>
                <input type="text" placeholder="Votre prénom" name="firstname" class="input_text">
            </div>
            <div class="form_email input">
                <div class="label_email label">
                    <label for="email">Votre email</label>
                </div>
                <input type="email" placeholder="votre email" name="email" class="input_text">
            </div>
            <div class="form_raison_contact">
                <p>Pour quelles raison me contactez-vous?</p>
                <div>
                    <input type="radio" name="raison_contact" value="proposition d'emploi">
                    <label for="proposition d'emploi">Proposition d'emploi</label>
                </div>
                <div>
                    <input type="radio" name="raison_contact" value="demande d'information">
                    <label for="demande d'information">Demande d'information</label>
                </div>
                <div>
                    <input type="radio" name="raison_contact" value="prestations">
                    <label for="prestations">Prestations</label>
                </div>
            </div>
            <div class="form_texte input">
                <div class="label_message label">
                    <label for="message">Votre message</label>
                </div>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="Envoyer" class="envoyer">
        </div>
    </form>
<?php
    $civilite = filter_input(INPUT_POST, 'civilite_selection');
    $nom = filter_input(INPUT_POST, 'name');
    $prenom = filter_input(INPUT_POST, 'firstname');
    $email = filter_input(INPUT_POST, 'email');
    $raisonContact = filter_input(INPUT_POST, 'raison_contact');
    $message = filter_input(INPUT_POST, 'message');
?>