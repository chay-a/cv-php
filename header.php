<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metaDescription; ?>"/>
    <link rel="stylesheet" href="style/style.css">
    <?php if ($secureParameter == 'hobby') : ?>
        <link rel="stylesheet" href="style/hobby.css">
    <?php elseif ($secureParameter == 'contact') : ?>
        <link rel="stylesheet" href="style/contact.css">
    <?php endif; ?>
    <title><?php echo $metaTitre . ' | Auriane Chay'; ?></title>
</head>

<body>
<header>
    <div class="header_name_img">
        <p>Auriane Chay</p>
        <img src="IMG/Auriane_1.jpg"
             alt="Une femme avec le cheveux brun et bouclé regarde pensivement vers la droite.">
    </div>
    <!--Navigation -->
    <nav>
        <a href="index.php" <?php if (!$secureParameter) : ?> class="active" <?php endif; ?>>Accueil</a>
        <a href="<?php echo 'index.php?page=' . $pageHobby?>" <?php if ($secureParameter == 'hobby') : ?> class="active" <?php endif; ?>>Hobbies</a>
        <a href="<?php echo 'index.php?page=' . $pageContact?>" <?php if ($secureParameter == 'contact') : ?> class="active" <?php endif; ?>>Contact</a>
    </nav>
</header>