<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $guarded = false;


    public function boss()
    {
        return $this->hasOneThrough(Worker::class, Position::class)
            ->where('position_id', 4);
    }
    //$department  = Department::find(1);

    //$positions = Position::where('department_id', $department->id)->where('title', 'Boss')->first();

    //$worker = Worker::where('position_id', $positions->id)->first();

    //dd($worker->toArray());

    public function workers()
    {
        return $this->hasManyThrough(Worker::class, Position::class);
    }


}
