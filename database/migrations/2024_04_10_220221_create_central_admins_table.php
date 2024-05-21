<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentralAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('central_admins', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->unsignedBigInteger('association_id');
            $table->foreign('association_id')->references('id')->on('scout_associations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('central_admins');
    }
}
