    window.history.forward();


    function toggle() {
        var cart = document.querySelector(".cart__box-container");
        cart.classList.toggle('active');
        var cartBox = document.querySelector(".cart__box");
        cartBox.classList.add('active');
    }

    document.querySelector(".cart").addEventListener("click", () => {
        var cartBox = document.querySelector(".cart__box");
        cartBox.classList.add('active');
    })

    document.querySelector(".close__box").addEventListener("click", () => {
        var cartBox = document.querySelector(".cart__box");
        cartBox.classList.remove('active');
    })
    document.querySelector(".checkout").addEventListener("click", () => {
        window.location.reload();
    })

    setTimeout(() => {
        document.getElementById("message").style.display = "none";

    }, 8000);


    function tigger() {
        document.querySelector("#product__img").click();
    }

    function productImg(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.querySelector("#placeholder").setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }


    


