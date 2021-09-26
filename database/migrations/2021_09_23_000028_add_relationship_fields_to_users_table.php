<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('jci_chapter_id')->nullable();
            $table->foreign('jci_chapter_id', 'jci_chapter_fk_4509736')->references('id')->on('jci_chapters');
        });
    }
}
