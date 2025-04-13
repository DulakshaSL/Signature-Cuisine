// Hamberbutton Action

document.getElementById('hamburgerBtn').addEventListener('click', function() {
    const navList = document.getElementById('navList');
    navList.classList.toggle('active');
});





// Most Popular Dishes Carousel Function

let dishes = [
    {
        id: 1,
        title: " Special Chicken Cheese Burger",
        price: "Rs.850",
        image: "resources/populardish1.jpg"
    },
    {
        id: 2,
        title: "Cuisine Special Mix Rice ",
        price: "Rs.2750",
        image: "resources/populardish2.jpg"
    },

    {
        id: 3,
        title: "Creamy Cheese Pasta",
        price: "Rs.1250",
        image: "resources/populardish3.jpg"
    },

    {
        id: 4,
        title: "Chicken Cheese Pizza Large",
        price: "Rs.1950",
        image: "resources/populardish4.jpg"
    },

    {
        id: 5,
        title: "Cuisine Pot Biryani",
        price: "Rs. 2750",
        image: "resources/populardish5.jpg"
    },

    {
        id: 6,
        title: "Sea Food Kottu Large",
        price: "Rs.1250",
        image: "resources/populardish6.jpg"
    }
   
];

// Most Popular Dishes Carousel Function
let currentDishIndex = 0;

function updateDishSlide(index, dataset) {
    let cards = document.querySelectorAll('.card');

    for (let i = 0; i < 3 && (index + i) < dataset.length; i++) {
        let dish = dataset[index + i];
        let card = cards[i];
        let itemId = dish.id;

        card.querySelector('.card-image').src = dish.image;
        card.querySelector('.card-title').textContent = dish.title;
        card.querySelector('.card-price').textContent = dish.price;
        card.querySelector('.add-to-cart').setAttribute('data-item-id', itemId); // Update data-item-id
    }
}

document.querySelector('.prevDish').addEventListener('click', function() {
    currentDishIndex -= 3;
    updateDishSlide(currentDishIndex, dishes); // Update with your dataset
});

document.querySelector('.nextDish').addEventListener('click', function() {
    currentDishIndex += 3;
    updateDishSlide(currentDishIndex, dishes); // Update with your dataset
});

updateDishSlide(currentDishIndex, dishes); // Update with your initial dataset






let menuItems = [
    {
        id: 7,
        title: "Garlic Bread",
        price: "Rs.350",
        image: "resources/garlicbread.jpg"
    },
    
    {
        id: 8,
        title: "Grilled Chicken (Per Plate)",
        price: "Rs.1850",
        image: "resources/grilled-chicken.jpg"
    },

    {
        id: 9,
        title: "Chapathi",
        price: "Rs.450",
        image: "resources/pd10.jpg"
    },

    {
        id: 10,
        title: "Club Sanwitch",
        price: "Rs.750",
        image: "resources/pd9.jpg"
    },
    
    {
        id: 11,
        title: "Chocolate Donut",
        price: "Rs.250",
        image: "resources/pd8.jpg"
    },

    {
        id: 12,
        title: "Ramen",
        price: "Rs.550",
        image: "resources/pd1.jpg"
    }
];

let currentItemIndex = 0;

function updateMenuCarousel(index) {
    let cards = document.querySelectorAll('.menu-card');

    for (let i = 0; i < 3 && (index + i) < menuItems.length; i++) {
        let item = menuItems[index + i];
        let card = cards[i];
        
        card.querySelector('.menu-card-image').src = item.image;
        card.querySelector('.menu-card-title').textContent = item.title;
        card.querySelector('.menu-card-price').textContent = item.price;
    }
}

// Button Actions 

document.querySelector('.prevItem').addEventListener('click', function() {
    currentItemIndex -= 3;
    updateMenuCarousel(currentItemIndex);
});

document.querySelector('.nextItem').addEventListener('click', function() {
    currentItemIndex += 3;
    updateMenuCarousel(currentItemIndex);
});

