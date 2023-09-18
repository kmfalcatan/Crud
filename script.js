const inputElements = document.querySelectorAll('.inputData');

// Function to add a class to a paragraph when an input is clicked
function addClassToParagraph(event) {
    const clickedInput = event.target; // The input element that was clicked
    const paragraph = clickedInput.previousElementSibling;
    paragraph.classList.add('highlight');
}

// Add a click event listener to each input element
inputElements.forEach(function(input) {
    input.addEventListener('click', addClassToParagraph);
});

const closeBtn = document.querySelector('.closeBtn');
const error = document.querySelector('.js-errorContainer');
const errorParagraph = document.querySelector('.js-error');

closeBtn.addEventListener('click', function(){
    if(error.classList.contains('errorContainer')){
        error.classList.remove('errorContainer');
        errorParagraph.style.opacity = '0';
    }
});