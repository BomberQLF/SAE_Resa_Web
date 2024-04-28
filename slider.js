document.addEventListener("DOMContentLoaded", function () {
  var prevBtn = document.getElementById("prev");
  var nextBtn = document.getElementById("next");
  var carousel = document.querySelector(".carousel");
  var items = carousel.querySelectorAll(".list .item");
  var indicator = carousel.querySelector(".indicators");
  var dots = indicator.querySelectorAll(".indicators ul li");

  var active = 0;
  var firstPosition = 0;
  var lastPosition = items.length - 1;
  var autoPlay;

  const startAutoPlay = () => {
    clearInterval(autoPlay);
    autoPlay = setInterval(() => {
      nextBtn.click();
    }, 5000);
  };
  startAutoPlay();

  const setSlider = () => {
    let itemActiveOld = carousel.querySelector(".list .item.active");
    if (itemActiveOld) itemActiveOld.classList.remove("active");
    items[active].classList.add("active");

    let dotActiveOld = indicator.querySelector(".indicators ul li.active");
    if (dotActiveOld) dotActiveOld.classList.remove("active");
    dots[active].classList.add("active");

    indicator.querySelector(".number").innerText = "0" + (active + 1);
    startAutoPlay();
  };
  setSlider();

  nextBtn.onclick = () => {
    active = active + 1 > lastPosition ? 0 : active + 1;
    carousel.style.setProperty("--calculation", 1);
    setSlider();
  };
  prev.onclick = () => {
    active = active - 1 < firstPosition ? lastPosition : active - 1;
    carousel.style.setProperty("--calculation", -1);
    setSlider();
    clearInterval(autoPlay);
    autoPlay = setInterval(() => {
      nextBtn.click();
    }, 5000);
  };
  dots.forEach((item, position) => {
    item.onclick = () => {
      active = position;
      setSlider();
    };
  });
});
