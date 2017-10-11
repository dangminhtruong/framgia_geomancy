<?php

namespace App\Framgia\Helpers;

class Paginator
{
    /*----------------------------------------
     * Inpuable config key
     *----------------------------------------
     * $config = [
     *  'total_record' - total record of paginate object
     *  'current_page' - current page number
     *  'link_per_page' - display link
     *  'record_per_page' - records per page
     *  'link' - paginate link
     *  'a_style' - style class for <a> tag
     *  'li_style' - style class for <li> tag
     *  'li_active' - active style class for <li> tag
     *  'a_active' - active style class for <a> tag
     */

    // Default tag style class
    private static $config = [
        'a_style' => '',
        'a_active' => '',
        'li_active' => 'active',
        'li_style' => 'paginate_button',
        'record_per_page' => 30,
        'link_per_page' => 5,
        'link' => '',
    ];

    // Require array key for paginator config
    private static $require_key = ["total_record", "current_page", "link_per_page"];


    /**
     *  Validate input array
     *
     * @param $config (array) - config info for paginate
     *
     * @return Array
     */
    private static function validateConfig($config)
    {
        $config = array_merge(self::$config, $config);
        foreach (self::$require_key as $key) {
            if (!array_key_exists($key, $config)) {
                throw new \Exception("[Paginate config error]: Input array require a $key key");
            }
        }
        if (!is_numeric($config['total_record']) || $config['total_record'] < 0) {
            $error = '[Paginate config error]: "total_record" value must be a positive number';
            throw new \Exception($error);
        }
        if (!is_numeric($config['current_page']) || $config['current_page'] < 0) {
            $error = '[Paginate config error]: "current_page" value must be a positive number';
            throw new \Exception($error);
        }
        if (!is_numeric($config['link_per_page']) || $config['link_per_page'] < 0) {
            $error = '[Paginate config error]: "link_per_page" value must be a positive number';
            throw new \Exception($error);
        }
        if ($config['link_per_page'] % 2 == 0) {
            $error = '[Paginate config error]: "link_per_page" value must be an odd number';
            throw new \Exception($error);
        }
        return $config;
    }


    /**
     *  Init aditional config info from input config
     *
     * @param $config (array) - config info for paginate
     *
     * @return Array
     */
    private static function initConfig($config)
    {
        if ($config['total_record'] == 0) {
            $config['total_page'] = 0;

            return $config;
        }
        else {
            $config['total_page'] = ceil($config['total_record'] / $config['record_per_page']);
            if ($config['total_page'] == 1) {
                $config['current_page'] = 1;

                return $config;
            }
            if ($config['link_per_page'] == 1) {
                $config['start'] = $config['current_page'];
                $config['stop'] = $config['current_page'];

                return $config;
            }
            if ($config['current_page'] > $config['total_page']) {
                $config['current_page'] = 1;
                $config['start'] = 1;
                $config['stop'] = $config['link_per_page'];

                return $config;
            }
            if ($config['link_per_page'] >= $config['total_page']) {
                $config['start'] = 1;
                $config['stop'] = $config['total_page'];

                return $config;
            }
            $before = static::initBeforeCurrent($config);
            $after = static::initAfterCurrent($config);
            $config['start'] = $before['plan_start'] - $after['add_before'];
            $config['stop'] = $after['plan_stop'] + $before['add_after'];

            return $config;
        }
    }


    /**
     *  Init start page number
     *
     * @param $config (array) - config info for paginate
     *
     * @return Array
     */
    private static function initBeforeCurrent($config)
    {
        $side_link_number = round($config['link_per_page'] / 2, 0, PHP_ROUND_HALF_DOWN);
        $plan_start = $config['current_page'] - $side_link_number;
        if ($plan_start < 0) {
            return [
                'plan_start' => 1,
                'add_after' => $side_link_number
            ];
        }
        if ($plan_start == 0) {
            return [
                'plan_start' => 1,
                'add_after' => 1
            ];
        }
        return [
            'plan_start' => $plan_start,
            'add_after' => 0
        ];
    }


    /**
     *  Init stop page number
     *
     * @param $config (array) - config info for paginate
     *
     * @return Array
     */
    private static function initAfterCurrent($config)
    {
        $side_link_number = round($config['link_per_page'] / 2, 0, PHP_ROUND_HALF_DOWN);
        $plan_stop = $config['current_page'] + $side_link_number;
        if ($config['current_page'] == $config['total_page']) {
            return [
                'plan_stop' => $config['current_page'],
                'add_before' => $side_link_number
            ];
        }
        if ($plan_stop > $config['total_page']) {
            return [
                'plan_stop' => $config['current_page'] + $plan_stop - $config['total_page'],
                'add_before' => $plan_stop - $config['total_page']
            ];
        }
        return [
            'plan_stop' => $plan_stop,
            'add_before' => 0
        ];
    }


    /**
     *  Create link to input page number
     *
     * @param $link (string) - link to page
     * @param $page_no (int) - page number
     *
     * @return String
     */
    private static function initLink($link, $page_no)
    {
        if ($link == '') {
            return 'javascript:void(0)';
        }
        return str_replace('{?}', $page_no, $link);
    }


    /**
     *  Init single link template in html
     *
     * @param $link (string) - link to page
     * @param $content (string) - html inner content
     * @param $config (array) - config info for paginate
     * @param $a_active (string) - active class for <a> tag
     * @param $li_active (string) - active class for <li> tag
     *
     * @return String
     */
    private static function initView($link, $content, $config, $page = '', $a_active = '', $li_active = '')
    {
        $li_class = isset($config['li_style']) ? $config['li_style'] : '';
        $a_class = isset($config['a_style']) ? $config['a_style'] : '';

        return "<li class='$li_class $li_active'>
                    <a href='$link' class='$a_class $a_active' data-page='$page'>
                        $content
                    </a>
                </li>";
    }


    /**
     *  Create link list with start and stop page
     *
     * @param $config (array) - config info for paginate
     *
     * @return String
     */
    private static function createView($config)
    {
        $view = '';
        if ($config['current_page'] != 1) {
            $tmp_link = static::initLink($config['link'], 1);
            $view .= static::initView($tmp_link, "&lt;", $config, 1);
        }
        for ($i = $config['start']; $i <= $config['stop']; $i++) {
            if ($i == $config['current_page']) {
                $tmp_link = static::initLink($config['link'], $i);
                $view .= static::initView($tmp_link, $i, $config, '', $config['a_active'], $config['li_active']);
                continue;
            }
            $tmp_link = static::initLink($config['link'], $i);
            $view .= static::initView($tmp_link, $i, $config, $i);
        }
        if ($config['current_page'] != $config['total_page']) {
            $tmp_link = static::initLink($config['link'], $config['total_page']);
            $view .= static::initView($tmp_link, "&gt;", $config, $config['total_page']);
        }
        return $view;
    }


    /**
     *  [MAIN] Create link list for paginate view
     *
     * @param $config (array) - config info for paginate
     *
     * @return String
     */
    public static function paginate($config)
    {
        $config = static::validateConfig($config);
        $config = static::initConfig($config);
        if ($config['total_page'] == 0) {
            return '';
        }
        if ($config['total_page'] == 1) {
            $link = static::initLink($config['link'], 1);

            return static::initView($link , 1, $config, 1);
        }
        return static::createView($config);
    }
}
