<?php

function foobar(): int {
    return 1.0; // weakly type-checked return
}

class baz {
    function foobar(): int {
        return 1.0; // weakly type-checked return
    }
}

var_dump(foobar());
var_dump((new baz())->foobar());
