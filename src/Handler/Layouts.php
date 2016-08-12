<?php namespace Anomaly\SelectFieldType\Handler;

use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Anomaly\Streams\Platform\Support\Str;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Layouts
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SelectFieldType
 */
class Layouts
{

    /**
     * Handle the options.
     *
     * @param SelectFieldType $fieldType
     * @param ThemeCollection $themes
     * @param Repository      $config
     * @param Filesystem      $files
     * @param Str             $str
     */
    public function handle(
        SelectFieldType $fieldType,
        ThemeCollection $themes,
        Repository $config,
        Filesystem $files,
        Str $str
    ) {
        $theme = $themes->get($config->get('streams::themes.standard'));

        $layouts = $files->allFiles($theme->getPath('resources/views/layouts'));

        $options = array_combine(
            array_map(
                function ($path) use ($theme) {
                    return 'theme::' . ltrim(
                        str_replace(
                            $theme->getPath('resources/views'),
                            '',
                            str_replace('\\', '/', $path)
                        ),
                        '/\\'
                    );
                },
                $layouts
            ),
            array_map(
                function ($path) use ($theme, $str) {
                    return $str->humanize(
                        basename(
                            ltrim(
                                str_replace(
                                    $theme->getPath('resources/views/layouts'),
                                    '',
                                    str_replace('\\', '/', $path)
                                ),
                                '/\\'
                            ),
                            '.twig'
                        )
                    );
                },
                $layouts
            )
        );

        foreach ($files->directories($theme->getPath('resources/views/layouts')) as $directory) {

            $layouts = $files->allFiles($directory);

            $options[$str->humanize(str_slug(basename($directory), '_'))] = array_combine(
                array_map(
                    function ($path) use ($theme) {
                        return 'theme::' . ltrim(
                            str_replace(
                                $theme->getPath('resources/views'),
                                '',
                                str_replace('\\', '/', $path)
                            ),
                            '/\\'
                        );
                    },
                    $layouts
                ),
                array_map(
                    function ($path) use ($theme, $str) {
                        return $str->humanize(
                            basename(
                                ltrim(
                                    str_replace(
                                        $theme->getPath('resources/views/layouts'),
                                        '',
                                        str_replace('\\', '/', $path)
                                    ),
                                    '/\\'
                                ),
                                '.twig'
                            )
                        );
                    },
                    $layouts
                )
            );
        }

        $fieldType->setOptions($options);
    }
}
