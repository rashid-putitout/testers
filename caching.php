<?php
    $cachefile = basename($_SERVER['PHP_SELF'], '.php') . '.cache';
    clearstatcache();

    if (file_exists($cachefile) && filemtime($cachefile) > time() - 15) { // good to serve!
        include($cachefile);
        exit;
    }

    ob_start();
    
    print "Last updated: " . date("H:i:s").' <br />';
    for($i=0; $i < 19000; $i++):
    print "This is some text.";
    print "This is some text.";
    print "This is some text.";
    endfor;
    
    $contents = ob_get_contents();
    ob_end_clean();

    $handle = fopen(__DIR__."/$cachefile", "w");
    fwrite($handle, $contents);
    fclose($handle);

    include($cachefile);
