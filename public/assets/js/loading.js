document.addEventListener("DOMContentLoaded", function () {
    var overlay = document.getElementById("loading-overlay");

    var isLoading = sessionStorage.getItem("loading");

    if (isLoading === "true") {
        overlay.style.display = "flex";
    }

    window.addEventListener("beforeunload", function () {
        sessionStorage.setItem("loading", "true");
        overlay.style.display = "flex";
    });

    window.addEventListener("load", function () {
        setTimeout(function () {
            overlay.style.display = "none";
            sessionStorage.removeItem("loading");
        }, 1000);
    });
});