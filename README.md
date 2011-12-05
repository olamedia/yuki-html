yuki-html
=========
[![Build Status](https://secure.travis-ci.org/olamedia/yuki-html.png)](http://travis-ci.org/olamedia/yuki-html)

Efficient way to create and modify HTML tags.

Why you should use it
---------------------
Sometimes you need to return html tag from class, and be able to modify it later:

``` php
<?php

    class myImage{
        public static function getHtml(){
            return '<img src="myimage.png" />';
        }
    }
    $img = myImage::getHtml();
    // I wanna add alt and style attributes before output, but how I can?
    echo $img;
```
	

So, How?
----

``` php
<?php

	use yuki\html\tag;
    class myImage{
        public static function getHtml(){
            return tag::create('img', array('src' => 'myimage.png'));
        }
    }
    $img = myImage::getHtml();
```
	
Now you can do what you want:

``` php
<?php

    $img['alt'] = 'My Image!';
    $img['style'] = "border: none;";
    echo $img; // <img src="myimage.png" alt="My Image!" style="border: none;" />
```

You even able to get attributes

``` php
<?php

    echo $img['src']; // myimage.png
```
	
To remove attributes

``` php
<?php

    unset($img['style']);
    echo $img; // <img src="myimage.png" alt="My Image!" />
```
	
To wrap

``` php
<?php

	use yuki\html\tag;
    $a = tag::create('a', array('href'=>'/'));
    $a->appendChild($img);
    echo $a; // <a href="/"><img src="myimage.png" alt="My Image!" /></a>
```
	
To set text, it will be escaped!

``` php
<?php

    $a->setText('click here >>');
    echo $a; // <a href="/">click here &gt;&gt;</a>
```

License
-------
MIT

Usage
-----

``` php
<?php

	use yuki\html\tag;
    $head = tag::create('head');
    $head->appendChild(
            tag::create('title')->setText('Page Title')
        );
    $head->appendChild(
            tag::create('meta', array(
                'name'=>'description', 
                'contents' => 'Page Description'
            )
        );
    $head['lang'] = 'en';
    echo $head; // Will output generated html code.
```