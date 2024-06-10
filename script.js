document.addEventListener("DOMContentLoaded", function () {
    // Récupérer les éléments stockés dans mon fichier JSON
    fetch("mail.json")
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        console.log(data);
        // Création de la variable domainesTemporaires qui stocke le contenu du fichier JSON
        const domainesTemporaires = data.domainesTemporaires;
        // Récupération de l'élément avec l'ID email
        const emailInput = document.getElementById("email");
        // Ajout d'un addEventListener qui détecte les changements de la valeur du champ #email 
        emailInput.addEventListener("input", function () {
          const emailValue = emailInput.value;
          const domaine = emailValue.split("@")[1]; // Extrait le domaine de l'email - [1] séléctionne le deuxième éléments du tableau après le @, c'est à dire le domaine.
  
          // Vérifie si le domaine est dans la liste des domaines temporaires
          if (domaine && domainesTemporaires.includes(domaine)) {
            emailInput.style.backgroundColor = "red";
          } else {
            emailInput.style.backgroundColor = ""; 
          }
        });
      })

    // Sélectionne tous les éléments avec la classe .menuNav
    var menuNav = document.querySelectorAll(".menuNav");
  
    menuNav.forEach(function (navBarName) {
      navBarName.addEventListener("mouseover", function () {
        this.style.transition = "color 0.5s ease";
        this.style.color = "#29d9d5"; 
      });
  
      navBarName.addEventListener("mouseout", function () {
        this.style.transition = "color 0.5s ease"; 
        this.style.color = "";
      });
    });
  
    // Sélectionne tous les éléments avec la classe .boxDecouvrir
    var elementsDecouvrir = document.querySelectorAll(".boxDecouvrir");
  
    elementsDecouvrir.forEach(function (element) {
      element.addEventListener("mouseover", function (event) {
        event.target.style.textDecoration = "underline";
      });
  
      element.addEventListener("mouseout", function (event) {
        event.target.style.textDecoration = "none";
      });
    });
  
    // Calcul du prix total de la réservation du formulaire
    var yachtPrices = {
      1: 56000,
      2: 86000,
      3: 42000,
      4: 140000,
      5: 75000,
      6: 38000,
    };
  
    // Récupération des éléments du formulaire
    var yachtSelect = document.getElementById("modele");
    var dateDebutInput = document.getElementById("date_debut");
    var dateFinInput = document.getElementById("date_fin");
    var prixTotalDiv = document.getElementById("prix-total");
    var prixTotalInput = document.getElementById("prix_total_hidden");
  
    var secondModeleSelect = document.getElementById("second_modele");
    var secondDateDebutLabel = document.getElementById("hidden");
    var secondDateFinLabel = document.getElementById("hide");
    var secondDateDebutInput = document.getElementById("second_date_debut");
    var secondDateFinInput = document.getElementById("second_date_fin");

  
    // Masque les champs de date pour le second modèle initialement
    secondDateDebutLabel.style.display = "none";
    secondDateFinLabel.style.display = "none";
    secondDateDebutInput.style.display = "none";
    secondDateFinInput.style.display = "none";
  
    // Ajoute les écouteurs d'événements pour recalculer le prix lors de changements
    yachtSelect.addEventListener("change", calculatePrice);
    dateDebutInput.addEventListener("change", calculatePrice);
    dateFinInput.addEventListener("change", calculatePrice);
  
    secondModeleSelect.addEventListener("change", function () {
      if (secondModeleSelect.value !== "") {
        secondDateDebutInput.style.display = "block";
        secondDateFinInput.style.display = "block";
        secondDateDebutLabel.style.display = "block";
        secondDateFinLabel.style.display = "block";
        calculatePrice();
      } else {
        secondDateDebutInput.style.display = "none";
        secondDateFinInput.style.display = "none";
        secondDateDebutLabel.style.display = "none";
        secondDateFinLabel.style.display = "none";
        calculatePrice();
      }
    });
  
    secondDateDebutInput.addEventListener("change", calculatePrice);
    secondDateFinInput.addEventListener("change", calculatePrice);
  
    // Fonction de calcul du prix
    function calculatePrice() {
      var yachtId = yachtSelect.value;
      var dateDebut = new Date(dateDebutInput.value);
      var dateFin = new Date(dateFinInput.value);
      var diffTime = Math.abs(dateFin - dateDebut);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // Conversion en jours
  
      var yachtPrice = yachtPrices[yachtId];
      var price = diffDays * yachtPrice;
  
      // Conversion du prix en entier avant de l'afficher et de l'envoyer
      price = parseInt(price, 10);
      prixTotalInput.value = price;
      prixTotalDiv.textContent = `Prix total : ${price} €`;
  
      // Calcul pour le second modèle
      if (secondModeleSelect.value !== "") {
        var secondYachtId = secondModeleSelect.value;
        var secondDateDebut = new Date(secondDateDebutInput.value);
        var secondDateFin = new Date(secondDateFinInput.value);
  
        var secondDiffTime = Math.abs(secondDateFin - secondDateDebut);
        var secondDiffDays = Math.ceil(secondDiffTime / (1000 * 60 * 60 * 24));
  
        var secondYachtPrice = yachtPrices[secondYachtId];
        var secondPrice = secondDiffDays * secondYachtPrice;
        var totalPrice = price + secondPrice;
  
        // Vérifie si les deux modèles sélectionnés sont identiques
        if (yachtId === secondYachtId) {
          // 1.C Règle OPQUAST numéro 80
          prixTotalDiv.textContent = "Erreur : Vous ne pouvez pas réserver le même bateau pour les deux options.";
        } else {
          // Conversion du totalPrice en entier avant de l'afficher et de l'envoyer
          totalPrice = parseInt(totalPrice, 10);
          prixTotalInput.value = totalPrice;
          prixTotalDiv.textContent = `Prix total : ${totalPrice} €`;
        }
      }
    }
  });
  