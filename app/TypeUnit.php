<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUnit extends Model
{
    protected $table = 'typeunit';
    protected $fillable = [
        'name',
    ];
    public function save_one($data)
    {
        $this->create([
            'name' => $data
        ]);
        return true;
    }

}
