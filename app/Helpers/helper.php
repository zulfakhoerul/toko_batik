<?php

    function setActive($url) {
        return (Route::is($url)) ? 'nav-item active' : 'nav-item';
    }