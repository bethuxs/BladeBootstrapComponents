<?php

use Bethuxs\BladeBootstrapComponents\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('tabs component renders with items', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::tabs :items="[
            ['id' => 'tab1', 'label' => 'Tab 1', 'content' => '<p>Content 1</p>', 'active' => true],
            ['id' => 'tab2', 'label' => 'Tab 2', 'content' => '<p>Content 2</p>'],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('nav-tabs')
        ->toContainHtml('Tab 1')
        ->toContainHtml('Tab 2')
        ->toContainHtml('active')
        ->toContainHtml('Content 1')
        ->toContainHtml('Content 2');
});

test('accordion component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::accordion :items="[
            ['title' => 'Section 1', 'content' => '<p>Content 1</p>', 'open' => true],
            ['title' => 'Section 2', 'content' => '<p>Content 2</p>'],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('accordion')
        ->toContainHtml('Section 1')
        ->toContainHtml('Section 2')
        ->toContainHtml('accordion-button');
});

test('collapse component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::collapse title="Show Details">
            <p>Details content</p>
        </x-bs::collapse>
    HTML);
    
    expect($rendered)
        ->toContainHtml('card')
        ->toContainHtml('Show Details')
        ->toContainHtml('Details content')
        ->toContainHtml('collapse');
});

test('dropdown component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::dropdown label="Actions" :items="[
            ['label' => 'Edit', 'url' => '/edit'],
            ['label' => 'Delete', 'url' => '/delete'],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('dropdown')
        ->toContainHtml('Actions')
        ->toContainHtml('Edit')
        ->toContainHtml('Delete')
        ->toContainHtml('dropdown-menu');
});

test('list-group component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::list-group :items="[
            ['id' => '1', 'label' => 'Item 1', 'url' => '#1', 'active' => true],
            ['id' => '2', 'label' => 'Item 2', 'url' => '#2'],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('list-group')
        ->toContainHtml('Item 1')
        ->toContainHtml('Item 2')
        ->toContainHtml('active');
});

test('list-group with badges', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::list-group :items="[
            ['id' => '1', 'label' => 'Messages', 'badge' => '5'],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('Messages')
        ->toContainHtml('badge');
});

test('navbar component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::navbar brand="MyApp" :items="[
            ['id' => 'home', 'label' => 'Home', 'url' => '/'],
            ['id' => 'about', 'label' => 'About', 'url' => '/about'],
        ]" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('navbar')
        ->toContainHtml('MyApp')
        ->toContainHtml('Home')
        ->toContainHtml('About');
});

test('offcanvas component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::offcanvas id="sidebar" title="Menu">
            <p>Sidebar content</p>
        </x-bs::offcanvas>
    HTML);
    
    expect($rendered)
        ->toContainHtml('offcanvas')
        ->toContainHtml('sidebar')
        ->toContainHtml('Menu')
        ->toContainHtml('Sidebar content');
});

test('empty-state component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::empty-state title="No results">
            Try adjusting your search
        </x-bs::empty-state>
    HTML);
    
    expect($rendered)
        ->toContainHtml('text-center')
        ->toContainHtml('No results')
        ->toContainHtml('Try adjusting your search');
});

test('skeleton component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::skeleton height="100px" count="3" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('placeholder');
});
