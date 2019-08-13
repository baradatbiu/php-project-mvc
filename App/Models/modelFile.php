<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class modelFile extends Eloquent
{
  protected $table = 'files';
  public $timestamps = false;
  protected $fillable = ['user_id', 'name', 'url'];

  public function user()
  {
    return $this->belongsTo('User');
  }
  public function getFiles()
  {
    return $this->all();
  }
}
