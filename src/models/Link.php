<?php
namespace Serverfireteam\Panel;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Link extends Eloquent {

    protected $collection = 'links';

    static $cache = [];

    public static function allCached($forceRefresh = false)
    {
        if (!isset(self::$cache['all']) || $forceRefresh) {
            self::$cache['all'] = Link::all();
        }

        return self::$cache['all'];
    }

    public static function returnUrls($forceRefresh = false) {

        if (!isset(self::$cache['all_urls']) || $forceRefresh) {
            $configs = Link::allCached($forceRefresh);
            self::$cache['all_urls'] =  $configs->pluck(['url', 'model'])->toArray();
        }

        return self::$cache['all_urls'];
    }

    public static function getMainUrls($forceRefresh = false){

        if (!isset(self::$cache['main_urls']) || $forceRefresh) {
            $configs = Link::where('main', '=', true)->get(['url']);
            self::$cache['main_urls'] = $configs->pluck('url')->toArray();
        }

        return self::$cache['main_urls'];
    }


    public function getAndSave($url, $display, $model){
        $this->url = $url;
        $this->display = $display;
        $this->model = $model;
        $this->save();
    }

    protected $fillable = array('url', 'display', 'main', 'model');
    
}
