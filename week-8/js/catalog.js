let result_list = document.querySelector(".result-list");

// Send a request for a term and display it
function search(term) {
    let url = 'https://arc.bc.edu/library-search/' + encodeURIComponent(term);
    console.log("requesting search results: " + url);
    fetch(url).then(json).then(showSearchResults);
}

// Convert the JSON to usable data.
function json(response) {
    return response.json()
}

// Show all the search results
function showSearchResults(result) {
    result_list.innerHTML = "";
    result.forEach(displayItem);
}


// Display one result item
function displayItem(item) {

    // Build the metadata display
    let title_line = '<h3>' + item.title + '</h3>';
    let creator_line = '<div>' + item.creator + '</div>';
    let call_number_line = '<div>' + item.call_number + '</div>';

    let metadata_display = '<div class="metadata">' + title_line + creator_line + call_number_line + '</div>';
    let thumbnail_display = '';

    // Build the thumbnail
    if (item.thumbnail) {
        thumbnail_display = '<div class="thumbnail"><img src="' + item.thumbnail + '" alt="book cover"></div>';
    } else {
        thumbnail_display = '<div class="thumbnail"></div>';
    }

    // Add the item to the inner HTML of the result list
    result_list.innerHTML += '<li>' + thumbnail_display + metadata_display + '</li>';
}

// ADD YOUR CODE BELOW