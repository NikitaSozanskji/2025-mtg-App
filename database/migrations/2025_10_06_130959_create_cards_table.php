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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('card_name');
            $table->string('mana_cost')->nullable();
            $table->string('type');
            $table->string('rarity');
            $table->text('rules_text')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }
            //     'card_name'=>'',
            //     'mana_cost'=>'',
            //     'type'=>'',
            //     'rarity'=>'',
            //     'rules_text'=>'',
            //     'image'=>'',
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
