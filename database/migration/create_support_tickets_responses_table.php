<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create(config('support-ticket.tables.ticket_responses'), function (Blueprint $table) {
            $table->id();
            $table->text('response');

            $table->string('responder_type')->default(config('support-ticket.responder_type'));
            $table->unsignedBigInteger('responder_id');
            $table->boolean('is_closed')->default(false);
            $table->timestamps();

            $table->foreign('responder_id')->references('id')->on(config('support-ticket.tables.employees'))->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('support-ticket.tables.ticket_responses'));
    }
};