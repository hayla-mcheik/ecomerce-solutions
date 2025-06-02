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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->enum('status', ['pending', 'processing', 'completed', 'declined', 'cancelled', 'refunded'])
                  ->default('pending');
            $table->decimal('grand_total', 10, 2);
            $table->unsignedInteger('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['cod', 'credit_card', 'paypal', 'bank_transfer']);
            
            // Shipping/Billing Address
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->text('notes')->nullable();
            
            // Payment details (if needed)
            $table->string('payment_transaction_id')->nullable();
            $table->string('payment_status')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
