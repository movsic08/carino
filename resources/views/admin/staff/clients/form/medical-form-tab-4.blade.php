<div class="medical-form-4">
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <label class="form-label">Weight</label>
        <div class="input-group">
          <input type="text" class="form-control" name="weight" placeholder="Enter weight in kg">
          <span class="input-group-text">kg</span>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="mb-3">
        <label class="form-label">Blood Pressure</label>
        <div class="input-group">
          <input type="text" class="form-control" name="blood_pressure" placeholder="Enter blood pressure in mmHg">
          <span class="input-group-text">mmHg</span>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="mb-3">
        <label class="form-label">Height</label>
        <div class="input-group">
          <input type="text" class="form-control" name="height" placeholder="Enter height in meters">
          <span class="input-group-text">m</span>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label class="form-label">Pulse Rate</label>
        <div class="input-group">
          <input type="text" class="form-control" name="pulse_rate" placeholder="Enter pulse rate per minute">
          <span class="input-group-text">/min</span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="mb-3">
        <label for="skin" class="form-label">Skin</label>
        <select class="form-select" id="skin" name="skin">
          <option value="" selected disabled>Select Skin Condition</option>
          <option value="Normal">Normal</option>
          <option value="Pale">Pale</option>
          <option value="Yellowish">Yellowish</option>
          <option value="Hematoma">Hematoma</option>
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label for="extremities" class="form-label">Extremities</label>
        <select class="form-select" id="extremities" name="extremities">
          <option value="" selected disabled>Select Extremities Condition</option>
          <option value="Normal">Normal</option>
          <option value="Edema">Edema</option>
          <option value="Varicosities">Varicosities</option>
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label for="conjunctiva" class="form-label">Conjunctiva</label>
        <select class="form-select" id="conjunctiva" name="conjunctiva">
          <option value="" selected disabled>Select Conjunctiva Appearance</option>
          <option value="Normal">Normal</option>
          <option value="Pale">Pale</option>
          <option value="Yellowish">Yellowish</option>
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label for="neck" class="form-label">Neck</label>
        <select class="form-select" id="neck" name="neck">
          <option value="" selected disabled>Select Neck Condition</option>
          <option value="Normal">Normal</option>
          <option value="Neck Mass">Neck Mass</option>
          <option value="Enlarged Lymph Nodes">Enlarged Lymph Nodes</option>
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label for="breast" class="form-label">Breast</label>
        <select class="form-select" id="breast" name="breast">
          <option value="" selected disabled>Select Breast Condition</option>
          <option value="Normal">Normal</option>
          <option value="Mass">Mass</option>
          <option value="Nipple Discharge">Nipple Discharge</option>
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label for="abdomen" class="form-label">Abdomen</label>
        <select class="form-select" id="abdomen" name="abdomen">
          <option value="" selected disabled>Select Abdomen Condition</option>
          <option value="Normal">Normal</option>
          <option value="Abdominal Mass">Abdominal Mass</option>
          <option value="Varicosities">Varicosities</option>
        </select>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col">
      <div class="mb-3">
        @if ($client->method_accepted === 'IUD, Interval' || $client->method_accepted === 'IUD, Post Interval')
        <hr>
        <label class="form-label"><strong>Pelvic Examination (for IUD Acceptors)</strong></label>

        <!-- Row 1: Normal, Mass, and Abnormal Discharge -->
        <div class="row mb-3">
          <div class="col-4">
            <label class="form-label">Is the Pelvic Examination Normal?</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_normal" name="pelvic_examination_normal">
              </div>
              <input type="text" class="form-control text-center" value="Normal" disabled>
            </div>
          </div>
          <div class="col-4">
            <label class="form-label">Is a Mass Detected?</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_mass" name="pelvic_examination_mass">
              </div>
              <input type="text" class="form-control text-center" value="Mass" disabled>
            </div>
          </div>
          <div class="col-4">
            <label class="form-label">Is Abnormal Discharge Present?</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_abnormal_discharge" name="pelvic_examination_abnormal_discharge">
              </div>
              <input type="text" class="form-control text-center" value="Abnormal Discharge" disabled>
            </div>
          </div>
        </div>

        <!-- Row 2: Cervical Abnormalities -->
        <div class="row mb-3">
          <div class="col-6">
            <label class="form-label">Have Cervical Abnormalities Been Detected?</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_cervical_abnormalities" name="pelvic_examination_cervical_abnormalities">
              </div>
              <input type="text" class="form-control text-center" value="Cervical Abnormalities" disabled>
            </div>
          </div>

          <div class="col-6" id="cervical_abnormalities_findings">
            <label class="form-label">Findings for Cervical Abnormalities:</label>
            <select class="form-select" name="cervical_condition" disabled>
              <option value="" disabled selected>Select a finding</option>
              <option value="warts">Warts</option>
              <option value="polyp_cyst">Polyp or Cyst</option>
              <option value="inflammation_erosion">Inflammation or Erosion</option>
              <option value="bloody_discharge">Bloody Discharge</option>
            </select>
          </div>
        </div>

        <!-- Row 3: Cervical Consistency -->
        <div class="row mb-3">
          <div class="col-6">
            <label class="form-label">Cervical Condition:</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_cervical_consistency" name="pelvic_examination_cervical_consistency">
              </div>
              <input type="text" class="form-control text-center" value="Cervical Consistency" disabled>
            </div>
          </div>

          <div class="col-6" id="cervical_consistency_findings">
            <label class="form-label">Consistency for Cervical Consistency:</label>
            <select class="form-select" name="cervical_consistency_condition" disabled>
              <option value="" disabled selected>Select a finding</option>
              <option value="firm">Firm</option>
              <option value="soft">Soft</option>
            </select>
          </div>
        </div>

        <!-- Row 4: Cervical Tenderness and Adnexal Mass/Tenderness -->
        <div class="row mb-3">
          <div class="col-6">
            <label class="form-label">Is Cervical Tenderness Present?</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_cervical_tenderness" name="pelvic_examination_cervical_tenderness">
              </div>
              <input type="text" class="form-control text-center" value="Cervical Tenderness" disabled>
            </div>
          </div>
          <div class="col-6">
            <label class="form-label">Is Adnexal Mass or Tenderness Present?</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_adnexal_mass_tenderness" name="pelvic_examination_adnexal_mass_tenderness">
              </div>
              <input type="text" class="form-control text-center" value="Adnexal Mass/Tenderness" disabled>
            </div>
          </div>
        </div>

        <!-- Row 5: Uterine Position -->
        <div class="row mb-3">
          <div class="col-6">
            <label class="form-label">Uterine Position:</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_uterine_position" name="pelvic_examination_uterine_position">
              </div>
              <input type="text" class="form-control text-center" value="Uterine Position" disabled>
            </div>
          </div>

          <div class="col-6" id="uterine_position_findings">
            <label class="form-label">Select Uterine Position:</label>
            <select class="form-select" name="uterine_position_condition" disabled>
              <option value="" disabled selected>Select Uterine Position</option>
              <option value="mid">Mid</option>
              <option value="anteflexed">Anteflexed</option>
              <option value="retroflexed">Retroflexed</option>
            </select>
          </div>
        </div>

        <!-- Row 6: Uterine Depth -->
        <div class="row mb-3">
          <div class="col-6">
            <label class="form-label">Examine Uterine Depth:</label>
            <div class="input-group">
              <div class="input-group-text">
                <input class="form-check-input" type="checkbox" id="pelvic_examination_uterine_depth" name="pelvic_examination_uterine_depth">
              </div>
              <input type="text" class="form-control text-center" value="Uterine Depth" disabled>
            </div>
          </div>

          <div class="col-6" id="uterine_depth_input">
            <label class="form-label">Uterine Depth (in cm):</label>
            <div class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" name="uterine_depth" placeholder="Enter uterine depth in cm" disabled>
                <span class="input-group-text">cm</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Additional options can be added here -->
      </div>
      @endif
    </div>
  </div>
