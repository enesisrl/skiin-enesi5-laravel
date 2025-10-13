<?php

namespace App\Console\Commands\Utility;

use Master\Foundation\Modules\Commands\Command;

class GenerateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:module {module_source} {model_source} {module_destination} {model_destination}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Duplicate files and perform find/replace module and model names in files and filenames.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $module_source = $this->argument('module_source');
        $module_destination = $this->argument('module_destination');
        $model_source = $this->argument('model_source');
        $model_destination = $this->argument('model_destination');

        $root = base_path() . "/master/Modules/";

        $source = $root . $module_source;
        $destination = $root . $module_destination;

        // Prepare content replacement mappings
        $content_replace = $this->prepareReplacements($module_source, $module_destination, $model_source, $model_destination);

        echo "Source: {$source}\n";
        echo "Destination: {$destination}\n";

        if (!is_dir($source)) {
            echo "> SOURCE NOT FOUND\n";
            return 1;
        }

        if (file_exists($destination)) {
            echo "> DESTINATION ALREADY EXISTS\n";
            return 1;
        }

        // Copy and modify files
        mkdir($destination, 0755);
        $directory = new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new \RecursiveIteratorIterator($directory, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $item) {
            // Manage directories
            if ($item->isDir()) {
                mkdir($destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName(), 0755);
            } else {
                // Handle filenames and content replacement
                $sub_path_name = $this->replaceInFilename($iterator->getSubPathName(), $module_source, $module_destination, $model_source, $model_destination);
                $item_destination = $destination . DIRECTORY_SEPARATOR . $sub_path_name;

                // Replace content in the files
                $item_content = file_get_contents($item);
                $new_content = str_replace(array_keys($content_replace), array_values($content_replace), $item_content);
                file_put_contents($item_destination, $new_content);
            }
        }

        echo "> FILES GENERATED SUCCESSFULLY\n";
        return 0;
    }

    /**
     * Prepares the content replacement map based on module and model names.
     *
     * @param string $module_source
     * @param string $module_destination
     * @param string $model_source
     * @param string $model_destination
     * @return array
     */
    private function prepareReplacements($module_source, $module_destination, $model_source, $model_destination)
    {
        $replacements = [];

        // Lowercase
        $replacements[strtolower($module_source)] = strtolower($module_destination);
        $replacements[strtolower($model_source)] = strtolower($model_destination);

        // Uppercase
        $replacements[strtoupper($module_source)] = strtoupper($module_destination);
        $replacements[strtoupper($model_source)] = strtoupper($model_destination);

        // CamelCase
        $replacements[$this->toCamelCase($module_source)] = $this->toCamelCase($module_destination);
        $replacements[$this->toCamelCase($model_source)] = $this->toCamelCase($model_destination);

        // Exact match
        $replacements[$module_source] = $module_destination;
        $replacements[$model_source] = $model_destination;

        // Snake_case
        $replacements[$this->toSnakeCase($module_source)] = $this->toSnakeCase($module_destination);
        $replacements[$this->toSnakeCase($model_source)] = $this->toSnakeCase($model_destination);

        return $replacements;
    }

    /**
     * Replaces module and model names in filenames.
     *
     * @param string $filename
     * @param string $module_source
     * @param string $module_destination
     * @param string $model_source
     * @param string $model_destination
     * @return string
     */
    private function replaceInFilename($filename, $module_source, $module_destination, $model_source, $model_destination)
    {
        $filename = str_replace($module_source, $module_destination, $filename);
        return str_replace($model_source, $model_destination, $filename);
    }

    /**
     * Converts a string with underscores to CamelCase.
     *
     * @param string $string
     * @return string
     */
    private function toCamelCase($string)
    {
        return implode('', array_map('ucfirst', explode('_', strtolower($string))));
    }

    /**
     * Converts a CamelCase string to snake_case.
     *
     * @param string $string
     * @return string
     */
    private function toSnakeCase($string)
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string));
    }
}
