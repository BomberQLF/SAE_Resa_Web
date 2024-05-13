document.addEventListener("DOMContentLoaded", function () {
  fetch("destinations.json").then(function (response) {
    response.json().then(function (destinations) {
      // CSS POUR LES APPERCUS
      // Sélectionner la boîte sur laquelle vous voulez appliquer l'effet

      // SURVOL DES LIENS DE LA NAV
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

      //   REDIRECTION VERS UNE AUTRE PAGE HTML AU CLICK DU CONTAINER
      var carte1 = document.querySelector(".card");
      if (carte1) {
        carte1.addEventListener("click", function () {
          window.location.href = "antibes.html";
        });
      }

      var carte2 = document.querySelector(".card");
      if (carte2) {
        carte2.addEventListener("click", function () {
          window.location = "lamanche.html";
        });
      }

      var carte3 = document.querySelector(".card");
      if (carte3) {
        carte3.addEventListener("click", function () {
          window.location = "monaco.html";
        });
      }

      var carte4 = document.querySelector(".card");
      if (carte4) {
        carte4.addEventListener("click", function () {
          window.location = "corse.html";
        });
      }

      var carte5 = document.querySelector(".card");
      if (carte5) {
        carte5.addEventListener("click", function () {
          window.location = "ibiza.html";
        });
      }

      var carte6 = document.querySelector(".card");
      if (carte6) {
        carte6.addEventListener("click", function () {
          window.location = "maldives.html";
        });
      }

      // CSS
      var elementsDecouvrir = document.querySelectorAll(".boxDecouvrir");

      elementsDecouvrir.forEach(function (element) {
        element.addEventListener("mouseover", function (event) {
          event.target.style.textDecoration = "underline";
        });

        element.addEventListener("mouseout", function (event) {
          event.target.style.textDecoration = "none";
        });
      });

      // JS POUR L'AFFICHAGE DES APPERCUS DES DESTINATIONS

      var currentUrl = window.location.pathname.split("/").pop();

      var previewContainer = document.getElementById("destinationPreview");

      var destinationGroups = {};

      // Regrouper les destinations par groupe
      destinations.forEach((destination) => {
        if (destination.url !== currentUrl) {
          if (!destinationGroups[destination.group]) {
            destinationGroups[destination.group] = [];
          }
          destinationGroups[destination.group].push(destination);
        }
      });

      for (var group in destinationGroups) {
        var groupContainer = document.createElement("div");
        groupContainer.classList.add("destination-group");

        destinationGroups[group].forEach((destination) => {
          var destinationElement = document.createElement("div");
          destinationElement.classList.add("destination-item");
          destinationElement.setAttribute("data-url", destination.url);
          destinationElement.addEventListener("click", function () {
            var url = this.getAttribute("data-url");
            window.location.href = url;
          });
          destinationElement.innerHTML = `
    <div class="card">
    <div class="image-card">
        <img class="img-destinations" src="${destination.imageUrl}" alt="${destination.name}">
    </div>
    <div class="card-items">
        <h3 class="card-elements" id="blue-title">${destination.name}</h3>
        <h3 class="card-elements" id="card-descriptif">Venez découvrir davantages de destinations populaires !</h3>
        <div class="itemsTitle">
            <h3 class="card-text">Avantages :</h3>
        </div>
        <div class="spanItems">
            <span class="itemsWidget">Caractéristiques unique de ${destination.name}</span>
            <div class="bonusWidget">
                <span id="additionalWidget">+4</span>
            </div>
        </div>
    </div>
</div>
      `;
          groupContainer.appendChild(destinationElement);
        });

        // Cela vérifie que previewContainer est bien une instance de HTMLElement pour être sur que la propriété appendChild existe
        if (previewContainer instanceof HTMLElement) {
          previewContainer.appendChild(groupContainer);
        }

        // Sélectionner tous les éléments avec les classes .container et .card
        var elements = document.querySelectorAll(".container, .card");

        // Itérer sur chaque élément sélectionné
        elements.forEach(function (element) {
          // Ajouter un écouteur d'événement pour détecter le survol de la souris
          element.addEventListener("mouseenter", function () {
            // Ajouter l'effet de box shadow lors du survol
            this.style.boxShadow = "0 0 20px rgba(41, 217, 213, 0.7)"; // Utiliser rgba pour spécifier la couleur avec une transparence de 70%
            this.style.transition = "box-shadow 0.8s ease";
          });

          // Ajouter un écouteur d'événement pour détecter quand la souris quitte la boîte
          element.addEventListener("mouseleave", function () {
            // Retirer l'effet de box shadow lorsque la souris quitte la boîte
            this.style.boxShadow = "none"; // Retirer l'ombre portée
            this.style.transition = "box-shadow 0.8s ease";
          });
        });
      }
    });
  });

  var yachtPrices = {
    1: 56000,
    2: 86000,
    3: 42000,
    4: 140000,
    5: 75000,
    6: 38000,
  };
  
  // Sélectionner les éléments du formulaire pour le premier bateau
  var yachtSelect = document.getElementById("modele");
  var dateDebutInput = document.getElementById("date_debut");
  var dateFinInput = document.getElementById("date_fin");
  var prixTotalDiv = document.getElementById("prix-total");
  
  // Sélectionner les éléments du formulaire pour le deuxième bateau
  var secondModeleSelect = document.getElementById("secondModele");
  var secondDateDebutInput = document.getElementById("secondDateDebut");
  var secondDateFinInput = document.getElementById("secondDateFin");
  
  // Ajouter un écouteur d'événement pour détecter les changements dans le formulaire du premier bateau
  yachtSelect.addEventListener("change", calculatePrice);
  dateDebutInput.addEventListener("change", calculatePrice);
  dateFinInput.addEventListener("change", calculatePrice);
  
  // Ajouter un écouteur d'événement pour le select du deuxième modèle
  secondModeleSelect.addEventListener("change", function () {
    if (secondModeleSelect.value !== "") {
      secondDateDebutInput.style.display = "block";
      secondDateFinInput.style.display = "block";
      calculatePrice();
    } else {
      secondDateDebutInput.style.display = "none";
      secondDateFinInput.style.display = "none";
      calculatePrice(); // Ajout pour recalculer le prix lorsque le deuxième modèle est déselectionné
    }
  });
  
  // Ajouter un écouteur d'événement pour détecter les changements dans le formulaire du deuxième bateau
  secondDateDebutInput.addEventListener("change", calculatePrice);
  secondDateFinInput.addEventListener("change", calculatePrice);
  
  // Masquer les champs de date du deuxième modèle par défaut
  secondDateDebutInput.style.display = "none";
  secondDateFinInput.style.display = "none";
  
  // Modifier la fonction calculatePrice pour calculer le prix total pour deux yachts
  function calculatePrice() {
    // Obtenir les valeurs sélectionnées dans le formulaire du premier bateau
    var yachtId = yachtSelect.value;
    var dateDebut = new Date(dateDebutInput.value);
    var dateFin = new Date(dateFinInput.value);
  
    // Calculer le nombre de jours réservés pour le premier bateau
    var diffTime = Math.abs(dateFin - dateDebut);
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  
    // Obtenir le prix du premier bateau sélectionné
    var yachtPrice = yachtPrices[yachtId];
  
    // Calculer le prix total pour le premier bateau
    var price = diffDays * yachtPrice;
  
    // Afficher le prix total pour le premier bateau dans le formulaire
    prixTotalDiv.textContent = `Prix total : ${price} €`;
  
    // Si un deuxième bateau est sélectionné
    if (secondModeleSelect.value !== "") {
      var secondYachtId = secondModeleSelect.value;
      var secondDateDebut = new Date(secondDateDebutInput.value);
      var secondDateFin = new Date(secondDateFinInput.value);
  
      // Calculer le nombre de jours réservés pour le deuxième bateau
      var secondDiffTime = Math.abs(secondDateFin - secondDateDebut);
      var secondDiffDays = Math.ceil(secondDiffTime / (1000 * 60 * 60 * 24));
  
      // Obtenir le prix du deuxième bateau sélectionné
      var secondYachtPrice = yachtPrices[secondYachtId];
  
      // Calculer le prix total pour les deux bateaux
      var totalPrice = price + secondDiffDays * secondYachtPrice;
  
      // Afficher le prix total pour les deux bateaux dans le formulaire
      prixTotalDiv.textContent = `Prix total : ${totalPrice} €`;
    }
  }
  

});