document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Event delegation for dynamically created buttons
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('openModalBtn')) {
            modal.style.display = "block";
        }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Quantity control
    var decreaseBtn = document.querySelector('.decrease');
    var increaseBtn = document.querySelector('.increase');
    var quantityInput = document.querySelector('.quantity-control input');

    decreaseBtn.onclick = function() {
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    increaseBtn.onclick = function() {
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
});