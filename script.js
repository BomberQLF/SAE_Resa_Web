document.addEventListener("DOMContentLoaded", function () {
    fetch('mail.json')
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            console.log(data);
            const domainesTemporaires = data.domainesTemporaires;
  
            const emailInput = document.getElementById('email');
  
            emailInput.addEventListener('input', function () {
                const emailValue = emailInput.value;
                const domaine = emailValue.split('@')[1];
  
                if (domaine && domainesTemporaires.includes(domaine)) {
                    emailInput.style.backgroundColor = 'red';
                } else {
                    emailInput.style.backgroundColor = '';
                }
            });
        })
        .catch(function (error) {
            console.error('Erreur en fetchant les données JSON:', error);
        });
  
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
  
    // CALCUL DU PRIX TOTAL DE LA RESERVATION DE MON FORMULAIRE
  var yachtPrices = {
      1: 56000,
      2: 86000,
      3: 42000,
      4: 140000,
      5: 75000,
      6: 38000,
  };
  
  var yachtSelect = document.getElementById("modele");
  var dateDebutInput = document.getElementById("date_debut");
  var dateFinInput = document.getElementById("date_fin");
  var prixTotalDiv = document.getElementById("prix-total");
  var prixTotalInput = document.getElementById("prix_total_hidden");
  
  var secondModeleSelect = document.getElementById("second_modele");
  var secondDateDebutInput = document.getElementById("second_date_debut");
  var secondDateFinInput = document.getElementById("second_date_fin");
  
  secondDateDebutInput.style.display = "none";
  secondDateFinInput.style.display = "none";
  
  yachtSelect.addEventListener("change", calculatePrice);
  dateDebutInput.addEventListener("change", calculatePrice);
  dateFinInput.addEventListener("change", calculatePrice);
  
  secondModeleSelect.addEventListener("change", function () {
      if (secondModeleSelect.value !== "") {
          secondDateDebutInput.style.display = "block";
          secondDateFinInput.style.display = "block";
          calculatePrice();
      } else {
          secondDateDebutInput.style.display = "none";
          secondDateFinInput.style.display = "none";
          calculatePrice();
      }
  });
  
  secondDateDebutInput.addEventListener("change", calculatePrice);
  secondDateFinInput.addEventListener("change", calculatePrice);
  
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
  
      if (secondModeleSelect.value !== "") {
          var secondYachtId = secondModeleSelect.value;
          var secondDateDebut = new Date(secondDateDebutInput.value);
          var secondDateFin = new Date(secondDateFinInput.value);
  
          var secondDiffTime = Math.abs(secondDateFin - secondDateDebut);
          var secondDiffDays = Math.ceil(secondDiffTime / (1000 * 60 * 60 * 24));
  
          var secondYachtPrice = yachtPrices[secondYachtId];
          var secondPrice = secondDiffDays * secondYachtPrice;
          var totalPrice = price + secondPrice;
  
          if (yachtId === secondYachtId) {
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
  