# Examples

This directory contains examples of how to use the Blade Bootstrap Components library.

## Basic Form Example

```blade
<x-bs::messages.all />

<x-bs::form method="POST" route="products.store" class="mt-4">
  <div class="row">
    <div class="col-md-6">
      <x-bs::form.input
        name="name"
        label="Product Name"
        placeholder="Enter product name"
        required
      />
    </div>
    <div class="col-md-6">
      <x-bs::form.input
        name="sku"
        label="SKU Code"
        placeholder="e.g., PROD-001"
        required
      />
    </div>
  </div>

  <x-bs::form.textarea
    name="description"
    label="Description"
    rows="5"
    placeholder="Product description"
  />

  <div class="row">
    <div class="col-md-6">
      <x-bs::form.input
        name="price"
        label="Price"
        type="number"
        step="0.01"
        required
      />
    </div>
    <div class="col-md-6">
      <x-bs::form.input
        name="stock"
        label="Stock Quantity"
        type="number"
        required
      />
    </div>
  </div>

  <x-bs::form.countries
    name="origin_country"
    label="Country of Origin"
  />

  <div class="mt-4">
    <x-bs::form.button label="Save Product" type="submit" contextual="success" />
    <x-bs::form.button label="Cancel" contextual="secondary" />
  </div>
</x-bs::form>
```

## Alert Examples

```blade
<!-- Success Alert -->
<x-bs::alert type="success" title="Success!">
  Your product has been created successfully.
</x-bs::alert>

<!-- Warning Alert -->
<x-bs::alert type="warning" title="Warning" :dismissible="true">
  This action cannot be undone.
</x-bs::alert>

<!-- Danger Alert (No dismiss) -->
<x-bs::alert type="danger" title="Error" :dismissible="false">
  An error occurred while processing your request.
</x-bs::alert>
```

## Table with Actions

```blade
<x-bs::table :thead="'
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
'">
  @forelse($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        @if($user->is_active)
          <x-bs::badge variant="success" pill>Active</x-bs::badge>
        @else
          <x-bs::badge variant="danger" pill>Inactive</x-bs::badge>
        @endif
      </td>
      <td>
        <x-bs::table.actions
          viewRoute="{{ route('users.show', $user->id) }}"
          editRoute="{{ route('users.edit', $user->id) }}"
          deleteRoute="{{ route('users.destroy', $user->id) }}"
        />
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4" class="text-center text-muted">
        No users found
      </td>
    </tr>
  @endforelse
</x-bs::table>
```

## Modal Example

```blade
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch Modal
</button>

<x-bs::modal id="exampleModal" title="Confirm Action" centered>
  <p>Are you sure you want to delete this item? This action cannot be undone.</p>
  
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-danger">Delete</button>
  </div>
</x-bs::modal>
```

## Progress Bar Examples

```blade
<!-- Simple Progress -->
<x-bs::progress value="65" max="100" variant="primary" />

<!-- Striped Progress -->
<x-bs::progress value="75" max="100" variant="info" striped />

<!-- Animated Progress -->
<x-bs::progress value="85" max="100" variant="success" striped animated />

<!-- With Label -->
<x-bs::progress value="45" max="100" variant="warning" label="Loading..." />
```

## Breadcrumb Example

```blade
<x-bs::breadcrumb :items="[
  ['label' => 'Home', 'url' => route('home')],
  ['label' => 'Products', 'url' => route('products.index')],
  ['label' => 'Categories', 'url' => route('categories.index')],
  ['label' => 'Electronics', 'url' => 'null'],
]" />
```

## Using CountriesHelper

```php
<?php

use Bethuxs\BladeBootstrapComponents\CountriesHelper;

// Get all countries data
$all = CountriesHelper::all();
// Returns: [['iso' => 'US', 'name' => 'United States', 'emoji' => '🇺🇸', ...], ...]

// Get formatted options for selects
$options = CountriesHelper::asOptions();
// Returns: ['US' => 'United States', 'CA' => 'Canada', ...]

// Get emoji options
$emojiOptions = CountriesHelper::asEmojiOptions();
// Returns: ['🇺🇸' => '🇺🇸 United States', '🇨🇦' => '🇨🇦 Canada', ...]

// Find a specific country
$country = CountriesHelper::findByIso('US');
// Returns: ['iso' => 'US', 'name' => 'United States', 'emoji' => '🇺🇸', 'native' => 'United States']

$country = CountriesHelper::findByEmoji('🇪🇸');
// Returns: ['iso' => 'ES', 'name' => 'Spain', 'emoji' => '🇪🇸', 'native' => 'España']
```

## Spinner Examples

```blade
<!-- Border Spinner -->
<x-bs::spinner type="border" />

<!-- Growing Spinner -->
<x-bs::spinner type="grow" />

<!-- Small Spinner -->
<x-bs::spinner type="border" size="sm" />

<!-- Large Spinner -->
<x-bs::spinner type="border" size="lg" />

<!-- With Label -->
<x-bs::spinner type="border" label="Loading..." />
```

## Complete CRUD Interface

```blade
<!-- Create/Edit Form -->
<x-bs::form method="{{ $user->exists ? 'PUT' : 'POST' }}" route="{{ $user->exists ? 'users.update' : 'users.store' }}">
  <x-bs::messages.all />

  <div class="card-body">
    <x-bs::form.input name="name" label="Name" value="{{ $user->name }}" required />
    <x-bs::form.input name="email" label="Email" type="email" value="{{ $user->email }}" required />
    <x-bs::form.countries name="country" label="Country" value="{{ $user->country }}" />
    <x-bs::form.input name="phone" label="Phone" type="tel" value="{{ $user->phone }}" />
    <x-bs::form.textarea name="bio" label="Biography" value="{{ $user->bio }}" />
  </div>

  <div class="card-footer text-end">
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    <x-bs::form.button label="{{ $user->exists ? 'Update' : 'Create' }}" type="submit" contextual="primary" />
  </div>
</x-bs::form>

<!-- List with Search and Filters -->
<div class="card mt-4">
  <div class="card-header">
    <h5>Users List</h5>
  </div>

  @if($users->isEmpty())
    <x-bs::alert type="info">
      No users found.
    </x-bs::alert>
  @else
    <x-bs::table :thead="'<tr><th>Name</th><th>Email</th><th>Country</th><th>Actions</th></tr>'">
      @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->country }}</td>
          <td>
            <x-bs::table.actions
              viewRoute="{{ route('users.show', $user->id) }}"
              editRoute="{{ route('users.edit', $user->id) }}"
              deleteRoute="{{ route('users.destroy', $user->id) }}"
            />
          </td>
        </tr>
      @endforeach
    </x-bs::table>
  @endif
</div>
```
