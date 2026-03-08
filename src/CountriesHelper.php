<?php

namespace Bethuxs\BladeBootstrapComponents;

class CountriesHelper
{
    /**
     * Get all countries data
     *
     * @return array
     */
    public static function all(): array
    {
        return require __DIR__ . '/countries.php';
    }

    /**
     * Get countries as key-value pair (iso => name)
     *
     * @return array
     */
    public static function asOptions(): array
    {
        $countries = self::all();
        return array_combine(
            array_column($countries, 'iso'),
            array_column($countries, 'name')
        );
    }

    /**
     * Get countries as key-value pair (emoji => name)
     *
     * @return array
     */
    public static function asEmojiOptions(): array
    {
        $countries = self::all();
        return array_combine(
            array_column($countries, 'emoji'),
            array_map(fn($c) => $c['emoji'] . ' ' . $c['name'], $countries)
        );
    }

    /**
     * Find country by ISO code
     *
     * @param string $iso
     * @return array|null
     */
    public static function findByIso(string $iso): ?array
    {
        $countries = self::all();
        foreach ($countries as $country) {
            if ($country['iso'] === strtoupper($iso)) {
                return $country;
            }
        }
        return null;
    }

    /**
     * Find country by emoji
     *
     * @param string $emoji
     * @return array|null
     */
    public static function findByEmoji(string $emoji): ?array
    {
        $countries = self::all();
        foreach ($countries as $country) {
            if ($country['emoji'] === $emoji) {
                return $country;
            }
        }
        return null;
    }
}
