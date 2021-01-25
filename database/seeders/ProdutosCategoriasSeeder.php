<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\ProdutoCategoria;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Produto;


class ProdutosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $prods = Produto::all();
        $cates = Categoria::all()->pluck('id')->toArray();



        foreach($prods as $p){
              $elements = rand(2, 6);
              for($i=0; $i<$elements; $i++ ){
                  do{
                  $cate_id = $faker->randomElement($cates);
                  }
                  while(
                     ProdutoCategoria::where('categoria_id',$p->id)
                      ->where('produto_id',$cate_id)->exists()
                      );
                      ProdutoCategoria::create([
                          'produto_id' => $p->id,
                          'categoria_id'=> $cate_id,

                      ]);

              }
        }
    }
}
