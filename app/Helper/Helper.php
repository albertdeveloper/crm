<?php
namespace App\Helper;

use Illuminate\Support\Facades\Gate;

class Helper {
    public static function allowed_gate($ability)
    {
        abort_unless(Gate::allows($ability),403);
    }
}
