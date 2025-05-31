function withSeparator(value) {
  if (!value) {
    return "";
  }
  var num = value?.toString();
  var pattern = /(-?\d+)(\d{3})/;
  while (pattern.test(num)) num = num.replace(pattern, "$1,$2");
  return num;
}
// document.addEventListener("DOMContentLoaded", () => {
document.addEventListener("livewire:navigated", () => {
  const swiperEl = document.querySelector("swiper-container");

  // Your existing DOMContentLoaded logic
  const priceSeprateElements = document.getElementsByClassName("price-seprate");
  Array.from(priceSeprateElements).forEach((element) => {
    const fullText = element.textContent;
    element.textContent = withSeparator(fullText);
  });

  const filterBtn = document.querySelector(".filter-btn");
  const filterContent = document.querySelector(".sidebarMobile");
  const overlay = document.querySelector(".overlay");
  const sidebar = document.querySelector("#sidebar-wrapper");
  if(sidebar&&filterContent&&filterBtn&&overlay){
    filterBtn.addEventListener("click", function () {
      filterContent.classList.toggle("showFilter");
      sidebar.classList.toggle("hidden");
      overlay.classList.toggle("show");
    });
  
    overlay.addEventListener("click", function () {
      filterContent.classList.toggle("showFilter");
      overlay.classList.toggle("show");
      sidebar.classList.toggle("hidden");
    });
  }

  if (!swiperEl) return;
  Object.assign(swiperEl, {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 7,
        spaceBetween: 50,
      },
    },
  });
  swiperEl.initialize();
});
function changeImage(src) {
  document.getElementById("main-image").src = src;
}

function openLightbox(mediaSrc) {
  const isVideo = mediaSrc.endsWith(".mp4");
  document.getElementById("lightbox").style.display = "flex";
  if (isVideo) {
    document.getElementById("lightbox-video").src = mediaSrc;
    document.getElementById("lightbox-video").style.display = "block";
    document.getElementById("lightbox-image").style.display = "none";
    document.getElementById("lightbox-video").play();
  } else {
    document.getElementById("lightbox-image").src = mediaSrc;
    document.getElementById("lightbox-image").style.display = "block";
    document.getElementById("lightbox-video").style.display = "none";
  }
}


function closeLightbox() {
  document.getElementById("lightbox").style.display = "none";
  document.getElementById("lightbox-video").pause();
}