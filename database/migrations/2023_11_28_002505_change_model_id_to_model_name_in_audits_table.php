<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('audits', function (Blueprint $table) {
            // Remove the existing 'model_id' column
            $table->dropColumn('model_id');

            // Add a new 'model_name' column
            $table->string('model_name')->after('model')->nullable();
        });
    }

    public function down()
    {
        Schema::table('audits', function (Blueprint $table) {
            // Revert the changes in the 'down' method if necessary
            $table->dropColumn('model_name');
            $table->unsignedBigInteger('model_id')->after('model');
        });
    }
};
