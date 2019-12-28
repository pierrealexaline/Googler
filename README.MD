# Googler

A simple wrapper for Googler CLI.
Author of original CLI  : https://github.com/jarun/googler

## Required : 

php 7 + php.ini (for shell exe and output), php json.


## Example / usage

    require('Googler.php');

    $form  = '<form action="Googler.php" method="post">' . "\n";
    $form .= '<input type="text" name="search">' . "\n";
    $form .= '<input type="submit" value="ok">' . "\n";
    $form .= '</form>' . "\n";


    if(isset($_POST['search']))
    {
        $searchQuery  = $_POST['search']; 

        //google twitts 20 first results for this search
        
        $config  = array(
            'timeout'        => 5, 
            'start'          => 1,
            'length'         => 20,
            'news'           => 0,
            'country'        => 'fr',
            'lang'           => 'fr',
            'exact'          => 0,
            'site'           => 'twitter.com',
            'time'           => 'y1',
            'unfilter'       => 0,
            'proxy'          => '',
            'notweak'        => 0,
            'json'           => 1,
            'urlhandler'     => 0,
            'showbrowserlogs'=> 0, 
        );
        $goo = new Googler( $config );  
        $results = $goo->search( $searchQuery ); 
        if( trim($results)!='' )  print_r($results);
    }
    else{ echo $form; }