# Dionysos Select Field
> This component is a part of the **Olympus Dionysos fields** for **WordPress**.  
> It uses the default WordPress select or multiselect field.

```sh
composer require getolympus/olympus-dionysos-field-select
```

---

[![Olympus Component][olympus-image]][olympus-url]
[![CodeFactor Grade][codefactor-image]][codefactor-url]
[![Packagist Version][packagist-image]][packagist-url]
[![MIT][license-image]][license-blob]

---

<p align="center">
    <img src="https://github.com/GetOlympus/olympus-dionysos-field-select/blob/master/assets/field-select-64.png" />
</p>

---

## Field initialization

Use the following lines to add a `select field` in your **WordPress** admin pages or custom post type meta fields:

```php
// Uniq choice version
return \GetOlympus\Dionysos\Field\Select::build('my_select_field_id', [
    'title'       => 'Select a Minion that you may know',
    'default'     => 'kevin',
    'description' => 'A very important question! Pay attention to it ;)',
    'multiple'    => false,
    'options'     => [
        'kevin' => 'Kevin',
        'mel'   => 'Mel',
        'dave'  => 'Dave',
        'bob'   => 'Bob',
    ],

    /**
     * Texts definition
     * @see the `Texts definition` section below
     */
    't_keyboard'   => 'Press the <kbd>CTRL</kbd> or <kbd>CMD</kbd> button to select more than one option.',
    't_no_options' => 'The field does no have any options.',
]);
```

```php
// Multiple choice version
return \GetOlympus\Dionysos\Field\Select::build('my_multiselect_field_id', [
    'title'       => 'What are your preferred personas?',
    'default'     => ['minions', 'lapinscretins'],
    'description' => 'The White House needs your feedback asap!',
    'multiple'    => true,
    'options'     => [
        'minions'       => 'The Minions',
        'lapinscretins' => 'The Lapins Crétins',
        'marvel'        => 'All Marvel Superheroes',
        'franklin'      => 'Franklin (everything is possible)',
        'spongebob'     => 'Spongebob (nothing to say... Love it!)',
    ],

    /**
     * Texts definition
     * @see the `Texts definition` section below
     */
    't_keyboard'   => 'Press the <kbd>CTRL</kbd> or <kbd>CMD</kbd> button to select more than one option.',
    't_no_options' => 'The field does no have any options.',
]);
```

## Variables definition

The variables definition depends on `multiple` value:
- set to `false`, a uniq string value is stored in Database
- set to `true`, an array of key values is stored in Database

In all cases:

| Variable      | Type    | Default value if not set | Accepted values |
| ------------- | ------- | ------------------------ | --------------- |
| `title`       | String  | `'Radio button'` | *empty* |
| `description` | String  | *empty* | *empty* |
| `options`     | Array   | *empty* | Array with a key/value options |

### Uniq choice

| Variable      | Type    | Default value if not set | Accepted values |
| ------------- | ------- | ------------------------ | --------------- |
| `default`     | String  | *empty string* | One of the options keys |
| `multiple`    | Boolean | `false` | *nothing else* |

### Multiple choices

| Variable      | Type    | Default value if not set | Accepted values |
| ------------- | ------- | ------------------------ | --------------- |
| `default`     | String  | *empty array* | Array with options keys |
| `multiple`    | Boolean | `true` | *nothing else* |

## Texts definition

| Code | Default value | Definition |
| ---- | ------------- | ---------- |
| `t_keyboard` | Press the <kbd>CTRL</kbd> or <kbd>CMD</kbd><br/>button to select more than one<br/>option. | Used as a notice to help users to user multiselect field |
| `t_no_options` | The field does no have any options. | Used as an error in the case no options have been set |

## Retrive data

Retrieve your value from Database with a simple `get_option('my_select_field_id', '')` or `get_option('my_multiselect_field_id', [])` (see [WordPress reference][getoption-url]):

```php
// Get select from Database
$select = get_option('my_select_field_id', '');

// Display value
echo '<h2><b>'.$select.'</b>, master of the ceremony</h2>';

// Get multiselect from Database
$multiselect = get_option('my_multiselect_field_id', []);

if (!empty($multiselect)) {
    echo '<p>And the nominees are:</p>';
    echo '<ul>';

    foreach ($multiselect as $value) {
        echo '<li>'.$value.'</li>'; // Will display key item options!
    }

    echo '</ul>';
}
```

## Release History

0.0.12
- Change main css class

0.0.11
- New Olympus components compatibility
- Change repository to be a part of Dionysos fields

0.0.10
- FIX: remove twig dependency from composer

## Contributing

1. Fork it (<https://github.com/GetOlympus/olympus-dionysos-field-select/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

---

**Built with ♥ by [Achraf Chouk](https://github.com/crewstyle "Achraf Chouk") ~ (c) since a long time.**

<!-- links & imgs dfn's -->
[olympus-image]: https://img.shields.io/badge/for-Olympus-44cc11.svg?style=flat-square
[olympus-url]: https://github.com/GetOlympus
[codefactor-image]: https://www.codefactor.io/repository/github/GetOlympus/olympus-dionysos-field-select/badge?style=flat-square
[codefactor-url]: https://www.codefactor.io/repository/github/getolympus/olympus-dionysos-field-select
[getoption-url]: https://developer.wordpress.org/reference/functions/get_option/
[license-blob]: https://github.com/GetOlympus/olympus-dionysos-field-select/blob/master/LICENSE
[license-image]: https://img.shields.io/badge/license-MIT_License-blue.svg?style=flat-square
[packagist-image]: https://img.shields.io/packagist/v/getolympus/olympus-dionysos-field-select.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/getolympus/olympus-dionysos-field-select