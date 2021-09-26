<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJciChaptersTable extends Migration
{
    public function up()
    {
        Schema::table('jci_chapters', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_4509728')->references('id')->on('countries');
        });
    }
}
