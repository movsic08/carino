<div class="medical-form-2">
    <div class="row">
        <div class="col-3">
            <label for="gravida">Number of pregnancies:</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Gravidity</span>
                <input type="number" class="form-control" name="pregnancies_gravida" id="gravida" placeholder="Enter Gravida" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
        <div class="col-3">
            <label for="parity">Parity:</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Parity</span>
                <input type="number" class="form-control" name="pregnancies_para" id="parity" placeholder="Enter Parity" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3 mb-3">
            <label for="full_term" class="form-label">Full Term:</label>
            <input type="number" class="form-control" name="full_term" id="full_term" placeholder="Enter the number of full-term pregnancies">
        </div>
        <div class="col-3 mb-3">
            <label for="premature" class="form-label">Premature:</label>
            <input type="number" class="form-control" name="premature" id="premature" placeholder="Enter the number of premature pregnancies">
        </div>
        <div class="col-3 mb-3">
            <label for="abortion" class="form-label">Abortion:</label>
            <input type="number" class="form-control" name="abortion" id="abortion" placeholder="Enter the number of abortions">
        </div>
        <div class="col-3 mb-3">
            <label for="living_children" class="form-label">Living children:</label>
            <input type="number" class="form-control" name="living_children" id="living_children" placeholder="Enter the number of living children">
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-4">
            <label for="last_delivery_date" class="form-label">Date of last delivery:</label>
            <input type="date" class="form-control" name="last_delivery_date" id="last_delivery_date" required pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
        </div>
        <div class="col-4">
            <label for="last_delivery_type" class="form-label">Type of last delivery:</label>
            <select name="last_delivery_type" class="form-select" required>
                <option value="" disabled selected>Please choose a delivery type</option>
                <option value="Vaginal">Vaginal</option>
                <option value="Cesarean Section">Cesarean Section</option>
            </select>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-4">
            <label for="last_menstrual_period">Last Menstrual period:</label>
            <input type="date" class="form-control" name="last_menstrual_period" id="last_menstrual_period" required pattern="\d{2}-\d{2}-\d{4}" placeholder="MM-DD-YYYY">
        </div>
        <div class="col-4">
            <label for="previous_menstrual_period">Previous Menstrual period:</label>
            <input type="date" class="form-control" name="previous_menstrual_period" id="previous_menstrual_period" required pattern="\d{2}-\d{2}-\d{4}" placeholder="MM-DD-YYYY">
        </div>
        <div class="col-4">
            <label for="menstrual_flow">Menstrual flow:</label>
            <select name="menstrual_flow" class="form-select" required>
                <option value="" disabled selected>Select Menstrual Flow</option>
                <option value="Scanty">Scanty (1-2 pads per day)</option>
                <option value="Moderate">Moderate (3-5 pads per day)</option>
                <option value="Heavy">Heavy (>5 pads per day)</option>
            </select>
        </div>
    </div>

    <hr>
    <div class="col-4">
        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input" type="checkbox" value="1" name="dysmenorrhea" id="dysmenorrhea" aria-label="Checkbox for Dysmenorrhea">
            </div>
            <label class="form-control" aria-label="Text input with checkbox">Dysmenorrhea</label>
        </div>
    </div>

        <div class="col-6">
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="1" name="hydatidiform_mole" id="hydatidiform_mole" aria-label="Checkbox for Hydatidiform mole">
                </div>
                <label class="form-control" aria-label="Text input with checkbox">Hydatidiform mole (within the last 12 months)</label>
            </div>
        </div>
    
        <div class="col-6">
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="1" name="ectopic_pregnancy" id="ectopic_pregnancy" aria-label="Checkbox for History of ectopic pregnancy">
                </div>
                <label class="form-control" aria-label="Text input with checkbox">History of ectopic pregnancy</label>
            </div>
        </div>
</div>