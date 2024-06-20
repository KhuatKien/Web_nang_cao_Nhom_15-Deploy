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
        Schema::create('tblroomtype', function (Blueprint $table) {
            $table->string('RoomType', 25)->primary();
            $table->double('RoomPrice');
            $table->text('RoomDesc');
            $table->integer('Occupancy');
            $table->string('image_path', 50);
            $table->tinyInteger('Status')->default(1);
        
        });

        Schema::create('tbltable', function (Blueprint $table) {
            $table->string('TableID', 10)->primary();
            $table->integer('Occupancy');
            $table->tinyInteger('TableStatus')->default(0);
            
        });

        Schema::create('tblguest', function (Blueprint $table) {
            $table->bigIncrements('GuestID');
            $table->date('DOB');
            $table->string('Gender', 6);
            $table->string('PhoneNo', 15);
            $table->string('PassportNo', 20);
            $table->string('Address', 100);
            $table->string('Postcode', 10);
            $table->string('City', 50);
            $table->string('Country', 50);

            $table->foreign('GuestID')->references('id')->on('users');
        });

        Schema::create('tblroom', function (Blueprint $table) {
            $table->increments('RoomNo');
            $table->string('RoomType', 25);
            $table->tinyInteger('Status')->default(1);

            $table->foreign('RoomType')->references('RoomType')->on('tblroomtype');
        });

        Schema::create('tblbooking', function (Blueprint $table) {
            $table->increments('BookingID');
            $table->unsignedBigInteger('GuestID');
            $table->unsignedInteger('RoomNo');
            $table->date('BookingDate');
            $table->time('BookingTime', 6);
            $table->date('ArrivalDate');
            $table->date('DepartureDate');
            $table->integer('NumAdults');
            $table->integer('NumChildren');
            $table->tinyInteger('Status')->default(0);


            $table->foreign('RoomNo')->references('RoomNo')->on('tblroom');
            $table->foreign('GuestID')->references('GuestID')->on('tblguest');
        });

        Schema::create('tblbill', function (Blueprint $table) {
            $table->increments('BillID');
            $table->unsignedInteger('BookingID');
            $table->double('RoomCharge');
            $table->date('PaymentDate');
            $table->date('ExpireDate');
            $table->double('TotalPrice');

            $table->foreign('BookingID')->references('BookingID')->on('tblbooking');
        });

        Schema::create('tblbookres', function (Blueprint $table) {
            $table->string('BookID', 10)->primary();
            $table->unsignedBigInteger('GuestID');
            $table->string('TableID', 10);
            $table->date('BookDate');
            $table->integer('NumofPeople');
            $table->tinyInteger('StatusRes')->default(0);
            $table->foreign('TableID')->references('TableID')->on('tbltable');
            $table->foreign('GuestID')->references('GuestID')->on('tblguest');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblbookres');
        Schema::dropIfExists('tblbill');
        Schema::dropIfExists('tblbooking');
        Schema::dropIfExists('tbltable');
        Schema::dropIfExists('tblroom');
        Schema::dropIfExists('tblroomtype');
        Schema::dropIfExists('tblguest');
    }
};
