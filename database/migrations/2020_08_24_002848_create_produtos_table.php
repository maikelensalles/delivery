<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProdutosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()  
	{
		Schema::create('produtos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 50); 
			$table->string('descricao', 50);
			$table->string('descricao_longa', 600);
			$table->decimal('valor');
			$table->integer('categoria');
			$table->string('image', 100); 
			$table->string('nome_url', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('produtos');
	}

}
