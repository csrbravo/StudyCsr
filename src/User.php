<?php

namespace StudyCsr;

class User extends ModelTwo
{
    public function getFirstNameAttribute($value)
    {
        return strtoupper($value);
    }
}
