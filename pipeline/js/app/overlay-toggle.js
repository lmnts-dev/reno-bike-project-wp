document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("mobile-nav-icon").addEventListener('click', function () {
        document.getElementById("overlay-nav" ).classList.add("visible");
        document.getElementsByTagName("header" )[0].classList.add("hidden");
        document.getElementsByTagName("body" )[0].classList.add("overlay-lock");
    });

    document.getElementById("overlay-exit" ).addEventListener('click', function () {
        document.getElementById("overlay-nav" ).classList.remove("visible");
        document.getElementsByTagName("header" )[0].classList.remove("hidden");
        document.getElementsByTagName("body" )[0].classList.remove("overlay-lock");
    });
});