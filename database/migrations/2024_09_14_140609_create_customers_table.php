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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_pk');
            $table->string('customer_name');
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->text('address')->nullable();
            $table->integer('product_fk');
            $table->string('warranty_year')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('service_frequency');
            $table->string('product_amount')->nullable();
            $table->string('product_remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
