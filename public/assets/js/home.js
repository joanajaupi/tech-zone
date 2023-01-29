const indicators = document.querySelector(".carousel-indicators");
const carouselImages = document.querySelector(".carousel-inner");

const getRecommended = async () => {
    const response = await fetch("assets/php/getRecommended.php");
    const data = await response.json();
    populateCarousel(data);
};

const populateCarousel = (data) => {
  for (let i = 0; i < data.length; i++) {
    let button;
    let image;
    if (i === 0) {
      button = `<button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="${i}" class="active" aria-current="true" aria-label="Slide ${
        i + 1
      }"></button>`;
      image = `<div class="carousel-item active">
    <a href="${data[i].category}.php"><img src="../images/${data[i].fileName}" class="d-block w-100"></a>
    </div>`;
    } else {
      button = `<button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="${i}" aria-label="Slide ${
        i + 1
      }"></button> `;
      image = `<div class="carousel-item">
    <a href="${data[i].category}.php"><img src="../images/${data[i].fileName}"class="d-block w-100"></a>
    </div> `;
    }
    indicators.innerHTML += button;
    carouselImages.innerHTML += image;
  }
};