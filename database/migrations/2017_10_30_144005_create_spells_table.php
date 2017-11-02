<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpellsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('spells', function (Blueprint $table) {
            $table->integer('id');
            //$table->increments('id');
            //$table->int('index');
            $table->string('name');
            $table->longText('desc');
            $table->longText('higher_level');
            $table->string('page');
            $table->string('range');
            $table->string('components');
            $table->text('material');
            $table->boolean('ritual');
            $table->string('duration');
            $table->boolean('concentration');
            $table->string('casting_time');
            $table->integer('level');
            $table->integer('school');
            // instead of this being a csv of class strings, we probably
            // want (in addition to a class table), and junction table
            // call spell_classes or something that can have multiple
            // entries for each spell, where each entry is spell id (or) index and
            // the id of the class it belongs to
            $table->string('classes');
            // as above
            $table->string('subclasses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('spells');
    }
}
