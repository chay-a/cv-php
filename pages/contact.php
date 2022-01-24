<?php
    $buttonPressed = filter_input(INPUT_POST, 'submit');
    $civilite = filter_input(INPUT_POST, 'civilite_selection');
    $entreCivilite = 'Civilité : '. $civilite .'; ';
    $nom = filter_input(INPUT_POST, 'name');
    $entreNom = 'Nom : '. $nom .'; ';
    $prenom = filter_input(INPUT_POST, 'firstname');
    $entrePrenom = 'Prénom : '. $prenom .'; ';
    $email = filter_input(INPUT_POST, 'email');
    $entreEmail = 'email : '. $email .'; ';
    $raisonContact = filter_input(INPUT_POST, 'raison_contact');
    $entreRaisonContact = 'Raison contact : '. $raisonContact .'; ';
    $message = filter_input(INPUT_POST, 'message');
    $entreMessage = 'Message : '. $message .'; ';


    if (isset($civilite) && isset($nom) && isset($prenom) && isset($email) && isset($raisonContact) && isset($message)) {
        $today = date("Y-m-d-H-i-s");
        $file = 'contact/contact_'. $today . '.txt';
        file_put_contents($file, $entreCivilite . $entreNom . $entrePrenom . $entreEmail . $entreRaisonContact . $entreMessage);
    }
?>
    <h1>Contact</h1>
    <!--Lien pour faire un mail-->
    <a href="mailto:auriane.chay@le-campus-numerique.fr" class="mailink">Envoyez-moi un mail</a>
    <!--Formulaire de contact-->
    <form method="post" action="<?php echo 'index.php?page=' . $pageContact; ?>">
        <div class="form_center">
            <div class="form_civilite input">
                <div class="label_civilite label">
                    <label for="civilite_selection">Votre civilité</label>
                </div>
                <select name="civilite_selection">
                    <option value="">Choisir une civilité</option>
                    <option value="monsieur" <?php if(isset($civilite) && $civilite == 'monsieur') :?> selected="selected" <?php endif;?>>Monsieur</option>
                    <option value="madame" <?php if(isset($civilite) && $civilite == 'madame') :?> selected="selected" <?php endif;?>>Madame</option>
                    <option value="autre" <?php if(isset($civilite) && $civilite == 'autre') :?> selected="selected" <?php endif;?>>Autre</option>
                </select>
                <?php if ($civilite == 'Choisir une civilité' && $buttonPressed) : ?>
                <p class="error">Veuillez choisir une civilité</p>
                <?php endif;?>
            </div>
            <div class="form_name input">
                <div class="label_nom label">

                    <label for="name">Votre nom</label>
                </div>
                <input type="text" placeholder="Votre nom" name="name" class="input_text">
                <?php if (empty($nom) && $buttonPressed) : ?>
                    <p class="error">Veuillez entrer votre nom</p>
                <?php endif;?>
            </div>
            <div class="form_firstname input">
                <div class="label_prenom label">

                    <label for="firstname">Votre prénom</label>
                </div>
                <input type="text" placeholder="Votre prénom" name="firstname" class="input_text">
                <?php if (empty($prenom) && $buttonPressed) : ?>
                    <p class="error">Veuillez entrer votre prénom</p>
                <?php endif;?>
            </div>
            <div class="form_email input">
                <div class="label_email label">
                    <label for="email">Votre email</label>
                </div>
                <input type="email" placeholder="votre email" name="email" class="input_text">
                <?php if (!is_null($email) && $buttonPressed) : ?>
                    <p class="error">Veuillez entrer votre email</p>
                <?php endif;?>
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
                <?php if (!isset($raisonContact) && $buttonPressed) : ?>
                    <p class="error">Veuillez choisir une raison de contact</p>
                <?php endif;?>
            </div>
            <div class="form_texte input">
                <div class="label_message label">
                    <label for="message">Votre message</label>
                </div>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <?php if (empty($message) && $buttonPressed) : ?>
                    <p class="error">Veuillez entrer un message</p>
                <?php endif;?>
            </div>
            <input type="submit" value="Envoyer" class="envoyer" name="submit">
        </div>
    </form>
