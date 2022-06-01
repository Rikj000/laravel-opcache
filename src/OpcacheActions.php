<?php

namespace Rikj000\Opcache;

use Symfony\Component\ErrorHandler\Error\FatalError;
use Symfony\Component\Finder\Finder;
use Throwable;

/**
 * Class OpcacheClass.
 */
class OpcacheActions
{
    /**
     * Clear OPcache.
     */
    public function clear()
    {
        if (function_exists('opcache_reset')) {
            return opcache_reset();
        }

        return false;
    }

    /**
     * Get configuration values.
     */
    public function getConfig()
    {
        if (function_exists('opcache_get_configuration')) {
            return opcache_get_configuration();
        }

        return false;
    }

    /**
     * Get status info.
     */
    public function getStatus()
    {
        if (function_exists('opcache_get_status')) {
            return opcache_get_status(false);
        }

        return false;
    }

    /**
     * Pre-compile php scripts.
     * @param bool $force
     * @return array
     */
    public function compile($force = false)
    {
        if (!ini_get('opcache.dups_fix') && !$force) {
            return ['message' => 'opcache.dups_fix must be enabled, or run with --force'];
        }

        if (function_exists('opcache_compile_file')) {
            $compiled = 0;

            // Get files in these paths
            $files = collect(Finder::create()->in(config('opcache.directories'))
                ->name('*.php')
                ->ignoreUnreadableDirs()
                ->notContains('#!/usr/bin/env php')
                ->exclude(config('opcache.exclude'))
                ->files()
                ->followLinks());

            // optimized files
            $files->each(function ($file) use (&$compiled) {
                try {
                    if (!opcache_is_script_cached($file)) {
                        opcache_compile_file($file);
                    }

                    $compiled++;
                } catch (Throwable|FatalError $e) {
                }
            });

            return [
                'total_files_count' => $files->count(),
                'compiled_count' => $compiled,
            ];
        }
        return [];
    }
}
