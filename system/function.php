<?php
/*

*/
//вывод протокол + домена
function check_domen(){
    return ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
}
//вывод url без get
function check_url(){
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];
    return $url = str_replace('index.php','',$url);
}
//проверка страницы по url  /catalog/page  file_ext
function check_page($url){
    $url=explode('/',$url);
    
    array_shift($url);
    if(count($url)==1 && $url[0]==''){
        return true;
    }
    $file_ext =$GLOBALS['site_settings']['_file_ext'];
    //check _file_ext
    if(($url[count($url)-1]!=='' && $file_ext=='/') || ($file_ext!==false && !strripos($url[count($url)-1],$file_ext) && $file_ext!=='/') ){
        return false;
    }
    if ($file_ext && $file_ext!==true) {
        switch ($file_ext) {
            case '/':
                array_pop($url);
                break;
            default:
                $url[count($url)-1]=str_replace($file_ext,'',$url[count($url)-1]);
        }
    }
    $arr=$GLOBALS['page_site'];
    //check page
    for ($i=0; $i < count($url); $i++) {
        
        if(!$arr[$url[$i]]  ){        
            return false;
        }
        $arr=$arr[$url[$i]];
        if(!$arr['_active'] && !$url[$i+1]){
            return false;
        }
    }
    return true;
}
//404
function not_found_page($page=false){
    if(!$page){
        header("HTTP/1.0 404 Not Found");
        include_once($_SERVER['DOCUMENT_ROOT'].'/404.php');
    }
}
function load_content($page){
    not_found_page($page);
    if($page){
        switch ($GLOBALS['site_settings']['load_content']) {
            case 'dir':
                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/content'.check_url().'/index.php')){
                    @include($_SERVER['DOCUMENT_ROOT'].'/content'.check_url().'/index.php');
                    return true;
                }
                break;
            case 'file':
                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/content/data_content.php')){
                    @include($_SERVER['DOCUMENT_ROOT'].'/content/data_content.php');
                    return true;
                }
                break;                
        }
        echo '<p style="font-size:35px;text-align:center">content not found<p>';
        return false;
    }
}
/*****meta*****/
function title_print(){
    if(!check_page(check_url())){
        return $GLOBALS['site_settings'][404]['title'];
    }
    switch ($GLOBALS['title_data'][check_url()]['value']) {
        case !NULL:
            $title_print=$GLOBALS['title_data'][check_url()]['value'];
            break;
        default:
            $title_print=$GLOBALS['title_data'][check_url()][0];
    }
    if($GLOBALS['site_settings']['title']['_postscr']){
        if(check_url()=='/'){
            return $GLOBALS['site_settings']['title']['value'].$GLOBALS['site_settings']['title']['_postscr_value'];
        }
        if($GLOBALS['title_data'][check_url()]['_postscr']){
            if($GLOBALS['title_data'][check_url()]['_postscr_id']){
                $title_print .=$GLOBALS['title_data'][check_url()]['_postscr_id'];
            }else{
                $title_print .=$GLOBALS['site_settings']['title']['_postscr_value'];
            }
        }
    }
    if($title_print){
        return  $title_print;
    }
    return $GLOBALS['site_settings']['title']['value'];
}
function h1_print(){
    if(!check_page(check_url())){
        return $GLOBALS['site_settings'][404]['h1'];
    }
    $h1=$GLOBALS['h1_data'][check_url()];
    if(!$h1){
        return $GLOBALS['site_settings']['h1'];
    }
    return $h1;
}
function meta($name){
    switch ($name) {
        case 'og':
            if(check_url()=='/'){
                if($GLOBALS['site_settings']['og_image']){
                    return '<meta property="og:type" content="website">
                    <meta property="og:title" content="'.title_print().'">
                    <meta property="og:description" content="'.$GLOBALS['site_settings']['description'].'">
                    <meta property="og:image" content="'.check_domen().'/'.$GLOBALS['site_settings']['og_image'].'">';
                }
            }
            if($GLOBALS['og_data'][check_url()]){
                return '<meta property="og:type" content="website">
                        <meta property="og:title" content="'.title_print().'">
                        <meta property="og:description" content="'.$GLOBALS['description_data'][check_url()].'">
                        <meta property="og:image" content="'.check_domen().'/'.$GLOBALS['og_data'][check_url()].'">';
            }
            break;
        case 'description':
            if(check_url()=='/'){
                $GLOBALS['site_settings']['description'];
                return "<meta name='".$name."' content='".$GLOBALS['site_settings']['description']."' >";
            }
            if($GLOBALS['description_data'][check_url()]){
                return "<meta name='".$name."' content='".$GLOBALS['description_data'][check_url()]."' >";
            }            
            break;
        case 'keywords':
            if( $GLOBALS['site_settings']['keywords']['_active']){
                if( $GLOBALS['keywords_data'][check_url()] && $GLOBALS['keywords_data'][check_url()]['_active']){
                    return "<meta name='".$name."' content='".$GLOBALS['keywords_data'][check_url()]['value']."' >";
                }elseif (($GLOBALS['keywords_data'][check_url()]['_active'] && $GLOBALS['keywords_data'][check_url()]['value']=='') || check_url()=='/') {
                    return "<meta name='".$name."' content='".$GLOBALS['site_settings']['keywords']['value']."' >";
                }
            }        
        break; 
        case 'canonical':
            if(check_url()=='/' &&  $GLOBALS['site_settings']['canonical']['_active']){
                return "<link rel='".$name."' href=".$GLOBALS['site_settings']['canonical']['value']." >";
            }elseif ($GLOBALS['canonical_data'][check_url()]['_active']) {
                return "<link rel='".$name."' href=".$GLOBALS['canonical_data'][check_url()]['value']." >";
            }
        break;
        case 'robots':
            if(check_url()=='/' && $GLOBALS['site_settings']['robots']){
                return "<meta name='".$name."' content=".$GLOBALS['site_settings']['robots'].">";
            }elseif($GLOBALS['robots_data'][check_url()]){
                return "<meta name='".$name."' content=".$GLOBALS['robots_data'][check_url()].">";
            }
        break;
    }   
}
?>