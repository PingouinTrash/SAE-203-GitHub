document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("myModal");
    var btns = document.querySelectorAll(".card.produit");
    var span = document.getElementsByClassName("close")[0];

    btns.forEach(function(btn) {
        btn.onclick = function() {
            modal.style.display = "block";
            document.getElementById("modalImage").src = this.querySelector(".image").src;
            document.getElementById("modalName").textContent = this.querySelector("h3").textContent;
            document.getElementById("modalDescription").textContent = "Description du produit";
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
});