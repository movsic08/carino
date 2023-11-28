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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // e.g., 'create', 'update', 'delete'
            $table->string('model'); // e.g., 'InventoryItem'
            $table->unsignedBigInteger('model_id'); // ID of the affected model
            $table->text('changes')->nullable(); // JSON representation of changes (for updates)
            $table->unsignedBigInteger('user_id')->nullable(); // ID of the user who performed the action
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
