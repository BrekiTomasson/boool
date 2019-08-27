# Boool

Booleans. Everywhere we look, there they are; subtle reminders of how all code 
is just ones and zeroes - true or false. Most of the time, booleans are no 
problem, because we're just checking one  or two things at a time. Is the user
logged in? Is the webhook type equal to "payment.received"? Is `$errors` equal 
to `null`?

Every so often, however, we run into scenarios where simple booleans aren't 
enough or where phrasing your statement in terms of booleans just makes it 
unwieldy and hard to read. Imagine a scenario like this:

Load this page if user is admin or if user is not admin but has this user flag
set, but only if this system flag is also set, unless they also have this other
user flag set, in which case we can ignore the system flag.

No matter how you break it down, you're going to be left with what amounts to 
three separate checks:

- Is user admin?
- Is user flag set but not system flag?
- Is user flag set, and also other user flag?

It quickly becomes either ugly or unweildly, and working with it becomes an
exercise in frustration once you want to add any new functionality.  Imagine,
for example, if you wanted to limit that second and third scenario to only
certain types of pages, but not do the same to your admin users. Imagine
wanting to add a maintenance mode where admin users can continue to access
the page, but non-administrators cannot, no matter what user flags they have.

## Enter Boool

As the name would suggest, Boool is strongly tied to booleans, and shines in
any scenario when you are looking at multiple values like this. What it does
is allow you to make decisions based on the state of multiple boolean values
and their relationships with each other. And since Boool returns booleans, you
can use Boool as input to other instances of Boool.

## Examples

Let's say we want to build the scenario from above, but using Boool. It might 
look something like this:

    if (new Boool([
            $user->isAdmin(),
            $user->hasFlag() && $system->doesNotHaveFlag(),
            $user->hasFlag() && $user->hasOtherFlag()
    ])->hasTrue()) {
        //...
    }

Basically, what we've done here is instantiated Boool with an array containing
three different statements, and then asked if it has a true value. So long as
any one of the statements are true, Boool will return `true`. Naturally, you
could break it creation out to outside the `if` statement to make it even more
legible:

    $criteria = new Boool([
        $user->isAdmin(),
        $user->hasFlag() && $system->doesNotHaveFlag(),
        $user->hasFlag() && $user->hasOtherFlag()
    ]);

    if ($criteria->hasTrue()) {
        //...
    }

Another example might make it easier to understand how this might be useful.
