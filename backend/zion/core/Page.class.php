<?php 
namespace zion\core;

/**
 * @author Vinicius
 */
class Page {
    /**
     * Título da página
     * @var string
     */
    private static $title = "Sem titulo";
    
    private static $showHeader = true;
    
    private static $showFooter = true;
    
    /**
     * Arquivo a ser incluído
     * @var string
     */
    private static $include = "";
    
    /**
     * Metatags
     * @var string
     */
    private static $meta = array(
        "robots" => "noindex"
    );
    
    /**
     * Cache da página
     * @var array
     */
    private static $cacheControl = array(
        "max-age"  => 0,
        "s-maxage" => 0
    );
    
    /**
     * Versão do bootstrap
     * @var integer
     */
    private static $bootstrapVersion = 4;
    
    /**
     * Navegação
     * @var array
     */
    private static $breadcrumbs = array();
    
    /**
     * Indica se os recursos obrigatórios foram carregados
     * @var string
     */
    private static $requiredResourcesLoaded = false;
    
    /**
     * Dados utilizados na view
     * @var array
     */
    private static $data = array();
    
    public static function set($key,$value){
        self::$data[$key] = $value;
    }
    
    public static function get($key){
        return self::$data[$key];
    }
    
    public static function add($key,$value){
        self::$data[$key][] = $value;
    }
    
    /**
     * Determina a versão do bootstrap
     * @param int $version
     */
    public static function setBootstrapVersion($version){
        self::$bootstrapVersion = $version;
    }
    
    public static function autoloadBootstrap($bool){
        self::$requiredResourcesLoaded = !$bool;
    }
    
    /**
     * Define o título da página
     * @param string $title
     */
    public static function setTitle($title){
        self::$title = $title;
    }
    
    public static function getTitle(){
        return self::$title;
    }
    
    public static function showHeader($bool = null){
        if($bool === null){
            return self::$showHeader;
        }
        self::$showHeader = $bool;
    }
    
    public static function showFooter($bool = null){
        if($bool === null){
            return self::$showFooter;
        }
        self::$showFooter = $bool;
    }
    
    public static function setBreadcrumbs(array $bc){
        self::$breadcrumbs = $bc;
    }
    
    public static function getBreadcrumbs(){
        return self::$breadcrumbs;
    }
    
    public static function setMeta($name,$value){
        self::$meta[$name] = $value;
    }
    
    public static function getMeta($name){
        return self::$meta[$name];
    }
    
    public static function setCacheControl($name,$value){
        self::$cacheControl[$name] = $value;
    }
    
    public static function getCacheControl($name){
        return self::$cacheControl[$name];
    }
    
    public static function setInclude($file){
        self::$include = $file;
    }
    
    public static function getInclude(){
        return self::$include;
    }
    
    public static function sendCacheControl(){
        header("Cache-Control: max-age=".self::$cacheControl["max-age"].", s-maxage=".self::$cacheControl["s-maxage"]);
    }
    
    /**
     * Recursos obrigatórios em todas as views
     */
    public static function loadRequiredResources(){
        if(self::$requiredResourcesLoaded){
            return;
        }
        self::$requiredResourcesLoaded = true;
        
        $js = array();
        $css = array();
        
        $js[] = "/zion/lib/jquery/jquery-3.3.1.min.js";
        
        switch(self::$bootstrapVersion){
        case 3:
            $css[] = "/zion/lib/bootstrap-3.3.7/dist/css/bootstrap.min.css";
            $css[] = "/zion/lib/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css";
            $js[] = "/zion/lib/bootstrap-3.3.7/dist/js/bootstrap.min.js";
            break;
        default:
            $js[] = "/zion/lib/popper.min.js";
            $js[] = "/zion/lib/bootstrap-4.2.1-dist/js/bootstrap.min.js";
            $css[] = "/zion/lib/bootstrap-4.2.1-dist/css/bootstrap.min.css";
            $css[] = "/zion/lib/fontawesome-free-5.7.2-web/css/all.min.css";
            break;
        }
        
        self::$data["js"] = array_merge($js,self::$data["js"]);
        self::$data["css"] = array_merge($css,self::$data["css"]);
    }
    
    public static function cssBulk(array $list){
        foreach($list AS $uri){
            self::css($uri);
        }
    }
    
    /**
     * Inclue e retorna as URIs css
     */
    public static function css($uri=null){
        if($uri === null){
            self::loadRequiredResources();
            return self::$data["css"];
        }
        self::$data["css"][] = $uri;
    }
    
    public static function cssTags(){
        $lines = array();
        foreach(Page::css() AS $uri){
            if(is_array($uri)){
                $attrs = array();
                foreach($uri AS $key => $value){
                    $attrs[] = $key."=\"".$value."\"";
                }
                $lines[] = "<link rel=\"stylesheet\" ".implode(" ",$attrs)."/>";
            }else{
                $lines[] = "<link rel=\"stylesheet\" href=\"{$uri}\"/>";
            }
        }
        return $lines;
    }
    
    public static function jsBulk(array $list){
        foreach($list AS $uri){
            self::js($uri);
        }
    }
    
    /**
     * Inclue e retorna as URIs js
     */
    public static function js($uri=null){
        if($uri === null){
            self::loadRequiredResources();
            return self::$data["js"];
        }
        self::$data["js"][] = $uri;
    }
    
    public static function jsTags(){
        $lines = array();
        foreach(Page::js() AS $uri){
            if(is_array($uri)){
                $attrs = array();
                foreach($uri AS $key => $value){
                    $attrs[] = $key."=\"".$value."\"";
                }
                $lines[] = "<script ".implode(" ",$attrs)."></script>";
            }else{
                $lines[] = "<script src=\"{$uri}\"></script>";
            }
        }
        return $lines;
    }
}
?>