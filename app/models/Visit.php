<?php

class Visit extends Eloquent {

  protected $fillable = [
    'visitor_id',
    'purpose',
    'to_meet',
    'issued_id',
  ];

  public function visitors() {
    return $this->belongsTo('Visitor');
  }

}
