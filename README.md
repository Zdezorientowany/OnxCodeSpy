# CodeSpy Integration Package

The CodeSpy Integration Package provides a powerful `spyOn` global function designed to enhance debugging efforts in your codebase. This function allows for seamless communication with the CodeSpy app, enabling real-time monitoring and analysis of your code's execution. It's an essential tool for developers looking to gain deeper insights into their applications, identify issues more efficiently, and improve code quality.

## Features

- **Global `spyOn` Function**: Easily integrate debugging statements into your code without invasive changes.
- **Communication with CodeSpy App**: Leverages the CodeSpy app for an enriched debugging experience, offering a graphical interface to view your code's behavior.
- **Serialization Support**: Pass objects to the `spyOn` function, which serializes them into JSON for comprehensive examination. Ideal for inspecting complex data structures.
- **Configurable Recursion Depth**: Customize the depth of serialization for deeper inspection of nested objects. This feature allows developers to balance between detail and performance.
- **Troubleshooting Made Easy**: With the ability to serialize objects and control the depth of recursion, developers can pinpoint issues more effectively, saving time and effort in debugging.

## Prerequisites

To use this package, you must have the CodeSpy app installed. The app facilitates the visualization and management of debugging data collected through the `spyOn` function.

## Installation

Install the package via Composer with the following command:

```bash
composer require onx/code-spy
```
This command adds the CodeSpy Integration Package to your project, enabling you to start debugging with enhanced capabilities immediately.

## Usage

To debug your code with the `spyOn` function, simply pass the target object and optionally specify the recursion depth for serialization. Here's a basic example:

```php
spyOn($yourObject, $recursionDepth);
```
Parameters:
- `$yourObject` (required): The object or data you wish to inspect.
- `$recursionDepth` (optional): An integer representing how many levels deep the serialization should go. Be cautious with deep serialization as it may impact performance and possibly cause issues if set too high.

### Example

```php
// Debugging a complex array structure with recursion depth set to 2
$arrayToDebug = ['key1' => 'value1', 'key2' => ['subkey1' => 'subvalue1']];
spyOn($arrayToDebug, 2);

// Debugging an object with default recursion depth
$objectToDebug = new MyClass();
spyOn($objectToDebug);
```

## Troubleshooting Tips

- **Handling Deep Serialization**: If you encounter issues or performance degradation due to deep serialization, consider decreasing the recursion depth. This helps to mitigate potential memory overflow or excessive processing time.
- **Debugging in Production**: It's highly recommended to avoid or limit the use of `spyOn` in production environments. If necessary, ensure that it's used conditionally and removed or disabled after use to prevent any security or performance issues.
- **Data Overload**: When debugging very large or complex objects, you might experience slowdowns or crashes. To avoid this, serialize only the most relevant parts of the object or reduce the recursion depth.

## License

The CodeSpy Integration Package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). This permissive license allows for unrestricted use, modification, and distribution of the software, making it an excellent choice for developers and companies alike.
