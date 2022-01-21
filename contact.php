<?php
include 'header.php';
?>
    <h1>Contact</h1>
    <!--Lien pour faire un mail-->
    <a href="mailto:auriane.chay@le-campus-numerique.fr" class="mailink">Envoyez-moi un mail</a>
    <!--Formulaire de contact-->
    <form method="get" action="https://httpbin.org/get">
        <div class="form_center">
            <div class="form_name input">
                <div class="label_nom label">

                    <label for="name">Votre nom</label>
                </div>
                <input type="text" placeholder="Votre nom" name="name" required class="input_text">
            </div>
            <div class="form_genre input">
                <div class="label_genre label">
                    <p>Votre genre</p>
                </div>
                <label for="female"> female</label>
                <input type="radio" name="female" id="female">
                <label for="male"> male</label>
                <input type="radio" name="male" id="male">
            </div>
            <div class="form_city input">
                <div class="label_city label">
                    <label for="city_selection">Votre ville</label>
                </div>
                <select name="city_selection">
                    <option>Paris </option>
                    <option>Lyon</option>
                    <option>Valence</option>
                </select>
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
include 'footer.php';
?>