<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->boolean('medical_history_severe_headaches');
            $table->boolean('medical_history_stroke_heart_attack_hypertension');
            $table->boolean('medical_history_hematoma_bruising_gum_bleeding');
            $table->boolean('medical_history_breast_cancer_mass');
            $table->boolean('medical_history_severe_chest_pain');
            $table->boolean('medical_history_cough');
            $table->boolean('medical_history_jaundice');
            $table->boolean('medical_history_vaginal_bleeding');
            $table->boolean('medical_history_vaginal_discharge');
            $table->boolean('medical_history_medication');
            $table->boolean('medical_history_smoker');
            $table->string('medical_history_disability');
            $table->string('medical_history_disability_specify')->nullable();
             /** Tab 2 */
            $table->integer('pregnancies_gravida');
            $table->integer('pregnancies_para');
            $table->integer('full_term');
            $table->integer('premature');
            $table->integer('abortion');
            $table->integer('living_children');
            $table->date('last_delivery_date');
            $table->string('last_delivery_type');             
            $table->date('last_menstrual_period');
            $table->date('previous_menstrual_period');
            $table->string('menstrual_flow');
            $table->boolean('dysmenorrhea');
            $table->boolean('hydatidiform_mole');
            $table->boolean('ectopic_pregnancy')->nullable()->default(null);
             /** Tab 3 */
            $table->boolean('sti_discharge');
            $table->boolean('sti_sores');
            $table->boolean('sti_pain');
            $table->boolean('sti_treatment');
            $table->boolean('sti_hiv_aid_pid');
            $table->string('sti_discharge_location')->nullable();
            $table->boolean('vaw_unpleasant_relationship');
            $table->boolean('vaw_partner_approval');
            $table->boolean('vaw_domestic_violence');
            $table->string('vaw_support')->nullable();
            $table->string('vaw_support_others_specify')->nullable();
             /* Tab 4 */
            $table->string('weight');
            $table->string('blood_pressure');
            $table->string('height');
            $table->string('pulse_rate');
            $table->string('skin');
            $table->string('extremities');
            $table->string('conjunctiva');
            $table->string('neck');
            $table->string('breast');
            $table->string('abdomen');
            /* Pelvic Examination */
            $table->boolean('pelvic_examination_normal')->default(false);
            $table->boolean('pelvic_examination_mass')->default(false);
            $table->boolean('pelvic_examination_abnormal_discharge')->default(false);
            $table->boolean('pelvic_examination_cervical_abnormalities')->default(false);
            $table->string('cervical_condition')->nullable();
            $table->boolean('pelvic_examination_cervical_consistency')->default(false);
            $table->string('cervical_consistency_condition')->nullable();
            $table->boolean('pelvic_examination_cervical_tenderness')->default(false);
            $table->boolean('pelvic_examination_adnexal_mass_tenderness')->default(false);
            $table->boolean('pelvic_examination_uterine_position')->default(false);
            $table->string('uterine_position_condition')->nullable();
            $table->boolean('pelvic_examination_uterine_depth')->default(false);
            $table->float('uterine_depth', 8, 2)->nullable();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
