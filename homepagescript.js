
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


//testimonials-slides animation

let currentTestimonial = 0;
let testimonials = document.querySelectorAll('.testimonials-slide');

function showTestimonial(n) {
    // Hide all testimonials
    for (let i = 0; i < testimonials.length; i++) {
        testimonials[i].style.display = 'none';
    }
    
    // Show the desired testimonial and handle looping
    currentTestimonial = (n + testimonials.length) % testimonials.length;
    testimonials[currentTestimonial].style.display = 'block';
}

document.getElementById('prevTestimonial').addEventListener('click', function() {
    showTestimonial(currentTestimonial - 1);
});

document.getElementById('nextTestimonial').addEventListener('click', function() {
    showTestimonial(currentTestimonial + 1);
});

// Initialize by showing the first testimonial
showTestimonial(0);

// Rotate testimonials every 5 seconds
setInterval(function() {
    showTestimonial(currentTestimonial + 1);
}, 5000);


// Most Popular Dishes Carousel Function

let dishes = [
    {
        title: " Special Chicken Cheese Burger",
        price: "Rs.850",
        image: "resources/populardish1.jpg"
    },
    {
        title: "Cuisine Special Mix Rice ",
        price: "Rs.2750",
        image: "resources/populardish2.jpg"
    },

    {
        title: "Creamy Cheese Pasta",
        price: "Rs.1250",
        image: "resources/populardish3.jpg"
    },

    {
        title: "Chicken Cheese Pizza Large",
        price: "Rs.1950",
        image: "resources/populardish4.jpg"
    },

    {
        title: "Cuisine Pot Biryani",
        price: "Rs. 2750",
        image: "resources/populardish5.jpg"
    },

    {
        title: "Sea Food Kottu Large",
        price: "Rs.1250",
        image: "resources/populardish6.jpg"
    }
   
];

let currentDishIndex = 0;

function updateDishSlide(index) {
    let cards = document.querySelectorAll('.card');

    for (let i = 0; i < 3 && (index + i) < dishes.length; i++) {
        let dish = dishes[index + i];
        let card = cards[i];
        
        card.querySelector('.card-image').src = dish.image;
        card.querySelector('.card-title').textContent = dish.title;
        card.querySelector('.card-price').textContent = dish.price;
    }
}

// Button Actions 

document.querySelector('.prevDish').addEventListener('click', function() {
    currentDishIndex -= 3;
    updateDishSlide(currentDishIndex);
});

document.querySelector('.nextDish').addEventListener('click', function() {
    currentDishIndex += 3;
    updateDishSlide(currentDishIndex);
});

updateDishSlide(currentDishIndex);

function autoRotateDishes() {
    currentDishIndex += 3;
    if (currentDishIndex >= dishes.length) { // If we're at the end, loop back to the beginning
        currentDishIndex = 0;
    }
    updateDishSlide(currentDishIndex);
}

let autoRotateInterval = setInterval(autoRotateDishes, 5000); // Start the automatic rotation


// Most Popular Drinks Carousel Function

let drinks = [
    {
        title: "Iced Cappuccino",
        price: "Rs.500",
        image: "resources/populardrink1.jpg"
    },
    {
        title: "Milk Shake",
        price: "Rs.350",
        image: "resources/populardrink2.jpg"
    },
    {
        title: "Mango Smoothie",
        price: "Rs.350",
        image: "resources/populardrink3.jpg"
    },
    {
        title: "Special Herbal Tea",
        price: "Rs.250",
        image: "resources/populardrink5.jpg"
    },
    {
        title: "Mushroom Cocktail",
        price: "Rs.850",
        image: "resources/populardrink4.jpg"
    },
    {
        title: "Mojito",
        price: "Rs.1050",
        image: "resources/populardrink6.jpg"
    }

    
];

let currentDrinkIndex = 0;

function updateDrinkSlide(index) {
    let cards = document.querySelectorAll('.drinks-slide .card');

    for (let i = 0; i < 3 && (index + i) < drinks.length; i++) {
        let drink = drinks[index + i];
        let card = cards[i];
        
        card.querySelector('.card-image').src = drink.image;
        card.querySelector('.card-title').textContent = drink.title;
        card.querySelector('.card-price').textContent = drink.price;
    }
}

// Button Actions 

document.querySelector('.drinks-slide .prev').addEventListener('click', function() {
    currentDrinkIndex -= 3;
    if(currentDrinkIndex < 0) {
        currentDrinkIndex = 0;  // To ensure it doesn't go into negative indexes
    }
    updateDrinkSlide(currentDrinkIndex);
});

document.querySelector('.drinks-slide .next').addEventListener('click', function() {
    currentDrinkIndex += 3;
    if (currentDrinkIndex > drinks.length - 3) { 
        currentDrinkIndex = drinks.length - 3;  // Ensure it doesn't exceed the array's limit
    }
    updateDrinkSlide(currentDrinkIndex);
});

// Initialize the drink slide with the first three drinks
updateDrinkSlide(currentDrinkIndex);

function autoRotateDrinks() {
    currentDrinkIndex += 3;
    if (currentDrinkIndex >= drinks.length) { // If we're at the end, loop back to the beginning
        currentDrinkIndex = 0;
    }
    updateDrinkSlide(currentDrinkIndex);
}

let autoRotateDrinksInterval = setInterval(autoRotateDrinks, 5000); // Start the automatic rotation for drinks



function showSlide(n) {
    // Hide all slides and reset their z-index
    for(let i = 0; i < slides.length; i++) {
        slides[i].style.opacity = '0';  
        slides[i].style.zIndex = '1'; // reset z-index
    }
    
    // Show the desired slide and handle looping
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].style.opacity = '1';  
    slides[currentSlide].style.zIndex = '10'; // make this slide on top
}



