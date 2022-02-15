<?php 

namespace App\Repositories\Eloquent;

use App\Blog;
use App\Repositories\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface{
  private $model;

  public function __construct(Blog $model){
    $this->model = $model;
  }

  public function getAll(){
    return $this->model->all();
  }
  public function getById($id){
    return $this->model->findOrFail($id);
  }
  public function create(array $attributes){
    return $this->model->create($attributes);
  }

  public function update($id , array $attributes){
    $blog = $this->model->findOrFail($id);
    $blog->update($attributes);
    return $blog;
  }

  public function delete($id){
    $this->model->destroy($id);
  }
}