</div>

<script>
  // Function to enable or disable fields based on the selected method
  function toggleFields() {
      var methodAccepted = document.getElementById("methodAcceptedSelect").value;

      // Get all the input fields to toggle
      var fieldsToToggle = [
          "pelvic_examination_normal",
          "pelvic_examination_mass",
          "pelvic_examination_abnormal_discharge",
          "pelvic_examination_cervical_abnormalities",
          "cervical_condition",
          "pelvic_examination_cervical_consistency",
          "cervical_consistency_condition",
          "pelvic_examination_cervical_tenderness",
          "pelvic_examination_adnexal_mass_tenderness",
          "pelvic_examination_uterine_position",
          "uterine_position_condition",
          "pelvic_examination_uterine_depth",
          "uterine_depth_input",
      ];

      // Loop through the fields and enable/disable them based on the method accepted
      fieldsToToggle.forEach(function(fieldId) {
          var element = document.getElementById(fieldId);
          if (methodAccepted === "IUD") {
              element.removeAttribute("disabled");
              // Check the checkbox when enabling the field
              if (fieldId.startsWith("pelvic_examination_")) {
                  document.getElementById(fieldId).checked = true;
              }
          } else {
              element.setAttribute("disabled", true);
              // Uncheck the checkbox when disabling the field
              if (fieldId.startsWith("pelvic_examination_")) {
                  document.getElementById(fieldId).checked = false;
              }
          }
      });
  }

  // Add an event listener to the select element to detect changes
  document.getElementById("methodAcceptedSelect").addEventListener("change", toggleFields);

  // Initial toggle based on the default select value
  toggleFields();
</script>