<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruite extends Model
{
    use HasFactory;

    protected $table = 'fruites';

    protected $fillable = [
        'id',
        'label',
        'origin_label',
        'parent_id',
        'is_edited',
    ];

    public function parent()
    {
        return $this->belongsTo(Fruite::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Fruite::class, 'parent_id', 'id');
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
