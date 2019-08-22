# `boool`

> **Disclaimer:** Do not use this package as a replacement for proper error
> handling, separation of concerns or building tests around your code. This
> package was made so that I could resolve very particular sets of problems
> that I had encountered, and to do so in a very particular way. This is no
> one-size-fits-all solution, your mileage may vary, no responsibility, and
> definitely no liability if this package develops consciousness and begins
> to slowly and systematically force you to write all your code in lines of
> exactly seventy-five characters per line. Not that anything like that can
> happen, right? I mean, I built the entire thing, I should know if it even
> had the remote possibility of enforcing any level of obsessive compulsive
> disorder on the people who use it. Please read the full README before you
> decide to use this package. While your line length might not depend on it
> I am fairly certain that your sanity and future as a clean coder might...

## So ... What is a `boool` ?

A `boool` is pretty much like a boolean, but with 50% more o:s.

*Let me explain*... Now; it's only fair to say that, like most programming languages out there, 
PHP has a couple of problems (It's all right, I can wait for the laughter to subside). We've all
seen the links and heard the stories ("They even put 'real' in the name of the method!") but
known that, despite all of this, PHP just feels like home. ... Just don't tell it about all the
Javascript we're layering on top of it, okay?

We continue our staunch defense of the language and refuse to admit defeat and just install 
`array_rand(['GoLang', 'Rust', 'Ruby', 'Scala', 'Python', 'Fortran'])` already. We don't just
roll with the flow, sit down, and take the next few weeks to learn the latest Javascript
framework so that we can feel up-to-date for a few months before it's cast aside for the next
great Javascript package.

Secretly, though, we're jealous of a few things other languages are doing. When I first discovered 
the syntax for writing "fat arrow" functions in ECMAScript 6, it was almost like a religious
experience. Similarly, when I truly *understood* programming asynchronous code and the value of
promises, async/await and all that jazz? Mind. Blown.

But in the end, it was one thing and one thing alone where I felt that this is where I shall make 
my stand. This is where I shall make a difference! And I shall make that difference with as high
a ratio of 'o':s to other letters in the class name as humanly possible! (Initial revisions of
this class were called `oooooooooooooh`, but then I realized that that writing 
`public function isReady($task) : oooooooooooooh` just looked silly...)

## You Still Haven't Told Us What it Is ...

Oh, right! Sorry about that! Basically, it's an (type of) implementation of (a kind of) fuzzy
logic. For those not entirely hip to the jive, the Wikipedia definition reads:

**Fuzzy logic** is a form of many-valued logic in which the truth values of variables may be any 
real number between 0 and 1. It is employed to handle the concept of partial truth, where the
truth value may range between completely true and completely false. By contrast, in Boolean logic,
the truth values of variables may only be the integer values 0 or 1.

In this particular implementation, we're not going to be looking at a range of values, but are
limiting ourselves to `true`, `false` and `(n)either true (n)or false`, with that last value
essentially referring to states where we do not have enough information to make an informed
decision as to whether something is `(bool) true` or `(bool) false` yet. The goal is therefore to
use the methods provided by the `boool` class/object to understand that more information is
required.

A side benefit of this is also that we are able to remove some less obvious boolean responses in 
PHP, such as how `var_dump((bool) null)` evaluates as `false` while things like 
`var_dump((bool) new Exception())` evaluates as `true`. Or even some of the outlandish and weird
ones, like how the "loose" comparison `var_dump(0 == "")` evaluates as `true`...

 ## Strict and Loose

PHP today has two ways of checking if two things are equal, the *strict* and the *loose* method. 
The easiest way to understand these is that strict comparisons (three equals signs, `===`) always
take into account the type of data being entered, while loose comparisons (two equals signs, `==`)
do not.

It helps to think about loose comparisons as casting both sides of the equals signs to strings
before testing. For example, `12 === "12"` would evaluate as false, as an integer is by
definition never strictly equal to a string. However, `12 == "12"` would evaluate as `true` in
loose mode. Two different types of numbers don't strictly equal each other, even when they're
the **same number**. For example, `(int) 12 === (float) 12` would classify as `false`.

That said, I still don't understand why `0 === -0` is true, while `0 === 0.0` is false, but it must
be because I'm just not intelligent enough.

## But What About `NaN` ?

I'm glad you asked that, random person reading this in the future. While `NaN` is used in the
project (see further down, under "Casting Responses as Integers)", it is not a central part of it.
For a long time, I thought I could write large parts of this code as a wrapper around `NaN`
(short for "Not A Number", by the way), but it just didn't work out - at least not in the way I
was imagining. Then again, NAN is (as far as I know) the only thing natively in PHP that returns
`false` for both `NAN === false` and `NAN === true`, which makes it hugely valuable simply as a
stand-in for our default value until we can be certain something is either `true` or `false`.

That said, for the sake of your mental sanity, please don't make the mistake of playing too much 
with NaN. My mind half exploded when I first wrote:

```
$thisIsTotallyNan = NAN;
$thisIsTotallyNan === NAN;
```

... and got `false`. It got even weirder when I tried this:

```
> $thisIsTotallyNan = NAN;
> $thisIsTotallyNan !== NAN;
```

... and got `true`.

## Usage: Methods

Note that all of these statements refer to static methods in the `boool` class. You never need to
write something like `$boool = new boool()` or anything like that. The input is always treated as
an array; so invoking it can still be done with a string or numerical, as they will automatically
be cast to array. `Boool::isTrue(5+5 === 10);` would, for example, be functionally equivalent to
`Boool::isTrue([5+5 === 10]);` - but `Bool::isTrue(5+5 === 10, 2+2 === 4)` would fail. On the
other hand, `Bool::isTrue([5+5 === 10, 2+2 === 4])` would not. Note also that a key/value array 
will ignore the keys and only parse the values when performing these methods.

| Command             | Functionality                                                                           |
| ------------------- | --------------------------------------------------------------------------------------- |
| `isTrue(<array>)`   | Returns a `boool` indicating if *all* values in the array evaluate as true.             |
| `hasTrue(<array>)`  | Returns a `boool` indicating if *at least one* value in the array evaluates as true.    |
| `isFalse(<array>)`  | Returns a `boool` indicating if *all* values in the array evaluate as false.            |
| `hasFalse(<array>)` | Returns a `boool` indicating if *at least one* value in the array evaluates as false.   |
| `hasBothTrueAndFalse(<array>)` | returns a `boool` indicating if your array has *at least one true* and *at least one
false* value. |
| `hasNeitherTrueNorFalse(<array>)` | returns a `boool` letting you know whether or not *all* items in the input array
are *neither true nor false*. This is *very* unusual. |
| `trueOnly(<array>)`   | returns an `array` containing *only* those input values that evaluate as true. (Note; key
order is lost in this operation) |
| `falseOnly(<array>)`  | returns an `array` containing *only* those input values that evaluate as false. (Note; key
order is lost in this operation) |

## Usage: Examples


### Throw Exception When Neither True Nor False

When constructing the `boool` response, adding `->withException()` to the chain will ensure that 
you will get a response that is either (by default) a boolean `true`, a boolean `false` or an
exception of type `boool\Exceptions\NeitherTrueNorFalse`.

### Casting Responses as Integers

If you need to get the results back as an integer, add `->asInteger()` to the chain. This is 
especially useful if you have a series of numbers that you only want to use if some logic about
them resolves as true. All you need to do is multiply that number by the integer value of `boool`

## Syntax

@todo

## Credit

@todo

## License

This package is released under the MIT license.

Copyright 2018, Breki Tomasson <breki.tomasson@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
