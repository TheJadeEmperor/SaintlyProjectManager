<?php

function displayLinks ($tools) {
    foreach ($tools as $tool => $url) {
        $output .= '<p>'.$tool. '<br /><a href="'.$url.'" target="_BLANK">'.$url.'</a></p>';
    }

    return $output;
}

$tools = array(
    'Word to PDF' => 'https://smallpdf.com/word-to-pdf',
    'PDF Converter' => 'https://www.freepdfconvert.com/',
    'Word to Plain text' => 'https://jhy.io/tools/convert-word-to-plain-text',
    'Convert MS Word to plain text' => 'http://jonathanhedley.com/articles/2008/03/convert-microsoft-word-to-plain-text',
    'Word to HMTL' => 'https://www.textfixer.com/html/convert-word-to-html.php',
    'Text to HMTL' => 'https://www.textfixer.com/html/convert-text-html.php',
    'Cantonese translator' => 'https://tradukka.com/translate/yue',

);

echo '<p><b>PDF & Word Tools</b></p>';
echo displayLinks($tools); 

$tools = array(
    'Free Fax' => 'https://faxzero.com/',
    'Free Phone #' => ' https://www.google.com/voice#inbox',
    'Image Tools' => 'https://www.befunky.com/create/designer/',
);

echo '<p><b>More Tools</b></p>';
echo displayLinks($tools); 


$tools = array( 
    'FunnelDash' => 'https://www.funneldash.com/',
    
    'Click funnels' => 'https://www.clickfunnels.com/',
  
    'Banner Advice' => 'http://www.youtube.com/watch?feature=player_embedded&v=gafTetfuRWc' 
);

echo '<p><b>IM Tips</b></p>';
echo displayLinks($tools); 


$tools = array( 
    'Generate XML Sitemap' => 'http://www.xml-sitemaps.com/',

    'IM Headline Generator' => 'https://www.internetmarketingcourse.com/freeheadlinegenerator/',

    'Headline Generator' => 'https://www.internetmarketingcourse.com/freeheadlinegenerator/', 

    'Check for backlinks' => 'https://moz.com/researchtools/ose/', 

    'Motherfucking Website' => 'http://motherfuckingwebsite.com/'
);

echo '<p><b>Website Tools</b></p>';
echo displayLinks($tools); 




$tools = array( 
    'Generate XML Sitemap' => 'http://www.xml-sitemaps.com/',

    'IM Headline Generator' => 'https://www.internetmarketingcourse.com/freeheadlinegenerator/',

    'Headline Generator' => 'https://www.internetmarketingcourse.com/freeheadlinegenerator/', 

    'Check for backlinks' => 'https://moz.com/researchtools/ose/', 

    'Motherfucking Website' => 'http://motherfuckingwebsite.com/'
);

echo '<p><b>Website Tools</b></p>';
echo displayLinks($tools); 



$tools = array( 
    'Latest jQuery Version' => 'https://developers.google.com/speed/libraries/#jquery',
    'Format CSS' => 'http://www.lonniebest.com/FormatCSS/',
    'CSS Beautifier' => 'http://www.cleancss.com/css-beautify/',
    'The JavaScript Compression Tool' => 'http://jscompress.com/',
    'Real-time HTML Editor' => 'http://htmledit.squarefree.com/',
    'How To Create Custom Post Meta Boxes In WordPress' => 'https://www.smashingmagazine.com/2011/10/create-custom-post-meta-boxes-wordpress/',
    'WordPress Shortcodes: A Complete Guide' => 'https://www.smashingmagazine.com/2012/05/wordpress-shortcodes-complete-guide/'
);

echo '<p><b>Coding</b></p>';
echo displayLinks($tools); 


$tools = array( 
    'Investing' => 'http://cryptocurrencyvirtualportal.com/cc2cwcf.php',

    '4 Hour Work Week' => 'http://fourhourworkweek.com/',
    
    'Modee World - Paypal / Ebay Forums' => 'http://www.modeeworld.com/forums/',
    
    'Favorite Fiverr Gigs - BlackHatWorld' => 'http://www.blackhatworld.com/blackhat-seo/black-hat-seo/399209-favorite-fiverr-gigs.html',
    
    'WarriorForum - The War Room' => 'http://www.warriorforum.com/war-room/',
);

echo '<p><b>Business & Investing</b></p>';
echo displayLinks($tools); 




$tools = array(
    'Yoast SEO' => 'https://wordpress.org/plugins/wordpress-seo/',
    'Classic Editor - remove gay editor and use the classic one' => 'https://wordpress.org/plugins/classic-editor/',
    'ACF ' => 'https://wordpress.org/plugins/advanced-custom-fields/',
    'WP Hide & Security Enhancer' => 'https://wordpress.org/plugins/wp-hide-security-enhancer/',
    'Duplicator - install a backup from scratch' => 'https://wordpress.org/plugins/duplicator/',
    'WP All in One - overrite current site with backup' => 'https://wordpress.org/plugins/all-in-one-wp-migration/',    
    'AddToAny Share Buttons - Social media buttons for posts and archive page' => 'https://wordpress.org/plugins/add-to-any/',  
    'WP Google Search - search engine on your site' => 'https://wordpress.org/plugins/wp-google-search/',
    'Popup maker - make easy pop ups' => 'https://wordpress.org/plugins/popup-maker/',
    'Dreamglow scroll triggered box - scroll triggered pop up' => '',  
    'Optimize Press - Sales page and ecommerce' => ''
);

echo '<p>&nbsp;</p><p><b>Wordpress plugins</b></p>';
echo displayLinks($tools); 


?>