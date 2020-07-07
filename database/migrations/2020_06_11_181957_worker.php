  <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Worker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Wname', 100);
            $table->integer('Wgender');
            $table->integer('Wdesignation');
            $table->string('Wemail', 100);
            $table->string('Wcontact', 50);
            $table->string('Wsellary', 50);
            $table->string('Wimage', 1000);
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
        Schema::dropIfExists('worker');
    }
}
