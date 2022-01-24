<?php
$buttonPressed = filter_input(INPUT_POST, 'submit');
$civilite = filter_input(INPUT_POST, 'civilite_selection');
$entreCivilite = 'Civilité : ' . $civilite . '; ';
$nom = filter_input(INPUT_POST, 'name');
$entreNom = 'Nom : ' . $nom . '; ';
$prenom = filter_input(INPUT_POST, 'firstname');
$entrePrenom = 'Prénom : ' . $prenom . '; ';
$email = filter_input(INPUT_POST, 'email');
$entreEmail = 'email : ' . $email . '; ';
$raisonContact = filter_input(INPUT_POST, 'raison_contact');
$entreRaisonContact = 'Raison contact : ' . $raisonContact . '; ';
$message = filter_input(INPUT_POST, 'message');
$entreMessage = 'Message : ' . $message . '; ';
$is_Sent = false;

if ($civilite != 'Choisir une civilité' && !empty($nom) && !empty($prenom) && isset($email) && isset($raisonContact) && !empty($message)) {
    $today = date("Y-m-d-H-i-s");
    $file = 'contact/contact_' . $today . '.txt';
    file_put_contents($file, $entreCivilite . $entreNom . $entrePrenom . $entreEmail . $entreRaisonContact . $entreMessage);
    $is_Sent = true;
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
                <option value="monsieur" <?php if (isset($civilite) && $civilite == 'monsieur' && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Monsieur
                </option>
                <option value="madame" <?php if (isset($civilite) && $civilite == 'madame') : ?> selected="selected" <?php endif; ?>>
                    Madame
                </option>
                <option value="autre" <?php if (isset($civilite) && $civilite == 'autre') : ?> selected="selected" <?php endif; ?>>
                    Autre
                </option>
            </select>
            <?php if ($civilite == "" && $buttonPressed) : ?>
                <p class="error">Veuillez choisir une civilité</p>
            <?php endif; ?>
        </div>
        <div class="form_name input">
            <div class="label_nom label">

                <label for="name">Votre nom</label>
            </div>
            <input type="text" placeholder="Votre nom" name="name"
                   class="input_text" <?php if (!empty($nom) && !$is_Sent) : ?> value="<?php echo $nom ?>" <?php endif; ?>>
            <?php if (empty($nom) && $buttonPressed) : ?>
                <p class="error">Veuillez entrer votre nom</p>
            <?php endif; ?>
        </div>
        <div class="form_firstname input">
            <div class="label_prenom label">

                <label for="firstname">Votre prénom</label>
            </div>
            <input type="text" placeholder="Votre prénom" name="firstname"
                   class="input_text" <?php if (!empty ($prenom) && !$is_Sent) : ?> value="<?php echo $prenom ?>" <?php endif; ?>>
            <?php if (empty($prenom) && $buttonPressed) : ?>
                <p class="error">Veuillez entrer votre prénom</p>
            <?php endif; ?>
        </div>
        <div class="form_email input">
            <div class="label_email label">
                <label for="email">Votre email</label>
            </div>
            <input type="email" placeholder="votre email" name="email"
                   class="input_text" <?php if (!is_null($email) && !$is_Sent) : ?> value="<?php echo $email ?>" <?php endif; ?>>
            <?php if (empty($email) && $buttonPressed) : ?>
                <p class="error">Veuillez entrer votre email</p>
            <?php endif; ?>
        </div>
        <div class="form_raison_contact">
            <p>Pour quelles raison me contactez-vous?</p>
            <div>
                <input type="radio" name="raison_contact"
                       value="proposition d'emploi" <?php if (isset($raisonContact) && $raisonContact == "proposition d'emploi" && !$is_Sent) {
                    echo 'checked';
                } ?>>
                <label for="proposition d'emploi">Proposition d'emploi</label>
            </div>
            <div>
                <input type="radio" name="raison_contact"
                       value="demande d'information" <?php if (isset($raisonContact) && $raisonContact == "demande d'information" && !$is_Sent) {
                    echo 'checked';
                } ?>>
                <label for="demande d'information">Demande d'information</label>
            </div>
            <div>
                <input type="radio" name="raison_contact"
                       value="prestations" <?php if (isset($raisonContact) && $raisonContact == "prestations" && !$is_Sent) {
                    echo 'checked';
                } ?>>
                <label for="prestations">Prestations</label>
            </div>
            <?php if (!isset($raisonContact) && $buttonPressed) : ?>
                <p class="error">Veuillez choisir une raison de contact</p>
            <?php endif; ?>
        </div>
        <div class="form_texte input">
            <div class="label_message label">
                <label for="message">Votre message</label>
            </div>
            <textarea name="message" id="message" cols="30"
                      rows="10"><?php if (!empty($message) && !$is_Sent) : echo $message; endif; ?></textarea>
            <?php if (empty($message) && $buttonPressed) : ?>
                <p class="error">Veuillez entrer un message</p>
            <?php endif; ?>
        </div>
        <input type="submit" value="Envoyer" class="envoyer" name="submit">
    </div>
</form>
