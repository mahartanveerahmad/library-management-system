<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->integer('total_books')->nullable();
            $table->string('donated_by')->nullable();
            $table->string('edition_of_book')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['volume', 'issue', 'total_books', 'donated_by', 'edition_of_book']);
        });
    }
};
