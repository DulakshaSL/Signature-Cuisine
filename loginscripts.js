const quotes = [
    "Life is what happens when you're busy making other plans.",
    "The future belongs to those who believe in the beauty of their dreams.",
    "The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart.",
    // ... Add as many quotes as you want
];

let currentLetterIndex = 0;
let currentQuote = "";
let lastQuoteIndex = -1;  // To track the last shown quote's index

function typeLetterByLetter() {
    if (currentLetterIndex < currentQuote.length) {
        document.getElementById('quotes').innerHTML += currentQuote[currentLetterIndex];
        currentLetterIndex++;
        setTimeout(typeLetterByLetter, 50);  // Change 50 to adjust speed
    } else {
        setTimeout(displayRandomQuote, 5000);  // After the quote is displayed, wait 10 seconds before showing the next
    }
}

function displayRandomQuote() {
    let randomIndex;

    do {
        randomIndex = Math.floor(Math.random() * quotes.length);
    } while (quotes.length > 1 && randomIndex === lastQuoteIndex);  // Make sure we pick a different quote

    lastQuoteIndex = randomIndex;
    currentQuote = quotes[randomIndex];
    currentLetterIndex = 0;
    document.getElementById('quotes').innerHTML = "";  // Clear previous quote
    typeLetterByLetter();
}

// Display the first quote as soon as the page loads
displayRandomQuote();
