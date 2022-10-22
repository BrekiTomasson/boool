# `Boool`

> Like a boolean, but with 50% more of the letter "o"!

This package is intended primarily as a helper for boolean-related commands, and allows you to write your code in a way
that makes it more legible and easier to understand. Focus is placed on functionality first and foremost, speed and
optimization second, so be aware that some of these methods might not be ideal to use in environments requiring high
performance.

It accepts an array of statements and returns a `true` or `false` depending on which method you use.

**Note**: The package is currently not strict in its typing, meaning many (but not all!) methods will accept "truthy"
values and "falsey" values. If you ask `Boool::allTrue([true, true, 1, true, 'hello'])`, it will return `true`, as all
of those values are "truthy", whereas `Boool::allTrue([true, true, 0, true, 'hello'])` will return `false`, as the `0`
evaluates as a "falsey" value.

As this behavior is not the same across the board, a future update of this package will ensure that all entries in the
array passed into its methods evaluate as strictly `true` or strictly `false`, throwing exceptions if the array passed
contains entries that evaluate to a non-boolean value.

# But Why?

Like so many other packages that came before it, this was built to scratch an itch. I had been writing complex `if`
statements for a project that I was working on, and was beginning to find them difficult to read properly. Refactoring
and abstracting the code would only go so far, and I wanted a solution that allowed me to write code in a slightly
more legible way. I do realize I'm probably over-engineering things here, but it felt like a reasonable enough project
when I started working on it...

# Installation and Usage

To install the package:

`composer require boool\boool`

All methods listed below are available statically on the `Boool\Boool` class. To use it, simply use it wherever you
would use any boolean, such as:

```php
if (Boool::AllTrue($array) && Boool::AnyTrue($other_array)) {
  /* Do something */
}
```

# Available Methods

The following methods are available through the `Boool` package:

- `AllFalse($array)` returns `true` if everything in `$array` evaluate as `false`.
    - Aliases: `OnlyFalse`, `EverythingFalse`, `NoTrue`.
- `AllTrue($array)` returns `true` if everything in `$array` evaluate as `true`.
    - Aliases: `All`, `OnlyTrue`, `EverythingTrue`, `NoFalse`.
- `AnyFalse($array)` returns `true` if **at least one** entry in `$array` evaluate as `true`.
    - Aliases: `ContainsFalse`, `HasFalse`.
- `AnyTrue($array)` returns `true` if **at least one** entry in `$array` evaluate as `true`.
    - Aliases: `Any`, `ContainsTrue`, `HasTrue`.
- `AtLeastFalse($array, $integer)` returns `true` if there are `$integer` or more `false` entries in `$array`.
- `AtLeastHalfFalse($array)` returns `true` if half or more of the entries in `$array` evaluate as `false`.
- `AtLeastHalfTrue($array)` returns `true` if half or more of the entries in `$array` evaluate as `true`.
- `AtLeastTrue($array, $integer)` returns `true` if there are `$integer` or more `true` entries in `$array`.
- `CountTrue($array, $integer)` returns `true` if there are exactly `$integer` `true` entries in `$array`.
    - Aliases: `AmountTrue`.
- `Half($array)` returns `true` if the entries in `$array` are exactly 50% `true` and 50% `false`.
    - Aliases: `HalfTrue`, `HalfFalse`.
- `MostlyFalse($array)` returns `true` if **more than half** of the entries in `$array` evaluate as `false`.
- `MostlyTrue($array)` returns `true` if **more than half** of the entries in `$array` evaluate as `true`.
- Aliases: `Most`

# Coming in Future Versions

- "Parser" methods that extract all `true` or all `false` values from an array, returning a new array containing only
  those values that match the requested criteria.
- A way for third parties to add their own methods to `Boool` using plugin-type functionality.
- A few global methods like `boool_any($array)` to act as shortcuts to `Boool::AnyTrue($array)`.

# Licence & Copyright

This package is released under an MIT license. Read more in `LICENCE` in the root folder of the repository.