updateMenuCarousel(currentItemIndex);




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
        title: "Stawberry Smoothie",
        price: "Rs.350",
        image: "resources/pb1.jpg"
    },
    {
        title: "Special Smoothie",
        price: "Rs.850",
        image: "resources/pd2.jpg"
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

let beverages = [
    // Your beverage data here. Example:
    {
        title: "Mojito",
        price: "Rs.1050",
        image: "resources/populardrink6.jpg"
    },

    {
        title: "Mushroom Cocktail",
        price: "Rs.550",
        image: "resources/populardrink4.jpg"
    },

    {
       
        title: "Beer",
        price: "Rs.350",
        image: "resources/ad7.jpg"
    },

    {
        title: "Ballantine's Special Wisky",
        price: "Rs.1250",
        image: "resources/adrink6.jpg"
    },

    {
        title: "Special Cocktail",
        price: "Rs.950",
        image: "resources/adrink2.jpg"
    },

    {
        title: "Absolute Vodka",
        price: "Rs.950",
        image: "resources/adrink3.jpg"
    },
    
];

let currentBeverageIndex = 0;

function updateBeverageSlide(index) {
    let cards = document.querySelectorAll('.beverage-card');

    for (let i = 0; i < 3 && (index + i) < beverages.length; i++) {
        let beverage = beverages[index + i];
        let card = cards[i];
        
        card.querySelector('.beverage-image').src = beverage.image;
        card.querySelector('.beverage-title').textContent = beverage.title;
        card.querySelector('.beverage-price').textContent = beverage.price;
    }
}

document.querySelector('.beverage-prev').addEventListener('click', function() {
    currentBeverageIndex -= 3;
    updateBeverageSlide(currentBeverageIndex);
});

document.querySelector('.beverage-next').addEventListener('click', function() {
    currentBeverageIndex += 3;
    updateBeverageSlide(currentBeverageIndex);
});

updateBeverageSlide(currentBeverageIndex);

// Initialize cart array from session or as an empty array


let cart = [];

// Function to convert a price string to a number
function priceStringToNumber(priceString) {
    return parseFloat(priceString.replace("Rs.", "").trim());
}

// Function to add an item to the cart
function addItemToCart(itemId) {
    // Find the dish object with the matching ID
    const selectedDish = dishes.find((dish) => dish.id === itemId);

    if (selectedDish) {
        // Check if the item already exists in the cart
        const existingItem = cart.find((item) => item.id === itemId);

        if (existingItem) {
            // If the item already exists, increase the count
            existingItem.count += 1;
        } else {
            // If it's a new item, add it to the cart with a count of 1
            selectedDish.count = 1;
            cart.push(selectedDish);
        }

        // Update the cart count in the UI
        updateCartCount();

        // Send the cart data to the server (PHP)
        updateCartOnServer(cart);
    }
}

// Function to send cart data to the server (PHP)
function updateCartOnServer(cart) {
    // Create a new XMLHttpRequest to send data to the server
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    // Send the cart data to the server
    xhr.send(JSON.stringify(cart));
}

// Function to update the cart count in the UI
function updateCartCount() {
    const cartCount = document.getElementById("cart-count");
    cartCount.textContent = cart.reduce((total, item) => total + item.count, 0);
}

// Function to update the cart dropdown content
function updateCartDropdown() {
    const cartItemsList = document.getElementById("cart-items-list");
    cartItemsList.innerHTML = "";

    cart.forEach((item) => {
        const cartItem = document.createElement("li");
        const itemName = document.createElement("span");
        const itemPrice = document.createElement("span");
        const itemCount = document.createElement("span");

        itemName.textContent = item.title;

        if (item.count > 1) {
            const totalItemPrice = priceStringToNumber(item.price) * item.count;
            itemPrice.textContent = `RS.${totalItemPrice.toFixed(2)}`;
            itemCount.textContent = `x${item.count}`;
        } else {
            itemPrice.textContent = item.price;
        }

        cartItem.appendChild(itemName);
        cartItem.appendChild(itemCount);
        cartItem.appendChild(itemPrice);
        cartItemsList.appendChild(cartItem);
    });

    // Add the "Go to Checkout" option as the last item
    if (cart.length > 0) {
        const checkoutLink = document.createElement("a");
        checkoutLink.href = "checkout.php";
        checkoutLink.textContent = "Go to Checkout";
        const checkoutItem = document.createElement("li");
        checkoutItem.appendChild(checkoutLink);
        cartItemsList.appendChild(checkoutItem);
    }

    // Add the "Clear Cart" button
    if (cart.length > 0) {
        addClearCartButton(cartItemsList);
    }
}

// Function to add a "Clear Cart" button
function addClearCartButton(cartItemsList) {
    const clearCartButton = document.createElement("a");
    clearCartButton.textContent = "Clear Cart";
    clearCartButton.addEventListener("click", function () {
        // Clear the cart array and update the UI
        cart = [];
        updateCartCount();
        updateCartDropdown();

        // Send an empty cart to the server (PHP) to clear the session data
        updateCartOnServer([]);

        // Hide the cart dropdown
        const cartDropdownContent = document.getElementById("cart-dropdown-content");
        cartDropdownContent.style.display = "none";
    });

    const clearCartItem = document.createElement("li");
    clearCartItem.appendChild(clearCartButton);
    cartItemsList.appendChild(clearCartItem);
}


// Function to show cart details when hovering over the cart icon
function showCartDetails() {
    if (cart.length > 0) {
        const cartDropdownContent = document.getElementById("cart-dropdown-content");
        cartDropdownContent.style.display = "block";
        updateCartDropdown();
    }
}

// Function to hide cart details when moving the mouse away from the cart icon
function hideCartDetails() {
    const cartDropdownContent = document.getElementById("cart-dropdown-content");
    cartDropdownContent.addEventListener("mouseleave", function () {
        cartDropdownContent.style.display = "none";
    });
}

// Add event listeners to "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll(".add-to-cart");
addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const itemId = parseInt(button.getAttribute("data-item-id"));
        addItemToCart(itemId);
    });
});

// Fetch cart data from the server on page load
const xhr = new XMLHttpRequest();
xhr.open("GET", "fetch_cart.php", true);

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);
        cart = data;
        updateCartCount();
        updateCartDropdown();
    }
};

xhr.send();

// Execute fetchCartData() on page load
window.addEventListener("load", function () {
    fetchCartData();
});
