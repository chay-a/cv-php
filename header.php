<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metaDescription; ?>"/>
    <link rel="stylesheet" href="style/style.css">
    <?php if ($queryPage == 'hobby') : ?>
        <link rel="stylesheet" href="style/hobby.css">
    <?php elseif ($queryPage == 'contact') : ?>
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
        <?php foreach($routes as $key => $value) :?>
            <a href="index.php<?php if ($key !== NULL) { echo "?page=$key";} ?>" <?php if ($queryPage == $key) : ?> class="active" <?php endif; ?>><?= $value[1]?></a>
        <?php endforeach;?>
    </nav>
</header>