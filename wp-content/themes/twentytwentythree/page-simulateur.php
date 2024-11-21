<?php
/**
* Template Name: Simulateur
* Template Post Type: page
*/
 
get_header();
?>
 
<main>
    <div id="simulateur" class="simulateur-container">
        <h2>Simulateur de Déduction Fiscale</h2>
        <form id="simulateur-form">
            <!-- Champs du formulaire -->
            <label for="type-entreprise">Type d'entreprise :</label>
            <select id="type-entreprise" name="type-entreprise" required>
                <option value="is">Société soumise à l'impôt sur les sociétés (IS)</option>
                <option value="bic">Entrepreneur individuel (BIC - régime réel normal ou simplifié)</option>
            </select>
 
            <label for="siret">SIRET :</label>
            <input type="text" id="siret" name="siret" placeholder="SIRET ex: 123456789" required>
 
            <label for="nom-entreprise">Nom de l'entreprise :</label>
            <input type="text" id="nom-entreprise" name="nom-entreprise" placeholder="Nom de l'entreprise" required>
 
            <label for="nom-contact">Nom et prénom :</label>
            <input type="text" id="nom-contact" name="nom-contact" placeholder="Nom et prénom du contact" required>
 
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" placeholder="Adresse de l'entreprise" required>
 
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" placeholder="Adresse e-mail de contact" required>
 
            <label for="telephone">Numéro de téléphone :</label>
            <input type="tel" id="telephone" name="telephone" placeholder="Numéro de téléphone" required>
 
            <label for="ca-ht">Chiffre d'affaires annuel (€ HT) :</label>
            <input type="number" id="ca-ht" name="ca-ht" placeholder="ex : 25.000" required>
 
            <button type="button" id="calculer-btn">Calculer</button>
        </form>
 
        <!-- Résultats de la simulation -->
        <div id="resultats-simulation" style="display:none;">
            <h3>Résultats de la Simulation</h3>
            <p id="potentiel-deduction"></p>
            <p id="montant-maximal"></p>
 
            <!-- Saisie du montant souhaité -->
            <label for="montant-oeuvre">Montant souhaité pour l'œuvre (€) :</label>
            <input type="number" id="montant-oeuvre" name="montant-oeuvre" placeholder="ex : 100.000">
 
            <p id="nouvelle-deduction-annuelle"></p>
 
            <!-- Tableau d'étalement -->
            <h4>Étalement sur 5 ans</h4>
            <table id="table-etale">
                <!-- Les lignes seront générées dynamiquement -->
            </table>
 
            <!-- Tableau d'impact -->
            <h4>Impact sur le Résultat Imposable</h4>
            <table id="table-impact">
                <!-- Les lignes seront générées dynamiquement -->
            </table>
        </div>
    </div>
</main>
 
<?php
get_footer();
?>
 
<script>
    // Gestionnaire de clic pour le bouton "Calculer"
    document.getElementById("calculer-btn").addEventListener("click", function() {
        const chiffreAffaires = parseFloat(document.getElementById("ca-ht").value);
        if (!chiffreAffaires || chiffreAffaires <= 0) {
            alert("Veuillez entrer un chiffre d'affaires valide.");
            return;
        }
 
        // Calculs initiaux
        const plafondDeduction = Math.max(20000, 0.005 * chiffreAffaires);
        const montantMaximal = plafondDeduction * 5;
 
        // Afficher les résultats initiaux
        document.getElementById("resultats-simulation").style.display = "block";
        document.getElementById("potentiel-deduction").textContent = `Potentiel de déduction annuel : ${plafondDeduction.toFixed(2)} €`;
        document.getElementById("montant-maximal").textContent = `Montant maximal pour optimiser la déduction : ${montantMaximal.toFixed(2)} €`;
 
        // Mise à jour des calculs dynamiques
        const montantOeuvreInput = document.getElementById("montant-oeuvre");
        montantOeuvreInput.addEventListener("input", function() {
            const montantSouhaite = parseFloat(montantOeuvreInput.value);
            if (!montantSouhaite || montantSouhaite <= 0) {
                alert("Veuillez entrer un montant valide pour l'œuvre.");
                return;
            }
 
            // Calcul de la déduction annuelle réelle
            const deductionAnnuelleReelle = Math.min(montantSouhaite / 5, plafondDeduction);
 
            // Mise à jour des résultats
            document.getElementById("nouvelle-deduction-annuelle").textContent =
                `Nouvelle déduction annuelle réelle : ${deductionAnnuelleReelle.toFixed(2)} €`;
 
            // Génération des tableaux
            document.getElementById("table-etale").innerHTML = genererTableauEtalement(deductionAnnuelleReelle);
            document.getElementById("table-impact").innerHTML = genererTableauImpact(deductionAnnuelleReelle);
        });
    });
 
    // Génération du tableau d'étalement
    function genererTableauEtalement(deductionAnnuelle) {
        const anneeCourante = new Date().getFullYear();
        let tableHTML = "<tr><th>Année</th><th>Déduction fiscale (€)</th></tr>";
        for (let i = 0; i < 5; i++) {
            tableHTML += `<tr><td>${anneeCourante + i}</td><td>${deductionAnnuelle.toFixed(2)}</td></tr>`;
        }
        return tableHTML;
    }
 
    // Génération du tableau d'impact sur le résultat imposable
    function genererTableauImpact(deductionAnnuelle) {
        const anneeCourante = new Date().getFullYear();
        const resultatInitial = 100000; // Exemple de résultat imposable initial
        let tableHTML = "<tr><th>Année</th><th>Résultat avant déduction (€)</th><th>Déduction (€)</th><th>Résultat après déduction (€)</th></tr>";
        for (let i = 0; i < 5; i++) {
            const resultatApres = resultatInitial - deductionAnnuelle;
            tableHTML += `<tr><td>${anneeCourante + i}</td><td>${resultatInitial.toFixed(2)}</td><td>${deductionAnnuelle.toFixed(2)}</td><td>${resultatApres.toFixed(2)}</td></tr>`;
        }
        return tableHTML;
    }
</script>
 
 