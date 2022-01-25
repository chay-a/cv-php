<?php
$is_FormSubmit = filter_has_var(INPUT_POST, 'submit');
$is_Sent = false;
if ($is_FormSubmit) {
    $is_civilite = filter_input(INPUT_POST, 'civilite_selection', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "monsieur|madame|autre")));
    $is_nom = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[-'’\p{L}\p{M}\p{N}]+/um")));
    $is_prenom = filter_input(INPUT_POST, 'firstname', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[-'’\p{L}\p{M}\p{N}]+/um")));
    $is_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $is_raisonContact = filter_input(INPUT_POST, 'raison_contact', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "proposition d\'emploi|demande d\'information|prestations")));
    $message = filter_input(INPUT_POST, 'message');
    $is_MessageGreaterThan5 = mb_strlen($message, 'UTF-8') > 5;
    $civilite = filter_input(INPUT_POST, 'civilite_selection');
    $nom = filter_input(INPUT_POST, 'name');
    $prenom = filter_input(INPUT_POST, 'firstname');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $raisonContact = filter_input(INPUT_POST, 'raison_contact');
    if ($is_civilite && $is_nom && $is_prenom && $is_email && $is_raisonContact && $is_MessageGreaterThan5) {
        $entreCivilite = 'Civilité : ' . $civilite . PHP_EOL;
        $entreNom = 'Nom : ' . $nom . PHP_EOL;
        $entrePrenom = 'Prénom : ' . $prenom . PHP_EOL;
        $entreEmail = 'email : ' . $is_email . PHP_EOL;
        $entreRaisonContact = 'Raison contact : ' . $raisonContact . PHP_EOL;
        $entreMessage = 'Message : ' . $message . PHP_EOL;
        $today = date("Y-m-d-H-i-s");
        $file = 'contact/contact_' . $today . '.txt';
        file_put_contents($file, $entreCivilite . $entreNom . $entrePrenom . $entreEmail . $entreRaisonContact . $entreMessage);
        $is_Sent = true;
    }
}

?>
<h1>Contact</h1>
<!--Lien pour faire un mail-->
<a href="mailto:auriane.chay@le-campus-numerique.fr" class="mailink">Envoyez-moi un mail</a>
<!--Formulaire de contact-->
<form method="post" action="<?= 'index.php?page=' . $pageContact; ?>">
    <div class="form_center">
        <div class="form_civilite input">
            <div class="label_civilite label">
                <label for="civilite_selection">Votre civilité</label>
            </div>
            <select name="civilite_selection">
                <option value="">Choisir une civilité</option>
                <option value="monsieur" <?php if (isset($is_civilite) && $is_civilite && $civilite == 'monsieur' && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Monsieur
                </option>
                <option value="madame" <?php if (isset($is_civilite) && $is_civilite && $civilite == 'madame' && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Madame
                </option>
                <option value="autre" <?php if (isset($is_civilite) && $is_civilite && $civilite == 'autre' && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Autre
                </option>
            </select>
            <?php if (isset($is_civilite) && !$is_civilite && $is_FormSubmit) : ?>
                <p class="error">Veuillez choisir une civilité</p>
            <?php endif; ?>
        </div>
        <div class="form_name input">
            <div class="label_nom label">

                <label for="name">Votre nom</label>
            </div>
            <input type="text" placeholder="Votre nom" name="name"
                   class="input_text" <?php if (isset($is_nom) && $is_nom && !$is_Sent) : ?> value="<?= $nom ?>" <?php endif; ?>>
            <?php if ($is_FormSubmit) : if (isset($is_nom) && !$is_nom) :?>
                <p class="error">Veuillez entrer un nom correcte (sans chiffres...)</p>
            <?php elseif(empty($nom)) :?>
                <p class="error">Veuillez entrer un nom</p>
            <?php endif; endif; ?>
        </div>
        <div class="form_firstname input">
            <div class="label_prenom label">

                <label for="firstname">Votre prénom</label>
            </div>
            <input type="text" placeholder="Votre prénom" name="firstname"
                   class="input_text" <?php if (isset($is_prenom) && $is_prenom && !$is_Sent) : ?> value="<?= $prenom ?>" <?php endif; ?>>
            <?php if ($is_FormSubmit) : if (isset($is_prenom) && !$is_prenom) :?>
                <p class="error">Veuillez entrer un prénom correcte (sans chiffres...)</p>
            <?php elseif(empty($prenom)) :?>
                <p class="error">Veuillez entrer un prénom</p>
            <?php endif; endif;?>
        </div>
        <div class="form_email input">
            <div class="label_email label">
                <label for="email">Votre email</label>
            </div>
            <input type="email" placeholder="votre email" name="email"
                   class="input_text" <?php if (isset($is_email) && $is_email && !$is_Sent) : ?> value="<?= $email ?>" <?php endif; ?>>
            <?php if (empty($is_email) && $is_FormSubmit) : ?>
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
            <?php if (empty($raisonContact) && $is_FormSubmit) : ?>
                <p class="error">Veuillez choisir une raison de contact</p>
            <?php endif; ?>
        </div>
        <div class="form_texte input">
            <div class="label_message label">
                <label for="message">Votre message</label>
            </div>
            <textarea name="message" id="message" cols="30"
                      rows="10"><?php if (!empty($message) && !$is_Sent) : echo $message; endif; ?></textarea>
            <?php if ((empty($message) || !$is_MessageGreaterThan5) && $is_FormSubmit) : ?>
                <p class="error">Veuillez entrer un message de plus de 5 charactères</p>
            <?php endif; ?>
        </div>
        <input type="submit" value="Envoyer" class="envoyer" name="submit">
    </div>
</form>