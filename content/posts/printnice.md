/*
title: Adding A debug Print
date: 2013-12-10
*/

Wanted a easy standard function that I could enhance later and use throughout all parts of phile.

Decided to add this function to `Lib\Phile\Utility.php`

[[#ENDSUMMARY]]

And use it anywhere like this:
~~~~
\Phile\Utility::printnice($something);
\Phile\Utility::printnice($something, true);
\Phile\Utility::printnice($something, false, 'dump');   
~~~~

~~~~

public static function printnice($a = array(), $exit = false, $type = 'print') {
    echo '<pre>';
        if ($type == 'print') {
                print_r($a);
        } else {
                var_dump($a);
        }
    echo '</pre>';
    
    if ($exit) {
                exit; die();
    }
}
~~~~

