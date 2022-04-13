if (document.querySelector(".article-card")) {
  const cardsArray = document.querySelectorAll(".article-card");
  cardsArray.forEach((card) => {
    card.addEventListener("mouseover", () => {
      let background = card.style.background;
      background = background.replace(
        "linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%)",
        "linear-gradient( 360deg, rgba(212, 37, 21, 0.8) 0%, rgba(212, 37, 21, 0) 100%)"
      );
      card.style.background = background;
    });
    card.addEventListener("mouseout", () => {
      let background = card.style.background;
      background = background.replace(
        "linear-gradient(360deg, rgba(212, 37, 21, 0.8) 0%, rgba(212, 37, 21, 0) 100%)",
        "linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%)"
      );
      card.style.background = background;
    });
  });
}
if (document.getElementById("orderDate")) {

document.getElementById('orderDate').valueAsDate = new Date();
}
