# Bethuxs Blade Bootstrap Components

A lightweight and flexible library of Blade components designed to integrate seamlessly with Bootstrap 5. This library simplifies building responsive UIs in Laravel by encapsulating Bootstrap 5 components into reusable Blade templates.

---

## Features

- Prebuilt components for common Bootstrap 5 elements.
- Customizable with dynamic attributes.
- Easy integration with Laravel projects.
- Supports Bootstrap's utility classes for responsive design.

---

## Installation

### Requirements

- **Laravel**: 8.x or higher (Tested with Laravel 11)
- **PHP**: 8.0 or higher
- **Bootstrap**: 5.x

### Steps

1. Install the package via Composer:

   ```bash
   composer require bethuxs/blade-bootstrap-components
   ```

2. Publish the configuration and component files:

   ```bash
   php artisan vendor:publish --provider="Bethuxs\BladeBootstrapComponents\BladeBootstrapComponentsServiceProvider"
   ```

3. Include the Bootstrap 5 assets in your application:

   ```html
   <!-- Add in your main layout file -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   ```

---

## Usage

### Available Components

Here is a list of components included in the library:

- **Forms** (`<x-bs::form>`)
- **Inputs** (`<x-bs::form.input>`)
- **Buttons** (`<x-bs::form.button>`)
- **Flash Messages** (`<x-bs::flash>`)

### Example: Form with Inputs and Button

```blade
<x-bs::form method="post" route="financial.spread" class="mt-3">
  <table class="table table-striped">
    <tr>
      <th>@lang('Currency')</th>
      <th>@lang('Sell')</th>
      <th>@lang('Buy')</th>
      <th>@lang('Amount')</th>
    </tr>
    @foreach($currencies as $currency)
      <tr>
        <th>
          {{$currency->name}}
          {{$currency->emoticon}}
        </th>
        <td>
          <x-bs::form.input type="text" :name="'spread[' . $currency->id . '][sell]'" :value="$currency->sell" />
        </td>

        <td>
          <x-bs::form.input type="text" :name="'spread[' . $currency->id . '][buy]'" :value="$currency->buy" />
        </td>

        <td>
          <x-bs::form.input type="text" :name="'spread[' . $currency->id . '][mean]'" :value="$currency->mean"/>
        </td>
      </tr>
    @endforeach
  </table>
  <footer class="text-center">
    <x-bs::form.button type="submit" label="Save" />
  </footer>
</x-bs::form>
```

#### Output

This will generate a complete form with inputs and a button styled with Bootstrap 5 classes.

---

## Customization

You can customize the components by editing the published Blade files located in the `resources/views/vendor/blade-bootstrap-components` directory.

For example, to modify the `input` component:

```blade
<!-- resources/views/vendor/blade-bootstrap-components/form/input.blade.php -->
<input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $attributes->get('class') }}" {{ $attributes->except(['class']) }} />
```

---

## Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository.
2. Create a feature branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Open a pull request.

---

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).

---

## Acknowledgments

Special thanks to the Laravel and Bootstrap communities for their amazing frameworks that make projects like this possible.
