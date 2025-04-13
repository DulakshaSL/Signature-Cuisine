// Hamberbutton Action

document.getElementById('hamburgerBtn').addEventListener('click', function() {
    const navList = document.getElementById('navList');
    navList.classList.toggle('active');
});


// Main Carousel Function

let currentSlide = 0;
let slides = document.querySelectorAll('.carousel-slide');

function showSlide(n) {
    // Hide all slides
    for(let i = 0; i < slides.length; i++) {
        slides[i].style.opacity = '0';  
    }
    
    // Show the desired slide and handle looping
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].style.opacity = '1';  
}

 document.getElementById('prevBtn').addEventListener('click', function() {
    showSlide(currentSlide - 1);
    resetSlideInterval();  
 });

 document.getElementById('nextBtn').addEventListener('click', function() {
    showSlide(currentSlide + 1);
    resetSlideInterval();  
 });

 // Initialize by showing the first slide
 setTimeout(() => showSlide(0), 50);  

 let slideInterval = setInterval(function() {
  showSlide(currentSlide + 1);  
 }, 3000);  // Changes slide every 3 seconds

 function resetSlideInterval() {
  clearInterval(slideInterval);  
  slideInterval = setInterval(function() {  
  showSlide(currentSlide + 1);
  }, 3000);
 }
