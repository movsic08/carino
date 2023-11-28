<div class="medical-form-3">
    <ol type="A">
        <li>
            <h6 class="mb-3">RISKS FOR SEXUALLY TRANSMITTED INFECTIONS</h6>
            <ul>
                <li>
                    <span>Abnormal discharge from the genital area:</span>
                    <label><input type="radio" name="sti_discharge" value="1"> YES</label>
                    <label><input type="radio" name="sti_discharge" value="0"> NO</label>
                    <br>
                    <span>(If "YES," please indicate if from:)</span>
                    <label><input type="radio" name="sti_discharge_location" value="vagina" disabled> Vagina</label>
                    <label><input type="radio" name="sti_discharge_location" value="penis" disabled> Penis</label>
                </li>

                <li>
                    <span>Sores or ulcers in the genital area:</span>
                    <label><input type="radio" name="sti_sores" value="1"> YES</label>
                    <label><input type="radio" name="sti_sores" value="0"> NO</label>
                </li>
                <li>
                    <span>Pain or burning sensation in the genital area:</span>
                    <label><input type="radio" name="sti_pain" value="1"> YES</label>
                    <label><input type="radio" name="sti_pain" value="0"> NO</label>
                </li>
                <li>
                    <span>History of treatment for sexually transmitted infections:</span>
                    <label><input type="radio" name="sti_treatment" value="1"> YES</label>
                    <label><input type="radio" name="sti_treatment" value="0"> NO</label>
                </li>
                <li>
                    <span>HIV / AIDS / Pelvic inflammatory disease:</span>
                    <label><input type="radio" name="sti_hiv_aid_pid" value="1"> YES</label>
                    <label><input type="radio" name="sti_hiv_aid_pid" value="0"> NO</label>
                </li>
            </ul>
        </li>

        <hr>

        <li>
            <h6>RISKS FOR VIOLENCE AGAINST WOMEN (VAW)</h6>
            <label><b>Does the client or the client's partner have any of the following?</b></label><br>
            <div>
                <ul>
                    <li>
                        <span>Unpleasant relationship with partner:</span>
                        <label><input type="radio" name="vaw_unpleasant_relationship" value="1"> YES</label>
                        <label><input type="radio" name="vaw_unpleasant_relationship" value="0"> NO</label>
                    </li>
                    <li>
                        <span>Partner does not approve of the visit to FP clinic:</span>
                        <label><input type="radio" name="vaw_partner_approval" value="1"> YES</label>
                        <label><input type="radio" name="vaw_partner_approval" value="0"> NO</label>
                    </li>
                    <li>
                        <span>History of domestic violence or VAW:</span>
                        <label><input type="radio" name="vaw_domestic_violence" value="1"> YES</label>
                        <label><input type="radio" name="vaw_domestic_violence" value="0"> NO</label>
                        <span style="margin-left: 10px;">Referred to: </span>
                        <div>
                            <label><input type="radio" name="vaw_support" value="dswd"> DSWD</label>
                            <label><input type="radio" name="vaw_support" value="wcpu"> WCPU</label>
                            <label><input type="radio" name="vaw_support" value="ngos"> NGOs</label>
                            <label>
                                <input type="radio" name="vaw_support" value="others"> Others (Specify):
                                <input type="text" name="vaw_support_others_specify" disabled>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
    </ol>
</div>

<script>
    // Group 1: Handling "sti_discharge" radio buttons
    function handleSTIDischargeRadios() {
        const stiDischargeRadio = document.querySelectorAll('input[name="sti_discharge"]');
        const stiDischargeLocationRadios = document.querySelectorAll('input[name="sti_discharge_location"]');

        stiDischargeRadio.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.value === "1") {
                    enableSTIDischargeLocationRadios(stiDischargeLocationRadios);
                } else {
                    disableSTIDischargeLocationRadios(stiDischargeLocationRadios);
                }
            });
        });

        function enableSTIDischargeLocationRadios(locationRadios) {
            locationRadios.forEach(function (radio) {
                radio.disabled = false;
            });
        }

        function disableSTIDischargeLocationRadios(locationRadios) {
            locationRadios.forEach(function (radio) {
                radio.disabled = true;
                radio.checked = false;
            });
        }
    }

    // Group 2: Handling "vaw_domestic_violence" and "vaw_support" radio buttons
    function handleVAWDomesticViolenceRadios() {
        const vawDomesticViolenceRadio = document.querySelectorAll('input[name="vaw_domestic_violence"]');
        const vawSupportRadios = document.querySelectorAll('input[name="vaw_support"]');
        const vawSupportOthersSpecify = document.querySelector('input[name="vaw_support_others_specify"]');

        vawDomesticViolenceRadio.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.value === "1") {
                    enableVAWSupportRadios(vawSupportRadios);
                } else {
                    disableVAWSupportRadios(vawSupportRadios);
                }
            });
        });

        vawSupportRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.value === "others") {
                    enableVAWSupportOthersSpecify(vawSupportOthersSpecify);
                } else {
                    disableVAWSupportOthersSpecify(vawSupportOthersSpecify);
                }
            });
        });

        function enableVAWSupportRadios(supportRadios) {
            supportRadios.forEach(function (radio) {
                radio.disabled = false;
            });
        }

        function disableVAWSupportRadios(supportRadios) {
            supportRadios.forEach(function (radio) {
                radio.disabled = true;
                radio.checked = false;
            });
        }

        function enableVAWSupportOthersSpecify(othersSpecify) {
            othersSpecify.disabled = false;
        }

        function disableVAWSupportOthersSpecify(othersSpecify) {
            othersSpecify.disabled = true;
            othersSpecify.value = "";
        }
    }

    // Call the functions to set up event listeners
    handleSTIDischargeRadios();
    handleVAWDomesticViolenceRadios();
</script>