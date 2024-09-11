<?php

namespace App\Http\Filters;

use EloquentFilter\ModelFilter;

class RoomFilter extends ModelFilter
{
    protected $drop_id = false;

    public function name($name): self
    {
        return $this->whereLike('name', $name);
    }

    public function size($size): self
    {
        return $this->where('size', $size);
    }

    public function description($text): self
    {
        return $this->whereLike('description', $text);
    }

    public function isValid($val): self
    {
        return $this->where('is_valid', $val);
    }
}
