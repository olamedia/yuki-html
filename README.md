yuki-html
=========

Efficient way to create and modify HTML tags.

Why you should use it
---------------------
Sometimes you need to return html tag from class, and be able to modify it later:
    class myImage{
        public static function getHtml(){
            return '<img src="myimage.png" />';
        }
    }
    $img = myImage::getHtml();
    // I wanna add alt and style attributes before output, but how I can?
    echo $img;

So, How?
----
    class myImage{
        public static function getHtml(){
            return yHtmlTag::create('img', array('src' => 'myimage.png'));
        }
    }
    $img = myImage::getHtml();
Now you can do what you want:
    $img['alt'] = 'My Image!';
    $img['style'] = "border: none;";
    echo $img; // <img src="myimage.png" alt="My Image!" style="border: none;" />
You even able to get attributes
    echo $img['src']; // myimage.png
To remove attributes
    unset($img['style']);
    echo $img; // <img src="myimage.png" alt="My Image!" />
To wrap
    $a = yHtmlTag::create('a', array('href'=>'/'));
    $a->appendChild($img);
    echo $a; // <a href="/"><img src="myimage.png" alt="My Image!" /></a>
To set text, it will be escaped!
    $a->setText('click here >>');
    echo $a; // <a href="/">click here &gt;&gt;</a>

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
    $head['lang'] = 'en';
    echo $head; // Will output generated html code.
