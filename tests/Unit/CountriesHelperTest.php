<?php

use Bethuxs\BladeBootstrapComponents\CountriesHelper;

test('CountriesHelper::all returns array', function () {
    $countries = CountriesHelper::all();
    
    expect($countries)
        ->toBeArray()
        ->not()->toBeEmpty();
});

test('CountriesHelper::all has correct structure', function () {
    $countries = CountriesHelper::all();
    $first = $countries[0];
    
    expect($first)
        ->toHaveKeys(['iso', 'name', 'native', 'emoji']);
});

test('CountriesHelper::asOptions returns correct format', function () {
    $options = CountriesHelper::asOptions();
    
    expect($options)
        ->toBeArray()
        ->not()->toBeEmpty();
    
    // Check that keys are ISO codes
    $keys = array_keys($options);
    expect($keys[0])->toHaveLength(2);
});

test('CountriesHelper::asEmojiOptions returns emoji options', function () {
    $options = CountriesHelper::asEmojiOptions();
    
    expect($options)
        ->toBeArray()
        ->not()->toBeEmpty();
    
    // Check first option contains emoji
    $values = array_values($options);
    expect($values[0])->toContain('🇦');
});

test('CountriesHelper::findByIso returns correct country', function () {
    $country = CountriesHelper::findByIso('US');
    
    expect($country)
        ->not()->toBeNull()
        ->toHaveKeys(['iso', 'name', 'native', 'emoji'])
        ->and($country['iso'])->toBe('US');
});

test('CountriesHelper::findByIso is case insensitive', function () {
    $country1 = CountriesHelper::findByIso('us');
    $country2 = CountriesHelper::findByIso('US');
    
    expect($country1)->toEqual($country2);
});

test('CountriesHelper::findByIso returns null for invalid code', function () {
    $country = CountriesHelper::findByIso('XX');
    
    expect($country)->toBeNull();
});

test('CountriesHelper::findByEmoji returns correct country', function () {
    $country = CountriesHelper::findByEmoji('🇺🇸');
    
    expect($country)
        ->not()->toBeNull()
        ->and($country['emoji'])->toBe('🇺🇸');
});

test('CountriesHelper::findByEmoji returns null for invalid emoji', function () {
    $country = CountriesHelper::findByEmoji('👍');
    
    expect($country)->toBeNull();
});

test('all countries have required fields', function () {
    $countries = CountriesHelper::all();
    
    foreach ($countries as $country) {
        expect($country)
            ->toHaveKeys(['iso', 'name', 'native', 'emoji'])
            ->and($country['iso'])->toHaveLength(2)
            ->and($country['name'])->not()->toBeEmpty()
            ->and($country['native'])->not()->toBeEmpty()
            ->and($country['emoji'])->not()->toBeEmpty();
    }
})->group('countries');

test('countries helper maintains data consistency', function () {
    $all = CountriesHelper::all();
    $options = CountriesHelper::asOptions();
    
    $allCount = count($all);
    $optionsCount = count($options);
    
    expect($allCount)->toBe($optionsCount);
});
