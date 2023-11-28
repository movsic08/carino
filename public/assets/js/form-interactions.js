// Add event listeners to the radio buttons
const yesRadio = document.getElementById("yesRadio");
const noRadio = document.getElementById("noRadio");
const specifyLabel = document.getElementById("specifyLabel");
const specifyInput = document.getElementById("specifyInput");

function toggleSpecifyFields() {
  // Toggle the visibility of the label and input field based on the radio button's value
  if (yesRadio.checked) {
    specifyLabel.style.display = "inline-block";
    specifyInput.style.display = "inline-block";
  } else {
    specifyLabel.style.display = "none";
    specifyInput.style.display = "none";
  }
}

// Add change event listeners to both radio buttons
yesRadio.addEventListener("change", toggleSpecifyFields);
noRadio.addEventListener("change", toggleSpecifyFields);

// Initialize the input field visibility
toggleSpecifyFields();


// Group 1: Handling "sti_discharge" radio buttons
function handleSTIDischargeRadios() {
  const stiDischargeRadio = document.querySelectorAll('input[name="sti_discharge"]');
  const dischargeLocationRadios = document.querySelectorAll('input[name="sti_discharge_location"]');

  stiDischargeRadio.forEach(function (radio) {
      radio.addEventListener('change', function () {
          if (this.value === "yes") {
              enableDischargeLocationRadios(dischargeLocationRadios);
          } else {
              disableDischargeLocationRadios(dischargeLocationRadios);
          }
      });
  });

  function enableDischargeLocationRadios(locationRadios) {
      locationRadios.forEach(function (locationRadio) {
          locationRadio.disabled = false;
      });
  }

  function disableDischargeLocationRadios(locationRadios) {
      locationRadios.forEach(function (locationRadio) {
          locationRadio.disabled = true;
          locationRadio.checked = false;
      });
  }
}



// Function to handle changes in pelvic examination elements
function handlePelvicExaminationChange(checkboxId, findingsId) {
  const checkbox = document.getElementById(checkboxId);
  const findingsSelect = document.getElementById(findingsId).querySelector("select");

  checkbox.addEventListener("change", function() {
    if (checkbox.checked) {
      findingsSelect.disabled = false;
    } else {
      findingsSelect.disabled = true;
      findingsSelect.selectedIndex = 0; // Reset the selection
    }
  });
}

// Register event listeners for different pelvic examination elements
handlePelvicExaminationChange("pelvic_examination_cervical_abnormalities", "cervical_abnormalities_findings");
handlePelvicExaminationChange("pelvic_examination_cervical_consistency", "cervical_consistency_findings");
handlePelvicExaminationChange("pelvic_examination_uterine_position", "uterine_position_findings");

document.getElementById("pelvic_examination_uterine_depth").addEventListener("change", function() {
  const checkbox = this;
  const depthInput = document.querySelector("#uterine_depth_input input");

  if (checkbox.checked) {
    depthInput.disabled = false;
  } else {
    depthInput.disabled = true;
    depthInput.value = ""; // Clear the input
  }
});


// JavaScript to center the checkboxes within their input-group divs
const checkboxes = document.querySelectorAll('.form-check-input');
  
checkboxes.forEach(checkbox => {
  checkbox.style.margin = 'auto'; // Center horizontally
  checkbox.style.verticalAlign = 'middle'; // Center vertically
});


// Function to capitalize the first letter of every word
function capitalizeWords(str) {
  return str.replace(/\b\w/g, function (match) {
    return match.toUpperCase();
  });
}

// Get all the <span> elements within the list items in medical-form-1
var spanElements1 = document.querySelectorAll('.medical-form-1 li span');

// Capitalize the text inside each <span> element in medical-form-1
spanElements1.forEach(function (span) {
  span.textContent = capitalizeWords(span.textContent);
});

// Get all the text elements within the specified HTML structure in medical-form-3
var textElements3 = document.querySelectorAll('.medical-form-3 li span');

// Capitalize the text inside each text element in medical-form-3
textElements3.forEach(function (element) {
  element.textContent = capitalizeWords(element.textContent);
});

function capitalizeFirstLetter(inputElement) {
  var words = inputElement.value.split(' ');

  for (var i = 0; i < words.length; i++) {
    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
  }

  inputElement.value = words.join(' ');
}

// Attach the function to text input elements
var textInputs = document.querySelectorAll('input[type="text"]');
for (var i = 0; i < textInputs.length; i++) {
  textInputs[i].addEventListener('blur', function () {
    capitalizeFirstLetter(this);
  });
}