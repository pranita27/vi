<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Visitor extends Eloquent {
  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'name',
    'submitted_id',
    'phone',
    'email',
    'from',
  ];

  public function visits() {
    return $this->hasMany('Visit');
  }
}
