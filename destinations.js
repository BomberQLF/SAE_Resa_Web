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
  });