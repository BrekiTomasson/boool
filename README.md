# `boool`

Intended primarily as a helper for boolean-related commands, this package allows you to write your code in a way that
is more legible and easier to understand. Focus is placed on functionality first and foremost, speed and optimization
second, so be aware that some of these methods might not be ideal to use in environments requiring high performance.

It accepts an array of statements and returns a `true` or `false` depending on which method you use. As such, the 
output of the methods in the `boool` package should always be compatible with methods expecting a boolean value.

**Coming Soon**: Support will be added so that a Laravel `Collection` instead of an array as input to any of the
various `boool` methods.

# But Why?

Like so many other packages that came before it, this was built to scratch an itch. I had been writing complex `if`
statements for a project that I was working on, and was beginning to find them difficult to read properly. Refactoring
and abstracting the code would only go so far, and I wanted a solution that allowed me to write code in a slightly 
more legible way. I do realize I'm probably over-engineering things here, but it felt like a reasonable enough project
when I started working on it...

# Installation and Usage

To install the package, simply `composer require` the package. TODO: Add Packagist Name once published.

TODO: Write usage guide.

# Available Methods

The following methods are available through the `boool` package:

- `AllTrue($array)` returns `true` if everything in `$array` evaluate as `true`.
  - Aliases: `All`, `OnlyTrue`, `EverythingTrue`, `NoFalse`.
- `AllFalse($array)` returns `true` if everything in `$array` evaluate as `false`.
  - Aliases: `OnlyFalse`, `EverythingFalse`, `NoTrue`.
- `AnyTrue($array)` returns `true` if **at least one** entry in `$array` evaluate as `true`.
  - Aliases: `Any`, `ContainsTrue`, `HasTrue`.
- `AnyFalse($array)` returns `true` if **at least one** entry in `$array` evaluate as `true`.
  - Aliases: `ContainsFalse`, `HasFalse`.
- `AtLeastHalfTrue($array)` returns `true` if half or more of the entries in `$array` evaluate as `true`.
- `AtLeastHalfFalse($array)` returns `true` if half or more of the entries in `$array` evaluate as `false`.
- `MostlyTrue($array)` returns `true` if **more than half** of the entries in `$array` evaluate as `true`.
  - Aliases: `Most`
- `MostlyFalse($array)` returns `true` if **more than half** of the entries in `$array` evaluate as `false`.
- `CountTrue($array, $integer)` returns `true` if there are exactly `$integer` `true` entries in `$array`.
  - Aliases: `AmountTrue`.


- `allOf($array)` returns `true` if all entries in `$array` are `true`, returning `false` otherwise.
- `anyOf($array)` returns `true` if any of the entries in `$array` are `true`, returning `false` otherwise.
- `oneOf($array)` returns `true` if only one of the entries in `$array` is `true`, returning `false` otherwise.
  - This method will return `false` if two or more entries in `$array` are `true`, unlike `anyOf($array)`.
  - If `$array` only contains one entry, this method will return `true` or `false`, depending on that entry.
- `allButOneOf($array)` returns `true` if there is only one `false` entry in `$array`.
  - This method will return `false` if `$array` only contains one entry, no matter if that entry is `true` or `false`,
    as it requires at least one `true` entry in addition to exactly one `false` entry.
- `noneOf($array)` returns `true` if all entries in `$array` are `false`, returning `false` otherwise.
- `mostOf($array)` returns `true` if more than half of all entries in `$array` are `true`, returning `false` otherwise.
- `someOf($array)` returns `true` if less than half of all entries in `$array` are `false`, returning `true`  otherwise.
- `halfOf($array)` returns `true` if exactly half of all entries in `$array` are `true`, returning `false` otherwise.

## Methods Taking Additional Arguments

While most uses of `boool` will only require you to use the simple methods above; there are other, more complex methods
which allow you to get more specific results. 

- `amountTrue($array, $integer)` - returns `true` if there are exactly `$integer` amount of `true` statements in 
  `$array`, returning `false` otherwise.
- `amountFalse($array, $integer)` - returns `true` if there are exactly `$integer` amount of `false` statements in 
  `$array`, returning `false` otherwise.
- `moreThan($array, $integer)` - returns `true` if there are more than `$integer` amount of `true` statements in
  `$array`.
- `lessThan($array, $integer)` - returns `true` if there are fewer than `$integer` amount of `true` statements in
  `$array`.
  
> Methods that take an `$integer` will always return `false` if the integer passed is zero, negative, or greater than
> the amount of entries in the array, such as `lessThan([true, true, true], 4)`. While there **are** fewer than four 
> `true` statements in the array, the array itself only contains three entries. 

# Aliases and Alternatives

As `boool` optimizes for legibility, some methods listed above have aliases or can be written differently, making it
easy to adjust the syntax depending on personal preference.

- `noFalse($array)` and `allTrue($array)` are aliases for `allOf($array)`.
- `noTrue($array)` and `allFalse($array)` are aliases for `noneOf($array)`.
- `halfTrue($array)` and `halfFalse($array)` are aliases for `halfOf($array)`.
- `onlyOneOf($array)` is an alias for `oneOf($array)`.
- `moreThanHalfOf($array)` is an alias for `mostOf($array)`.
- `lessThanHalfOf($array)` is an alias for `someOf($array)`. 
- `fewerThan($array, $integer)` is an alias for `lessThan($array, $integer)`.
