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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_code', 255)->nullable();
            $table->string('client_accout_number', 255)->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->date('date_of_birth');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();    
            $table->string('barangay');
            $table->string('city_municipality');
            $table->string('province');
            $table->string('contact_number');
            $table->string('educational_attainment');
            $table->string('occupation');
            $table->string('civil_status');
            $table->string('religion');
            $table->string('spouse_last_name');
            $table->string('spouse_first_name');
            $table->string('spouse_middle_name')->nullable();
            $table->date('spouse_date_of_birth');
            $table->integer('spouse_age');
            $table->string('spouse_occupation');
            $table->integer('number_of_children');
            $table->string('plan_more_children');
            $table->decimal('average_monthly_income', 10, 2)->default(0);
            $table->string('type_of_client')->default('New Acceptor');
            $table->string('reason_for_fp')->default('Spacing');
            $table->string('other_reason')->nullable();
            $table->string('method_accepted');
            $table->string('iud_type')->nullable();
            $table->string('other_method_reason')->nullable();
            $table->date('actual_date_joined')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
