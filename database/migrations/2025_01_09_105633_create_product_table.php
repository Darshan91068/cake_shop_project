<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_category_id');
            $table->string('pro_name');
            $table->string('pro_weight')->nullable();
            $table->decimal('pro_price', 10, 2);
            $table->text('pro_description')->nullable();
            $table->decimal('pro_discount', 5, 2)->nullable();
            $table->integer('pro_quantity');
            $table->string('pro_img')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('pro_category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
