<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;

    protected $table = 'fruits';

    protected $fillable = [
        'id',
        'label',
        'origin_label',
        'parent_id',
        'is_edited',
    ];

    public function parent()
    {
        return $this->belongsTo(Fruit::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Fruit::class, 'parent_id', 'id');
    }

    // map all level children
    public function getChildren()
    {
        $children = $this->children;
        foreach ($children as $child) {
            $children = array_merge($children, $child->getChildren());
        }
        return $children;
    }
}
