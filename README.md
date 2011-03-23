yuki-html
=========

Set of php classes for HTML generation

License
-------
MIT

Usage
-----
    $head = yHtmlTag::create('head');
    $head->appendChild(
            yHtmlTag::create('title')->setText('Page Title')
        );
    $head->appendChild(
            yHtmlTag::create('meta', array(
                'name'=>'description', 
                'contents' => 'Page Description'
            )
        );
