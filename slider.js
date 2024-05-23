document.addEventListener("DOMContentLoaded", function () {
  // Récupération des éléments du DOM
  var prevBtn = document.getElementById("prev");
  var nextBtn = document.getElementById("next");
  var carousel = document.querySelector(".carousel");
  var items = carousel.querySelectorAll(".list .item");
  var indicator = carousel.querySelector(".indicators");
  var dots = indicator.querySelectorAll(".indicators ul li");

  // Initialisation des variables
  var active = 0; // Index de l'élément actif
  var firstPosition = 0; // Index de la première image
  var lastPosition = items.length - 1; // Index de la dernière image
  var autoPlay; // Intervalle de lecture automatique

  // Démarrer la lecture automatique
  const startAutoPlay = () => {
    clearInterval(autoPlay);
    autoPlay = setInterval(() => {
      nextBtn.click();
    }, 5000); // Toutes les 5 secondes
  };
  startAutoPlay();

  // Mettre à jour l'affichage du carrousel
  const setSlider = () => {
    carousel.querySelector(".list .item.active")?.classList.remove("active");
    items[active].classList.add("active");

    indicator.querySelector(".indicators ul li.active")?.classList.remove("active");
    dots[active].classList.add("active");

    indicator.querySelector(".number").innerText = "0" + (active + 1);
    startAutoPlay(); // Redémarrer la lecture automatique
  };
  setSlider();

  // Gestion du clic sur le bouton "next"
  nextBtn.onclick = () => {
    active = active + 1 > lastPosition ? 0 : active + 1; // Aller à l'image suivante ou revenir à la première en utilisant une méthode ternaire
    carousel.style.setProperty("--calculation", 1); // Définir une propriété CSS personnalisée
    setSlider();
  };

  // Gestion du clic sur le bouton "prev"
  prevBtn.onclick = () => {
    active = active - 1 < firstPosition ? lastPosition : active - 1; // Aller à l'image précédente ou revenir à la dernière
    carousel.style.setProperty("--calculation", -1); // Définir une propriété CSS personnalisée
    setSlider();
    clearInterval(autoPlay); // Réinitialiser l'intervalle de lecture automatique
    autoPlay = setInterval(() => {
      nextBtn.click();
    }, 5000); // Toutes les 5 secondes
  };

  // Gestion des clics sur les points de navigation
  dots.forEach((item, position) => {
    item.onclick = () => {
      active = position; // Définir l'élément actif en fonction du point cliqué
      setSlider();
    };
  });
});
