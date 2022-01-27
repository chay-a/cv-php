<?php
$is_FormSubmit = filter_has_var(INPUT_POST, 'submit');
$is_Sent = false;
$msgError = [
    'civilite_selection' => '',
    'name' => '',
    'firstname' => '',
    'email' => '',
    'raison_contact' => '',
    'message' => '',
];
$InputsValidate = NULL;
if ($is_FormSubmit) {
    $optionsSanitize = [
        'civilite_selection' => FILTER_SANITIZE_STRING,
        'name' => FILTER_SANITIZE_STRING,
        'firstname' =>FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'raison_contact' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags' => FILTER_FLAG_NO_ENCODE_QUOTES,
        ],
        'message' => FILTER_SANITIZE_STRING,
    ];
    $inputsSanitize = filter_input_array(INPUT_POST, $optionsSanitize);
    $optionsValidate = [
        'civilite_selection' => [
                'filter' => FILTER_CALLBACK,
                'options' => 'filter_validate_civilite',
        ],
        'name' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                'regexp' => "/[-'’\p{L}\p{M}\p{N}]+/um",
            ],
        ],
        'firstname' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                'regexp' => "/[-'’\p{L}\p{M}\p{N}]+/um",
            ],
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'raison_contact' => [
                'filter' => FILTER_CALLBACK,
                'options' => 'filter_validate_raison_contact',
        ],
        'message' => [
                'filter' => FILTER_CALLBACK,
                'options' => 'filter_validate_message',
        ],
    ];
    $InputsValidate = filter_var_array($inputsSanitize, $optionsValidate);
    $msgErrorFalse = [
            'civilite_selection' => ' choisir une civilité',
            'name' => 'entrer un nom valide (seulement lettres et tiret)',
            'firstname' => 'entrer un prénom valide (seulement lettres et tiret)',
            'email' => 'entrer un adresse email valide',
            'raison_contact' => 'choisir une raison de contact',
            'message' => 'entrer un message de plus de 5 lettres',
    ];
    $nbError = 0;
    foreach ($optionsValidate as $key => $value) {
        if (empty($InputsValidate[$key])) {
            $msgError[$key] = 'Veuiller remplir le champ ' . $key;
            $nbError++;
        } elseif ($InputsValidate[$key] === false) {
            $msgError[$key] = 'Veuillez '.$msgErrorFalse[$key];
            $nbError++;
        }
    }

    if ($nbError === 0) {
        $fileContent = '';
        foreach ($InputsValidate as $key => $value) {
            $fileContent = $fileContent . $key . ' : ' . $value . PHP_EOL;
        }
        $today = date("Y-m-d-H-i-s");
        $file = 'contact/contact_' . $today . '.txt';
        file_put_contents($file, $fileContent);
        $is_Sent = true;
    }
}
?>
<h1>Contact</h1>
<!--Lien pour faire un mail-->
<a href="mailto:auriane.chay@le-campus-numerique.fr" class="mailink">Envoyez-moi un mail</a>
<!--Formulaire de contact-->
<form method="post" action="index.php?page=contact">
    <div class="form_center">
        <div class="form_civilite input">
            <div class="label_civilite label">
                <label for="civilite_selection">Votre civilité</label>
            </div>
            <select name="civilite_selection">
                <option value="">Choisir une civilité</option>
                <option value="monsieur" <?php if (isset($InputsValidate) && $InputsValidate['civilite_selection'] == "monsieur" && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Monsieur
                </option>
                <option value="madame" <?php if (isset($InputsValidate) && $InputsValidate['civilite_selection'] == "madame" && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Madame
                </option>
                <option value="autre" <?php if (isset($InputsValidate) && $InputsValidate['civilite_selection'] == "autre" && !$is_Sent) : ?> selected="selected" <?php endif; ?>>
                    Autre
                </option>
            </select>
            <?php if (empty($is_InputsValidate['civilite_selection']) || $is_InputsValidate['civilite_selection'] === false) :?>
            <p class="error"><?= $msgError['civilite_selection'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form_name input">
            <div class="label_nom label">
                <label for="name">Votre nom</label>
            </div>
            <input type="text" placeholder="Votre nom" name="name"
                   class="input_text" <?php if (isset($InputsValidate) && $InputsValidate['name'] && !$is_Sent) : ?> value="<?= $InputsValidate['name'] ?>" <?php endif; ?>>
            <?php if (empty($is_InputsValidate['name']) || $is_InputsValidate['name'] === false) :?>
                <p class="error"><?= $msgError['name'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form_firstname input">
            <div class="label_prenom label">
                <label for="firstname">Votre prénom</label>
            </div>
            <input type="text" placeholder="Votre prénom" name="firstname"
                   class="input_text" <?php if (isset($InputsValidate) && $InputsValidate['firstname'] && !$is_Sent) : ?> value="<?= $InputsValidate['firstname'] ?>" <?php endif; ?>>
            <?php if (empty($is_InputsValidate['firstname']) || $is_InputsValidate['firstname'] === false) :?>
                <p class="error"><?= $msgError['firstname'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form_email input">
            <div class="label_email label">
                <label for="email">Votre email</label>
            </div>
            <input type="email" placeholder="votre email" name="email"
                   class="input_text" <?php if (isset($InputsValidate) && $InputsValidate['email'] && !$is_Sent) : ?> value="<?= $InputsValidate['email'] ?>" <?php endif; ?>>
            <?php if (empty($is_InputsValidate['email']) || $is_InputsValidate['email'] === false) :?>
                <p class="error"><?= $msgError['email'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form_raison_contact">
            <p>Pour quelles raison me contactez-vous?</p>
            <div>
                <input type="radio" name="raison_contact"
                       value="proposition d'emploi" <?php if (isset($InputsValidate) && $InputsValidate['raison_contact'] == "proposition d'emploi" && !$is_Sent) {
                    echo 'checked';
                } ?>>
                <label for="proposition d'emploi">Proposition d'emploi</label>
            </div>
            <div>
                <input type="radio" name="raison_contact"
                       value="demande d'information" <?php if (isset($InputsValidate) && $InputsValidate['raison_contact'] == "demande d'information" && !$is_Sent) {
                    echo 'checked';
                } ?>>
                <label for="demande d'information">Demande d'information</label>
            </div>
            <div>
                <input type="radio" name="raison_contact"
                       value="prestations" <?php if (isset($InputsValidate) && $InputsValidate['raison_contact'] == "prestations" && !$is_Sent) {
                    echo 'checked';
                } ?>>
                <label for="prestations">Prestations</label>
            </div>
            <?php if (empty($is_InputsValidate['raison_contact']) || $is_InputsValidate['raison_contact'] === false) :?>
                <p class="error"><?= $msgError['raison_contact'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form_texte input">
            <div class="label_message label">
                <label for="message">Votre message</label>
            </div>
            <textarea name="message" id="message" cols="30"
                      rows="10"><?php if (isset($InputsValidate) && $InputsValidate['message'] && !$is_Sent) : echo $InputsValidate['message']; endif; ?></textarea>
            <?php if (empty($is_InputsValidate['message']) || $is_InputsValidate['message'] === false) :?>
                <p class="error"><?= $msgError['message'] ?></p>
            <?php endif; ?>
        </div>
        <input type="submit" value="Envoyer" class="envoyer" name="submit">
    </div>
</form>

<?php

function filter_validate_civilite($civiliteAtester) {
    if ($civiliteAtester === 'monsieur' || $civiliteAtester === 'madame' || $civiliteAtester === 'autre') {
        return $civiliteAtester;
    } else {
        return false;
    }
}

function filter_validate_raison_contact($raisonContactATester) {
    if ($raisonContactATester == "proposition d'emploi" || $raisonContactATester == "demande d'information" || $raisonContactATester == "prestations") {
        return $raisonContactATester;
    } else {
        return false;
    }
}

function filter_validate_message($messageATester) {
    if (strlen(preg_replace('/\s+/um', '', $messageATester)) > 5) {
        return $messageATester;
    } else {
        return false;
    }
}