<?php

namespace App\Traits\Posts;

use Illuminate\Support\Str;

trait MetaData
{
    const EXCERPT_LENGTH = 100;

    public function excerpt()
    {
        return Str::limit($this->content, self::EXCERPT_LENGTH);
    }
}
