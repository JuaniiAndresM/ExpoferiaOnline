const navSlide = () => {
  const burger = document.querySelector(".MobileBars");
  const nav = document.querySelector(".nav-mobile");
  const navLinks = document.querySelectorAll(".nav-mobile li");

  burger.addEventListener("click", () => {
    nav.classList.toggle("nav-active");
  });
};

navSlide();
