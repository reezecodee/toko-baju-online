<?php

namespace Database\Migrations;

use Framework\QueryBuilder\Blueprint;
use Framework\QueryBuilder\Migration;
use Framework\QueryBuilder\Schema;

class TransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $attribute) {
            $attribute->id();
            $attribute->integer('user_id');
            $attribute->integer('produk_id');
            $attribute->enum('status', ['Dalam antrian', 'Dikirim', 'Ulasan', 'Selesai'], 'Dalam antrian');

            // foreign key
            $attribute->foreign('user_id', 'users', 'id');
            $attribute->foreign('produk_id', 'products', 'id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
