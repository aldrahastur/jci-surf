<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('listing_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('listing_id');
            $table->foreign('listing_id', 'listing_id_fk_4508618')->references('id')->on('listings')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_4508618')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
