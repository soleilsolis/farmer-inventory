<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_variants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double('price')->default(0);
            $table->foreignIdFor(ProductType::class);
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('CASCADE');
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
        Schema::dropIfExists('product_type_variants');
    }
};
