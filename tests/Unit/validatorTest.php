<?php

it("validate a string", function () {

  $result = \Core\Validator::string('foobar');

  expect($result)->toBetrue();
});


it('validates that number is greater than the given amount', function () {

  expect(\Core\Validator::greaterThan(10, 1))->toBeTrue();
})->only();
