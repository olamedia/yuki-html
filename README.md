yuki-html
=========
[![Build Status](https://secure.travis-ci.org/olamedia/yuki-html.png)](http://travis-ci.org/olamedia/yuki-html)

Efficient way to create and modify HTML tags.

Why you should use it
---------------------
Sometimes you need to return html tag from class, and be able to modify it later:

<pre>
    class myImage{
        public static function getHtml(){
            return '&lt;img src="myimage.png" />';
        }
    }
    $img = myImage::getHtml();
    // I wanna add alt and style attributes before output, but how I can?
    echo $img;
</pre>	
	

So, How?
----

<pre>
	<strong>use yuki\html\tag;</strong>
    class myImage{
        public static function getHtml(){
            return tag::create('img', array('src' => 'myimage.png'));
        }
    }
    $img = myImage::getHtml();
</pre>	
	
Now you can do what you want:

<pre>
    $img['alt'] = 'My Image!';
    $img['style'] = "border: none;";
    echo $img; // &lt;img src="myimage.png" alt="My Image!" style="border: none;" />
</pre>

You even able to get attributes

<pre>
    echo $img['src']; // myimage.png
</pre>	
	
To remove attributes

<pre>
    unset($img['style']);
    echo $img; // &lt;img src="myimage.png" alt="My Image!" />
</pre>
	
To wrap

<pre>
	use yuki\html\tag;
    $a = tag::create('a', array('href'=>'/'));
    $a->appendChild($img);
    echo $a; // &lt;a href="/">&lt;img src="myimage.png" alt="My Image!" />&lt;/a>
</pre>	
	
To set text, it will be escaped!

<pre>
    $a->setText('click here >>');
    echo $a; // &lt;a href="/">click here &amp;gt;&amp;gt;&lt;/a>
</pre>

License
-------
MIT

Usage
-----

<pre>
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
</pre>