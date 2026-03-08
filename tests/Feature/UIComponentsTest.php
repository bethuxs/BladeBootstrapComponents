<?php

use Bethuxs\BladeBootstrapComponents\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('alert component renders success type', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::alert type="success" title="Success!" dismissible>
            Your changes have been saved.
        </x-bs::alert>
    HTML);
    
    expect($rendered)
        ->toContainHtml('alert')
        ->toContainHtml('alert-success')
        ->toContainHtml('Success!')
        ->toContainHtml('Your changes have been saved.')
        ->toContainHtml('btn-close');
});

test('alert component renders danger type', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::alert type="danger" dismissible>
            An error occurred.
        </x-bs::alert>
    HTML);
    
    expect($rendered)
        ->toContainHtml('alert-danger');
});

test('alert component non-dismissible', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::alert type="info" dismissible="false">
            Information only
        </x-bs::alert>
    HTML);
    
    expect($rendered)
        ->not()->toContainHtml('btn-close');
});

test('badge component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::badge variant="primary" pill>
            New
        </x-bs::badge>
    HTML);
    
    expect($rendered)
        ->toContainHtml('badge')
        ->toContainHtml('bg-primary')
        ->toContainHtml('rounded-pill')
        ->toContainHtml('New');
});

test('progress component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::progress value="65" max="100" variant="success" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('progress')
        ->toContainHtml('progress-bar')
        ->toContainHtml('bg-success')
        ->toContainHtml('width: 65%');
});

test('progress component with striped', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::progress value="50" striped />
    HTML);
    
    expect($rendered)
        ->toContainHtml('progress-bar-striped');
});

test('spinner component border type', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::spinner type="border" size="sm" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('spinner-border')
        ->toContainHtml('spinner-sm');
});

test('spinner component grow type', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::spinner type="grow" size="lg" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('spinner-grow')
        ->toContainHtml('spinner-lg');
});

test('breadcrumb component renders items', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::breadcrumb :items="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Products', 'url' => '/products'],
            ['label' => 'Current', 'url' => null],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('breadcrumb')
        ->toContainHtml('Home')
        ->toContainHtml('Products')
        ->toContainHtml('Current')
        ->toContainHtml('active');
});

test('modal component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::modal id="testModal" title="Confirm">
            Are you sure?
        </x-bs::modal>
    HTML);
    
    expect($rendered)
        ->toContainHtml('modal')
        ->toContainHtml('testModal')
        ->toContainHtml('Confirm')
        ->toContainHtml('Are you sure?');
});

test('table component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::table :thead="'<tr><th>Name</th><th>Email</th></tr>'">
            <tr><td>John</td><td>john@example.com</td></tr>
        </x-bs::table>
    HTML);
    
    expect($rendered)
        ->toContainHtml('table')
        ->toContainHtml('table-striped')
        ->toContainHtml('Name')
        ->toContainHtml('Email')
        ->toContainHtml('John');
});

test('card component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::card title="Card Title" subtitle="Subtitle">
            Content here
        </x-bs::card>
    HTML);
    
    expect($rendered)
        ->toContainHtml('card')
        ->toContainHtml('Card Title')
        ->toContainHtml('Subtitle')
        ->toContainHtml('Content here');
});
