<?php 

namespace App\Repositories\QueryBuilder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface{
  private $table;

  public function __construct(DB $db){
    $this->table = $db::table('blogs');
  }

  public function getAll(){
    return $this->table->get();
  }
  public function getById($id){
    return $this->table->find($id);
  }
  public function create(array $attributes){
    $blogId = $this->table->insertGetId(
      array_merge(
        $attributes,
        [
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]
      )
    );

    $blog = $this->table->find($blogId);

    return $blog;
  }

  public function update($id , array $attributes){
    $blog = $this->table->where('id' , $id);
    $blog->update(
      array_merge(
        $attributes,
        [
          'updated_at' => Carbon::now(),
        ]
      )
    );

    return $blog->first();
  }

  public function delete($id){
    $this->table->where('id' , $id)->delete();
  }
}