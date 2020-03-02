<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
              
        $table->bigIncrements('id');
        $table->bigInteger('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        $table->string('title');
        $table->longText('body');
        $table->string('image')->nullable(); //�摜���e���Ȃ��ꍇ�ɔ�����NULL�����Ă���
        $table->tinyInteger('status')->default(1)->comment('0=������, 1=�A�N�e�B�u, 2=�폜�ς�');
        // $table->timestamps()�Ƃ��Ă��܂��ƁA���R�[�h���쐬���ꂽ����������Ȃ��̂ŁADB:raw�ōs��
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
