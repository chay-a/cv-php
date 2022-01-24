<?php
    $metaTitre = 'Accueil';
    $metaDescription = 'CV en ligne de Auriane Chay avec ses compétences';
    require 'header.php';
?>
    <main class="CV_main">
        <!--Elément sur la gauche-->
        <div class="element_gauche">
            <div class="intro">
                <!-- Introduction-->
                <h1>Web Developpeur</h1>
                <p>Je suis <span>passioné</span> et curieuse, pour uriliser mes compétences de travaille <span>d'équipe</span> et
                    d'autonomie.</p>
            </div>
            <div class="exp_comp">
                <div class="experience">
                    <h2>Formations</h2>
                    <!-- Tableau des expériences-->
                    <table>
                        <tr>
                            <th>Dates</th>
                            <th>Nom formation</th>
                            <th>Lieu</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <th>2016-2020</th>
                            <th>Licence LEA anglais-japonais</th>
                            <th>Grenoble</th>
                            <th>Apprentissage de l'anglais professionnel et découverte de la langue japonaise.</th>
                        </tr>
                        <tr>
                            <th>nov 2020- juin 2021</th>
                            <th>Titre professionnel Web Designer</th>
                            <th>Lyon</th>
                            <th>Apprentissage de la suite Adobe et stage de 2 mois.</th>
                        </tr>
                        <tr>
                            <th>2021- 2023</th>
                            <th>Titre professionnel technicien developpeur</th>
                            <th>Valence</th>
                            <th>Apprentissage des langages de programmation suivis d'une alternance de 1 an.</th>
                        </tr>
                    </table>
                </div>
                <!-- Compétences-->
                <div class="competences">
                    <h2>Compétences</h2>
                    <ul>
                        <li>Utilisation de la suite Adobe</li>
                        <li>Utilisation de Figma</li>
                        <li>HTML/CSS</li>
                    </ul>
                </div>
            </div>
        </div>
        <aside>

            <!-- Langues parlées-->
            <section>
                <h2>Langues</h2>
                <ul>
                    <li>
                        <h3>Français</h3>
                        <p>Langue maternelle</p>
                    </li>
                    <li>
                        <h3>Anglais</h3>
                        <p>Fluent</p>
                    </li>
                    <li>
                        <h3>Japanese</h3>
                        <p>Bases</p>
                    </li>
                </ul>

            </section>
            <!-- Hobbies -->
            <section>
                <h2>Hobbies</h2>
                <ol>
                    <li>Lire</li>
                    <li>Jouer jeux video</li>
                    <li>Créer des choses</li>
                </ol>
            </section>
        </aside>
    </main>
<?php
    require 'footer.php';
?>