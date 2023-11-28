<div class="medical-form-1">
  <label><strong>Does the client have any of the following?</strong></label><br>
  <ul>
      <li>
          <span>severe headaches / migraine</span>
          <input type="radio" name="medical_history_severe_headaches" value="YES"> YES
          <input type="radio" name="medical_history_severe_headaches" value="NO"> NO
      </li>
      <li>
          <span>history of stroke / heart attack / hypertension</span>
          <input type="radio" name="medical_history_stroke_heart_attack_hypertension" value="YES"> YES
          <input type="radio" name="medical_history_stroke_heart_attack_hypertension" value="NO"> NO
      </li>
      <li>
          <span>non-traumatic hematoma / frequent bruising or gum bleeding</span>
          <input type="radio" name="medical_history_hematoma_bruising_gum_bleeding" value="YES"> YES
          <input type="radio" name="medical_history_hematoma_bruising_gum_bleeding" value="NO"> NO
      </li>
      <li>
          <span>current or history of breast cancer / breast mass</span>
          <input type="radio" name="medical_history_breast_cancer_mass" value="YES"> YES
          <input type="radio" name="medical_history_breast_cancer_mass" value="NO"> NO
      </li>
      <li>
          <span>severe chest pain</span>
          <input type="radio" name="medical_history_severe_chest_pain" value="YES"> YES
          <input type="radio" name="medical_history_severe_chest_pain" value="NO"> NO
      </li>
      <li>
          <span>cough for more than 14 days</span>
          <input type="radio" name="medical_history_cough" value="YES"> YES
          <input type="radio" name="medical_history_cough" value="NO"> NO
      </li>
      <li>
          <span>jaundice</span>
          <input type="radio" name="medical_history_jaundice" value="YES"> YES
          <input type="radio" name="medical_history_jaundice" value="NO"> NO
      </li>
      <li>
          <span>unexplained vaginal bleeding</span>
          <input type="radio" name="medical_history_vaginal_bleeding" value="YES"> YES
          <input type="radio" name="medical_history_vaginal_bleeding" value="NO"> NO
      </li>
      <li>
          <span>abnormal vaginal discharge</span>
          <input type="radio" name="medical_history_vaginal_discharge" value="YES"> YES
          <input type="radio" name="medical_history_vaginal_discharge" value="NO"> NO
      </li>
      <li>
          <span>intake of phenobarbital (anti-seizure) or rifampicin (anti-TB)</span>
          <input type="radio" name="medical_history_medication" value="YES"> YES
          <input type="radio" name="medical_history_medication" value="NO"> NO
      </li>
      <li>
          <span>is the client a SMOKER?</span>
          <input type="radio" name="medical_history_smoker" value="YES"> YES
          <input type="radio" name="medical_history_smoker" value="NO"> NO
      </li>
      <li>
          <span>with Disability?</span>
          <input type="radio" name="medical_history_disability" value="1" id="yesRadio"> YES
          <input type="radio" name="medical_history_disability" value="0" id="noRadio"> NO
          <br>
          <label id="specifyLabel" class="hidden">Specify:&nbsp;</label>
          <input type="text" name="medical_history_disability_specify" id="specifyInput" class="hidden" pattern="^[a-zA-Z0-9\s]+$" maxlength="255"><br>
      </li>
  </ul>
</div>