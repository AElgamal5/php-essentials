<?php

use Core\Container;

test('container can resolve', function () {
    //1- arrange
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    //2- act
    $result = $container->resolve('foo');

    // 3- assert/expect
    expect($result)->toEqual('bar');
});
