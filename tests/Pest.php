<?php

use Bethuxs\BladeBootstrapComponents\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

uses(TestCase::class)->in(__DIR__);

/*
|--------------------------------------------------------------------------
| Test Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet
| certain conditions. The "expect()" function gives you access to a set of
| "expectations" methods that you can call on your value. Examples: ->toBeTrue()
|
*/

expect()->extend('toContainHtml', function ($html) {
    $rendered = $this->value;
    
    if (! str_contains($rendered, $html)) {
        $this->fail("The rendered output does not contain the expected HTML: {$html}");
    }
    
    return $this;
});

expect()->extend('toHaveAttribute', function ($attribute, $value = null) {
    $rendered = $this->value;
    $pattern = $value 
        ? "/{$attribute}=\"{$value}\"/"
        : "/{$attribute}(?:=|\\s|>)/";
    
    if (! preg_match($pattern, $rendered)) {
        $this->fail("The rendered output does not have attribute '{$attribute}'" . ($value ? " with value '{$value}'" : ""));
    }
    
    return $this;
});
