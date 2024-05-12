document.addEventListener("DOMContentLoaded", function () {
  fetch("destinations.json").then(function (response) {
    response.json().then(function (destinations) {
      // CSS POUR LES APPERCUS
      // Sélectionner la boîte sur laquelle vous voulez appliquer l'effet

      // SURVOL DES LIENS DE LA NAV
      const menuNav = document.querySelectorAll(".menuNav");

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
      const carte1 = document.querySelector(".card");
      if (carte1) {
        carte1.addEventListener("click", function () {
          window.location.href = "antibes.html";
        });
      }

      const carte2 = document.querySelector(".card");
      if (carte2) {
        carte2.addEventListener("click", function () {
          window.location = "lamanche.html";
        });
      }

      const carte3 = document.querySelector(".card");
      if (carte3) {
        carte3.addEventListener("click", function () {
          window.location = "monaco.html";
        });
      }

      const carte4 = document.querySelector(".card");
      if (carte4) {
        carte4.addEventListener("click", function () {
          window.location = "corse.html";
        });
      }

      const carte5 = document.querySelector(".card");
      if (carte5) {
        carte5.addEventListener("click", function () {
          window.location = "ibiza.html";
        });
      }

      const carte6 = document.querySelector(".card");
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

      const currentUrl = window.location.pathname.split("/").pop();

      const previewContainer = document.getElementById("destinationPreview");

      const destinationGroups = {};

      // Regrouper les destinations par groupe
      destinations.forEach((destination) => {
        if (destination.url !== currentUrl) {
          if (!destinationGroups[destination.group]) {
            destinationGroups[destination.group] = [];
          }
          destinationGroups[destination.group].push(destination);
        }
      });

      for (const group in destinationGroups) {
        const groupContainer = document.createElement("div");
        groupContainer.classList.add("destination-group");

        destinationGroups[group].forEach((destination) => {
          const destinationElement = document.createElement("div");
          destinationElement.classList.add("destination-item");
          destinationElement.setAttribute("data-url", destination.url);
          destinationElement.addEventListener("click", function () {
            const url = this.getAttribute("data-url");
            window.location.href = url;
          });
          destinationElement.innerHTML = `
    <div class="card">
    <div class="image-card">
        <img class="img-destinations" src="${destination.imageUrl}" alt="${destination.name}">
    </div>
    <div class="card-items">
        <h2 class="card-elements" id="blue-title" tabindex="5">${destination.name}</h2>
        <h3 class="card-elements" id="card-descriptif">Venez découvrir davantages de destinations populaires !</h3>
        <div class="itemsTitle">
            <h2 class="card-text">Avantages :</h2>
        </div>
        <div class="spanItems">
            <span class="itemsWidget" tabindex="6">Caractéristiques unique de ${destination.name}</span>
            <div class="bonusWidget">
                <span id="additionalWidget" tabindex="7">+4</span>
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
        const elements = document.querySelectorAll(".container, .card");

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

  const yachtPrices = {
    1: 56000,
    2: 86000,
    3: 42000,
    4: 140000,
    5: 75000,
    6: 38000,
  };

  // Sélectionner les éléments du formulaire
  const yachtSelect = document.getElementById("modele");
  const dateDebutInput = document.getElementById("date_debut");
  const dateFinInput = document.getElementById("date_fin");
  const prixTotalDiv = document.getElementById("prix-total");

  // Ajouter un écouteur d'événement pour détecter les changements dans le formulaire
  yachtSelect.addEventListener("change", calculatePrice);
  dateDebutInput.addEventListener("change", calculatePrice);
  dateFinInput.addEventListener("change", calculatePrice);

  // Fonction pour calculer le prix
  function calculatePrice() {
    console.log(calculatePrice);
    // Obtenir les valeurs sélectionnées dans le formulaire
    const yachtId = yachtSelect.value;
    const dateDebut = new Date(dateDebutInput.value);
    const dateFin = new Date(dateFinInput.value);

    // Calculer le nombre de jours réservés
    const diffTime = Math.abs(dateFin - dateDebut);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    // Obtenir le prix du bateau sélectionné
    const yachtPrice = yachtPrices[yachtId];

    // Calculer le prix total
    const price = diffDays * yachtPrice;

    // Afficher le prix total dans le formulaire
    prixTotalDiv.textContent = `Prix total : ${price} €`;
  }
});
