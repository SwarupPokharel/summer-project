    document.addEventListener('DOMContentLoaded', function() {
    // Function to handle the edit link click
    function handleEditLinkClick(event) {
        event.preventDefault(); // Prevent default link behavior

        const link = event.currentTarget;
        const id = link.getAttribute('data-id');
        const name = link.getAttribute('data-name');
        const price = link.getAttribute('data-price');
        const genre = link.getAttribute('data-genre');
        const description = link.getAttribute('data-description');
        const image = this.dataset.image;   

        console.log(image);

        // Populate form fields
        document.querySelector('#product-id').value = id;
        document.querySelector('#book-title').value = name;
        document.querySelector('#book-price').value = price;
        document.querySelector('#book-genre').value = genre;
        document.querySelector('#book-description').value = description;
        document.querySelector('#edit-image').value = image;
        document.querySelector('#current-image').src = image;

        // Scroll to the form (optional)
        document.querySelector('#edit-data').style.display='block';
    }

    // Attach event listeners to all edit links
    const editLinks = document.querySelectorAll('.edit-btn');
    editLinks.forEach(link => {
        link.addEventListener('click', handleEditLinkClick);
    });
});
