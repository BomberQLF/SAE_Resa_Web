document.addEventListener("DOMContentLoaded", function () {
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
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var yachtPrice = yachtPrices[yachtId];

    var price = diffDays * yachtPrice;

    prixTotalDiv.textContent = `Prix total : ${price} €`;

    if (secondModeleSelect.value !== "") {
      var secondYachtId = secondModeleSelect.value;
      var secondDateDebut = new Date(secondDateDebutInput.value);
      var secondDateFin = new Date(secondDateFinInput.value);

      var secondDiffTime = Math.abs(secondDateFin - secondDateDebut);
      var secondDiffDays = Math.ceil(secondDiffTime / (1000 * 60 * 60 * 24));

      var secondYachtPrice = yachtPrices[secondYachtId];

      var totalPrice = price + secondDiffDays * secondYachtPrice;

      if (yachtId === secondYachtId) {
        prixTotalDiv.textContent =
          "Erreur : Vous ne pouvez pas réserver le même bateau pour les deux options.";
      } else {
        prixTotalDiv.textContent = `Prix total : ${totalPrice} €`;
      }
    }
  }
});
