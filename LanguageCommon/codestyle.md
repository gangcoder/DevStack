# Code Style

## Basic Coding Standard

### Namespace and Class

formal namespaces
```
// PHP 5.3 and later:
namespace Vendor\Model;

class StudlyCaps
{
}
```

### Constants, Properties, Methods

constants MUST be declared in all upper case with underscore separators

```
<?php
namespace Vendor\Model;

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2012-06-01';
}
```

Properties consistently within a reasonable scope

Method names MUST be declared in camelCase().

## Coding Style Guide

overview

```
<?php
namespace Vendor\Package;

use FooInterface;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class Foo extends Bar implements FooInterface
{
    public function sampleFunction($a, $b = null)
    {
        if ($a === $b) {
            bar();
        } elseif ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }

    final public static function bar()
    {
        // method body
    }
}
```

### Method Arguments

```
<?php
namespace Vendor\Package;

class ClassName
{
    public function foo($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

function  declare
```
<?php
namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }
}
```

function call
```
<?php
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

### Control Structures
```
<?php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}

switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}

while ($expr) {
    // structure body
}

do {
    // structure body;
} while ($expr);

<?php
for ($i = 0; $i < 10; $i++) {
    // for body
}

oreach ($iterable as $key => $value) {
    // foreach body
}

try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}

$closureWithArgs = function ($arg1, $arg2) {
    // body
};

$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
};


## Logger Interface

## Autoloading

通过文件路径实现自动加载，可用于: class, interface, trait

完整类名: `\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>`

## HTTP Message Interfaces