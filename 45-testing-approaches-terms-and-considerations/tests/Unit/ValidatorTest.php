<?php

use Core\Validator;

it('validate a string', function () {

    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(''))->toBeFalse();
    expect(Validator::string(1))->toBeTrue();
    expect(Validator::string(true))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();

});

it('validate a string with minimum length', function () {

    expect(Validator::string('foobar', 5))->toBeTrue();
    expect(Validator::string('foobar', 6))->toBeTrue();
    expect(Validator::string('foobar', 7))->toBeFalse();

});

it('validate a string with maximum length', function () {

    expect(Validator::string('foobar', 6, 20))->toBeTrue();
    expect(Validator::string('foobar', 6, 6))->toBeTrue();
    expect(Validator::string('foobar', 6, 4))->toBeFalse();

});


it('validate a number with greater then value', function () {

    expect(Validator::gt(5, 3))->toBeTrue();
    expect(Validator::gt(3, 4))->toBeFalse();

})->only();
