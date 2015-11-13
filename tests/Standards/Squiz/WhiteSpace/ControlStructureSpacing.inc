<?php

if ($condition) {
    doSomething();
}

// Blank line found at begin of control structure
if ($condition) {

    doSomething();
}

// Blank line found at end of control structure
if ($condition) {
    doSomething();

}

// No blank line before control structure
doSomething();
if ($condition) {
    doSomethingMore();
}

// No blank line after control structure
if ($condition) {
    doSomething();
}
doSomethingMore();
