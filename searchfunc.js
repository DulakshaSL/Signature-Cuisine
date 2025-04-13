const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

searchInput.addEventListener('input', handleSearch);

function handleSearch() {
    const query = searchInput.value.toLowerCase();

    // Use AJAX to fetch search results from the server
    fetch(`search.php?query=${query}`)
        .then(response => response.text())
        .then(data => {
            // Display the search results in the dropdown menu
            searchResults.innerHTML = data;
            searchResults.style.display = data ? 'block' : 'none';
        })
        .catch(error => console.error('Error fetching search results:', error));
}

// Close the search results dropdown when clicking outside the search container
document.addEventListener('click', (event) => {
    if (!event.target.closest('.search-container')) {
        searchResults.style.display = 'none';
    }
});









