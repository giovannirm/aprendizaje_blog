<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            
            $table->string('title', 45);
            $table->text('biografia');
            $table->string('website', 45);
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                /* cascade: borra todos los registros de las diferentes
                tablas que posean el campo user_id y mantengan una relación
                set null: actualiza los registros colocando null en
                los campos user_id de las diferentes tablas, para 
                esto se debe agregar la propiedad nullable() para 
                permitir valores nulos*/
                ->onDelete('cascade')
                /* Esto ayudaría en el caso que el usuario haya
                actualizado su llave primaria que hace referencia a otra
                tabla, por lo tanto tmb se actualizaría las tablas a las
                que tenga relación*/
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
