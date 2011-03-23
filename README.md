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
        function getHtml(){
            return yHtmlTag::create('img', array('src' => 'myimage.png'));
        }
    }
    $img = myImage::getHtml();
Now you can do what you want:
    $img['alt'] = 'My Image!';
    $img['style'] = "border: none;";
    echo $img;

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
