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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();

            $table->string('invoice_number', 50);
            $table->string('status', 20)->default('draft'); // draft, sent, paid, overdue

            $table->date('issue_date');
            $table->date('due_date');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('paid_at')->nullable();

            // Money stored in CENTS (integer) for precision
            $table->string('currency', 3)->default('USD');
            $table->unsignedBigInteger('subtotal')->default(0);
            $table->decimal('tax_rate', 5, 2)->default(0);
            $table->unsignedBigInteger('tax_amount')->default(0);
            $table->unsignedBigInteger('total')->default(0);

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['company_id', 'invoice_number']);
            $table->index(['company_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
