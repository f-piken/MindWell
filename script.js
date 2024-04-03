function generateBill() {
    // Mendapatkan nilai dari input form
    var nama = document.getElementById("nama").value;
    var dokter = document.getElementById("dokter").value;
    var umur = document.getElementById("umur").value;
    var noTlp = document.getElementById("noTlp").value;

    // Membuat teks bill
    var billText = "<strong>Informasi Pendaftaran:</strong><br>";
    billText += "<strong>Nama:</strong> " + nama + "<br>";
    billText += "<strong>Pilihan Dokter:</strong> " + dokter + "<br>";
    billText += "<strong>Umur:</strong> " + umur + "<br>";
    billText += "<strong>Nomor Telepon:</strong> " + noTlp + "<br>";

    // Menampilkan bill di dalam div
    document.getElementById("billOutput").innerHTML = billText;
}

// // corousel
// let currentIndex = 0;
//   const slides = document.querySelectorAll('.carousel-item');
//   const totalSlides = slides.length;

//   function changeSlide(direction) {
//     clearInterval(autoSlideInterval); // clear the auto slide interval
//     currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
//     const offset = -currentIndex * 100;
//     const carouselContent = document.querySelector('.carousel-content');
//     carouselContent.style.transition = 'transform 0.5s ease';
//     carouselContent.style.transform = `translateX(${offset}%)`;
//     autoSlideInterval = setInterval(() => changeSlide(1), 3000); // set auto slide interval again
//   }

let slideIndex = 0;
let slideInterval;
  let autoSlideInterval = setInterval(() => changeSlide(1), 3000); // auto slide every 3 seconds

  function showSlides() {
    const slides = document.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.dot');
    
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }
    slides[slideIndex].style.display = 'block';
    dots[slideIndex].classList.add('active');
}
function nextSlide() {
  slideIndex++;
  showSlides();
}
function currentSlide(n) {
  slideIndex = n;
  showSlides();
}

const slides = document.querySelectorAll('.carousel-item');

// Generate dots
const dotsContainer = document.querySelector('.dots-container');
slides.forEach((_, index) => {
  const dot = document.createElement('span');
  dot.classList.add('dot');
  dot.setAttribute('onclick', `currentSlide(${index})`);
  dotsContainer.appendChild(dot);
});

function startSlideInterval() {
  slideInterval = setInterval(() => {
      nextSlide();
  }, 2500); // Ganti slide setiap 3 detik
}

function stopSlideInterval() {
  clearInterval(slideInterval);
}

// Start slide interval
startSlideInterval();

// Pause slide interval when cursor is over carousel
document.querySelector('.carousel-container').addEventListener('mouseenter', () => {
  stopSlideInterval();
});

// Resume slide interval when cursor leaves carousel
document.querySelector('.carousel-container').addEventListener('mouseleave', () => {
  startSlideInterval();
});

showSlides();