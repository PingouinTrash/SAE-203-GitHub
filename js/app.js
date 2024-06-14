document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    document.body.addEventListener('click', function(event) {
        if (event.target.closest('.openModalBtn')) {
            var btn = event.target.closest('.openModalBtn');
            var productName = btn.getAttribute('data-nom');
            var productDescription = btn.getAttribute('data-description');
            var productPrice = btn.getAttribute('data-prix');
            var productImage = btn.getAttribute('data-image');
            
            modal.querySelector('h5').textContent = productName;
            modal.querySelector('.description').textContent = productDescription;
            modal.querySelector('.prix').textContent = productPrice + ' €/pièce';
            modal.querySelector('.modal-image img').src = productImage;
            modal.querySelector('.modal-image img').alt = productName;

            modal.style.display = "block";
        }
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

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
