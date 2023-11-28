$(document).ready(function() {
    // Initially hide the "Other Reason" text field
    $("#other_reason_group").hide();

    // Listen for changes in the "Reason for FP" dropdown
    $("#reason_for_fp").change(function() {
        // Get the selected value
        var selectedValue = $(this).val();

        // Show the "Other Reason" text field if "Other" is selected
        if (selectedValue === "Other") {
            $("#other_reason_group").show();
        } else {
            // Hide the "Other Reason" text field for other selections
            $("#other_reason_group").hide();
        }
    });
});

document.getElementById('date_of_birth').addEventListener('change', function() {
    const dob = new Date(this.value);
    if (!isNaN(dob)) {
        const today = new Date();
        const age = today.getFullYear() - dob.getFullYear();
        document.getElementById('age').value = age;
    } else {
        document.getElementById('age').value = '';
    }
});

document.getElementById('spouse_date_of_birth').addEventListener('change', function() {
    const spouseDob = new Date(this.value);
    if (!isNaN(spouseDob)) {
        const today = new Date();
        const spouseAge = today.getFullYear() - spouseDob.getFullYear();
        document.getElementById('spouse_age').value = spouseAge;
    } else {
        document.getElementById('spouse_age').value = '';
    }
});



function capitalizeWords(inputElement) {
    const words = inputElement.value.split(' ');
    const capitalizedWords = words.map(word => {
        if (word.length > 0) {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }
        return '';
    });
    inputElement.value = capitalizedWords.join(' ');
}

// Add event listeners to input fields to trigger the function
const inputFields = document.querySelectorAll('input[type="text"]');
inputFields.forEach(input => {
    input.addEventListener('input', function() {
        capitalizeWords(input);
    });
});

const enteredData = [];

    function isDataUnique(data) {
        const lowerCaseData = data.toLowerCase();
        return !enteredData.includes(lowerCaseData);
    }

    // Modify the displayError function to use SweetAlert2
    function displayError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message,
        });
    }

    const submitButton = document.getElementById('next-page');
    submitButton.addEventListener('click', function (event) {
        event.preventDefault();

        const lastName = document.getElementById('last_name').value;
        const firstName = document.getElementById('first_name').value;
        const inputData = `${lastName} ${firstName}`;

        if (isDataUnique(inputData)) {
            enteredData.push(inputData);
            document.getElementById('multi-page-form').submit();
        } else {
            displayError('Duplicate data detected. Please enter unique information.');
        }
    });