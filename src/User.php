<?php

namespace StudyCsr;

class User extends Modeltwo
{
    public function getFirstNameAttribute($value)
    {
        return strtoupper($value);
    }
}
