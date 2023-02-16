<?php

namespace App\Services;


interface Newsteller
{
    public function subscribe(string $email, string $list);
    public function client(string $list);
}
