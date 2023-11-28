// Next and Previous Button Functionality
document.getElementById("nextBtn").addEventListener("click", function () {
    const activeTab = document.querySelector(".nav-link.active");
    const nextTab = activeTab.parentElement.nextElementSibling.querySelector(".nav-link");
    if (nextTab) {
        nextTab.click();
    }
});

document.getElementById("prevBtn").addEventListener("click", function () {
    const activeTab = document.querySelector(".nav-link.active");
    const prevTab = activeTab.parentElement.previousElementSibling.querySelector(".nav-link");
    if (prevTab) {
        prevTab.click();
    }
});

// Tab Navigation and Form Validation
$(document).ready(function () {
    // Initialize variables
    var currentTab = 1;

    // Show the first tab by default
    showTab(currentTab);

    // Function to show a specific tab
    function showTab(tabIndex) {
        $(".tab-pane").removeClass("show active");
        $("#tabs-" + tabIndex).addClass("show active");
    }

    // Next button functionality
    $("#nextBtn").click(function () {
        if (currentTab < 4) {
            currentTab++;
            showTab(currentTab);
        }
    });

    // Previous button functionality
    $("#prevBtn").click(function () {
        if (currentTab > 1) {
            currentTab--;
            showTab(currentTab);
        }
    });

    // Form submission
    $("#medicalRecordForm").submit(function (e) {
        // Flag to track if all required fields are filled out
        var allFieldsFilled = true;

        // Check if all required fields are filled out in the active tab
        $(".tab-pane.show.active input.required, .tab-pane.show.active select.required").each(function () {
            if ($(this).val() === "") {
                allFieldsFilled = false;
                // You can add error handling here, for example:
                // Show an error message or highlight the empty fields.
            }
        });

        if (!allFieldsFilled) {
            // Display an error message or take any other necessary action
            alert("Please fill out all required fields.");
            e.preventDefault(); // Prevent the form from submitting if validation fails
        }
    });
});