function generateBill() {
  // Mendapatkan nilai dari input form
  var nama = document.getElementById("nama").value;
  var dokter = document.getElementById("dokter").value;
  var umur = document.getElementById("umur").value;
  var noTlp = document.getElementById("noTlp").value;

  // Membuat objek yang berisi data pendaftaran
  var registrationData = {
      id: generateId(),
      nama: nama,
      dokter: dokter,
      umur: umur,
      noTlp: noTlp,
      tanggal: getCurrentDate(),
      tanggalJanji: getAppointmentDate(),
      status: "Pending"
  };

  // Menyimpan data pendaftaran ke dalam array jika sudah ada, atau membuat array baru jika belum ada
  var savedRegistrations = JSON.parse(localStorage.getItem('registrations')) || [];
  savedRegistrations.push(registrationData);

  // Menyimpan data pendaftaran ke dalam local storage
  localStorage.setItem('registrations', JSON.stringify(savedRegistrations));

  // Reset nilai input form
  document.getElementById("nama").value = "";
  document.getElementById("dokter").value = "";
  document.getElementById("umur").value = "";
  document.getElementById("noTlp").value = "";

  // Menampilkan data pendaftaran di dalam div
  displayRegistrations();
}

function generateId() {
  // Mendapatkan id unik berdasarkan timestamp
  return 'REG-' + Date.now();
}

function getCurrentDate() {
  // Mendapatkan tanggal saat ini dalam format "YYYY-MM-DD"
  var currentDate = new Date();
  var year = currentDate.getFullYear();
  var month = String(currentDate.getMonth() + 1).padStart(2, '0');
  var day = String(currentDate.getDate()).padStart(2, '0');
  return year + '-' + month + '-' + day;
}

function getAppointmentDate() {
  // Mendapatkan tanggal janji (3 hari setelah pendaftaran) dalam format "YYYY-MM-DD"
  var currentDate = new Date();
  currentDate.setDate(currentDate.getDate() + 3);
  var year = currentDate.getFullYear();
  var month = String(currentDate.getMonth() + 1).padStart(2, '0');
  var day = String(currentDate.getDate()).padStart(2, '0');
  return year + '-' + month + '-' + day;
}

function displayRegistrations() {
  var savedRegistrations = JSON.parse(localStorage.getItem('registrations')) || [];
  var latestRegistration = savedRegistrations[savedRegistrations.length - 1]; // Ambil data pendaftaran terakhir

  if (latestRegistration) { // Periksa apakah ada data pendaftaran terakhir
      var output = "<div style='margin-bottom: 10px;'><strong>Informasi Pendaftaran:</strong><br>";
      output += "<strong>Nama:</strong> " + latestRegistration.nama + "<br>";
      output += "<strong>Pilihan Dokter:</strong> " + latestRegistration.dokter + "<br>";
      output += "<strong>Umur:</strong> " + latestRegistration.umur + "<br>";
      output += "<strong>Nomor Telepon:</strong> " + latestRegistration.noTlp + "</div><br>";
  } else {
      var output = "<div style='margin-bottom: 10px;'>Tidak ada data pendaftaran yang baru.</div>";
  }

  document.getElementById("billOutput").innerHTML = output;
}


function openPopup() {
  document.getElementById("popup").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}
function openhasil() {
  document.getElementById("popup").style.display = "none";
  generateBill();
  document.getElementById("hasil").style.display = "block";
}

function closehasil() {
  document.getElementById("hasil").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
// Fungsi untuk menutup popup
function closePopup() {
  document.getElementById("popup").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}


// corousel
let slideIndex = 0;
let slideInterval;

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
    }, 3000);
}

function stopSlideInterval() {
    clearInterval(slideInterval);
}

startSlideInterval();

document.querySelector('.carousel-container').addEventListener('mouseenter', () => {
    stopSlideInterval();
});

document.querySelector('.carousel-container').addEventListener('mouseleave', () => {
    startSlideInterval();
});

showSlides();
