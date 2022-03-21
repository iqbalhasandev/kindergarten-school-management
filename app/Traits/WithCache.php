<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait WithCache
{

    // protected static $cacheKey = '';

    protected static $oldKeys = [];

    /**
     *
     * Cache table Data
     */
    public static function cacheData($column = 'id')
    {

        return Cache::rememberForever(self::$cacheKey, function () use ($column) {
            $query = static::orderBy($column, 'desc');
            if (isset(self::$cacheRelationshipKeys)) {
                foreach (self::$cacheRelationshipKeys as $key => $model) {
                    $query =  $query->with($key);
                }
            }
            return $query->get();
        });
    }

    /**
     *
     * Cache table Data
     */
    public static function cacheDataASC($column = 'id')
    {
        return Cache::rememberForever(self::$cacheKey . '_latest_', function () use ($column) {
            $query = static::orderBy($column, 'asc');
            if (isset(self::$cacheRelationshipKeys)) {
                foreach (self::$cacheRelationshipKeys as $key => $model) {
                    $query =  $query->with($key);
                }
            }
            return $query->get();
            return $query->get();
        });
    }
    /**
     *
     * Cache table first Data
     */
    public static function cacheDataFirst()
    {
        return Cache::rememberForever(self::$cacheKey . '_first_', function () {
            $query = new static;
            if (isset(self::$cacheRelationshipKeys)) {
                foreach (self::$cacheRelationshipKeys as $key => $model) {
                    $query =  $query->with($key);
                }
            }
            return $query->first();
        });
    }
    /**
     *
     * Cache table Last Data
     */
    public static function cacheDataLast($column = 'id')
    {
        return Cache::rememberForever(self::$cacheKey . '_last_', function () use ($column) {
            $query =  static::orderBy($column, 'desc');
            if (isset(self::$cacheRelationshipKeys)) {
                foreach (self::$cacheRelationshipKeys as $key => $model) {
                    $query =  $query->with($key);
                }
            }
            return $query->first();
        });
    }

    /**
     *
     * Cache table query
     */
    public static function cacheDataQuery($cacheKey, $query)
    {
        return Cache::rememberForever(self::$cacheKey . $cacheKey, function () use ($query) {
            return $query;
        });
    }
    /**
     *
     * Cache table cache
     */
    public static function forgetCache($cacheKey = null)
    {
        if (isset(self::$cacheKeys)) {

            foreach (self::$cacheKeys as $key) {
                Cache::forget(self::$cacheKey . $key);
            }
        }

        if (isset(self::$cacheRelationshipKeys)) {

            foreach (self::$cacheRelationshipKeys as $key => $model) {
                if (in_array($key, self::$oldKeys)) break;
                \array_push(self::$oldKeys, $key);
                $model::forgetCache();
            }
            self::$oldKeys = [];
        }

        Cache::forget(self::$cacheKey);
        Cache::forget(self::$cacheKey . '_latest_');
        Cache::forget(self::$cacheKey . '_first_');
        Cache::forget(self::$cacheKey . '_last_');
        if ($cacheKey) {
            Cache::forget(self::$cacheKey . $cacheKey);
        }
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($data) {
            $data->forgetCache();
        });

        static::updated(function ($data) {
            $data->forgetCache();
        });
        static::deleted(function ($data) {
            $data->forgetCache();
        });
    }
}
