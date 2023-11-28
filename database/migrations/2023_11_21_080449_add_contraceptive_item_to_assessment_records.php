<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('assessment_records', function (Blueprint $table) {
            // Check if the column exists before adding it
            if (!Schema::hasColumn('assessment_records', 'contraceptive_item_id')) {
                $table->bigInteger('contraceptive_item_id')->unsigned()->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('assessment_records', function (Blueprint $table) {
            $table->dropForeign(['contraceptive_item_id']);
            $table->dropColumn('contraceptive_item_id');
        });
    }
};
