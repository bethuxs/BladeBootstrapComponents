<?php

use Bethuxs\BladeBootstrapComponents\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

test('input component renders correctly', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.input name="email" label="Email" type="email" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('type="email"')
        ->toContainHtml('name="email"')
        ->toContainHtml('Email')
        ->toContainHtml('form-control');
});

test('input component with error styling', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.input name="email" />
    HTML, ['errors' => collect(['email' => ['Invalid email']])]);
    
    expect($rendered)
        ->toContainHtml('is-invalid');
});

test('textarea component renders with rows', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.textarea name="bio" label="Bio" rows="5" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('rows="5"')
        ->toContainHtml('Bio')
        ->toContainHtml('form-control');
});

test('select component with placeholder', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.select 
            name="status" 
            :options="['active' => 'Active', 'inactive' => 'Inactive']"
            placeholder="Choose..."
        />
    HTML);
    
    expect($rendered)
        ->toContainHtml('Choose...')
        ->toContainHtml('Active')
        ->toContainHtml('Inactive')
        ->toContainHtml('form-select');
});

test('checkbox component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.checkbox name="agree" label="I agree" value="1" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('type="checkbox"')
        ->toContainHtml('I agree')
        ->toContainHtml('form-check');
});

test('radio component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.radio name="gender" label="Male" value="male" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('type="radio"')
        ->toContainHtml('Male')
        ->toContainHtml('form-check');
});

test('checkbox-group renders multiple checkboxes', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.checkbox-group 
            name="interests"
            label="Interests"
            :options="['sports' => 'Sports', 'music' => 'Music']"
        />
    HTML);
    
    expect($rendered)
        ->toContainHtml('Interests')
        ->toContainHtml('Sports')
        ->toContainHtml('Music')
        ->toContainHtml('form-check');
});

test('radio-group renders multiple radios', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.radio-group 
            name="level"
            label="Level"
            :options="['beginner' => 'Beginner', 'advanced' => 'Advanced']"
        />
    HTML);
    
    expect($rendered)
        ->toContainHtml('Level')
        ->toContainHtml('Beginner')
        ->toContainHtml('Advanced')
        ->toContainHtml('form-check');
});

test('file upload component renders', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.file name="avatar" label="Avatar" accept="image/*" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('type="file"')
        ->toContainHtml('Avatar')
        ->toContainHtml('accept="image/*"')
        ->toContainHtml('form-control');
});

test('file upload component with multiple', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.file name="attachments" multiple />
    HTML);
    
    expect($rendered)
        ->toContainHtml('multiple')
        ->toContainHtml('attachments[]');
});

test('form component wraps fields', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form method="POST" route="users.store">
            <input type="text" name="name" />
        </x-bs::form>
    HTML);
    
    expect($rendered)
        ->toContainHtml('<form')
        ->toContainHtml('action="')
        ->toContainHtml('method="POST"')
        ->toContainHtml('<input type="text" name="name" />')
        ->toContainHtml('@csrf');
});

test('button component renders with label', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.button label="Save" type="submit" contextual="success" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('type="submit"')
        ->toContainHtml('Save')
        ->toContainHtml('btn')
        ->toContainHtml('btn-success');
});

test('button component with size', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.button label="Large" size="lg" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('btn-lg');
});
