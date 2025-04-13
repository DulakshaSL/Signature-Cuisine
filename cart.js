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
}
