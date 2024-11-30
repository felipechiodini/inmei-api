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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->uuid();
            $table->string('name');
            $table->string('email');
            $table->string('document');
            $table->string('cellphone');
            $table->timestamps();
        });

        Schema::create('service_request_documents', function (Blueprint $table) {
            $table->id();
            $table->uuid('service_request_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
