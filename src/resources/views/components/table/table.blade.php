<table {{ $attributes->merge(['class' => 'table table-striped']) }}>
    <thead>
        {{ $thead }}
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
