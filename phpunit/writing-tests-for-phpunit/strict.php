<?php
declare(strict_types=1);

function foobar(): float {
    return 1.0; // strictly type-checked return
}

class baz {
    function foobar(): float {
        return 1.0; // strictly type-checked return
    }
}

var_dump(foobar());
var_dump((new baz())->foobar());
