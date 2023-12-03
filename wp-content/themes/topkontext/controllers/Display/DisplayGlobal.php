<?php namespace TOP\Display;

if( !defined( 'ABSPATH' ) ) exit;

class DisplayGlobal {

    /**
     * @param        $link
     * @param string $classes
     * @param bool   $echo
     *
     * @return string|void
     */
    public static function renderAcfLink( $link, $classes = '', $echo = true ) {
        if( empty( $link['url'] ) ) return;

        $title = !empty( $link['title'] ) ? $link['title'] : $link['url'];
        $target = !empty( $link['target'] ) ? 'target="_blank"' : '';

        $link_html = "<a href='".$link['url']."' class='".$classes."' ".$target.">".$title."</a>";

        if( $echo ) {
            echo $link_html;

            return;
        }

        return $link_html;
    }

    /**
     * @param        $image
     * @param string $classes
     * @param bool   $echo
     *
     * @return string|void
     */
    public static function renderAcfImage( $image, $classes = '', $echo = true, $attrs_data = [] ) {
        if( empty( $image['url'] ) ) return;

        $alt = !empty( $link['alt'] ) ? $link['alt'] : '';
        $classes = !empty( $classes ) ? " class='".$classes."' " : '';
        $attrs = '';
        if( !empty( $attrs_data ) ) {
            foreach( $attrs_data as $attrs_datum_key => $attrs_datum ) {
                $attrs .= $attrs_datum_key.'="'.$attrs_datum.'" ';
            }
        }

        $image_html = '<img src="'.$image['url'].'" alt="'.$alt.'"'.$classes.' '.$attrs.'>';

        if( $echo ) {
            echo $image_html;

            return;
        }

        return $image_html;
    }

    /**
     * @param        $video
     * @param string $classes
     * @param string $id
     * @param string $attrs
     * @param bool   $echo
     *
     * @return string|void
     */
    public static function renderAcfVideo( $video, $classes = '', $id = '', $attrs = '', $echo = true ) {
        if( empty( $video['url'] ) ) return;

        $classes = !empty( $classes ) ? " classes='".$classes."' " : '';
        $id = !empty( $id ) ? " id='".$id."' " : '';

        $video_html = '<video loop playsinline '.$id.' '.$classes.' '.$attrs.'>
                <source src="'.$video['url'].'" type="'.$video['mime_type'].'">
            </video>';

        if( $echo ) {
            echo $video_html;

            return;
        }

        return $video_html;
    }

    /**
     * @param      $array
     * @param      $index
     * @param bool $echo
     *
     * @return mixed|string|void
     */
    public static function renderArrayIndexOrNothing( $array, $index, $echo = true ) {
        $res = !empty( $array[ $index ] ) ? $array[ $index ] : '';

        if( $echo ) {
            echo $res;

            return;
        }

        return $res;
    }


    public static function generateStyleWithBgImageOrNothing( $image ) {
        return !empty( $image['url'] ) ? 'style="background-image:url('.$image['url'].');"' : '';
    }


    public static function getTemplate( $slug, $args = [], $echo = true ) {
        if( empty( $slug ) ) return '';

        $dir = get_stylesheet_directory();
        $full_path = $dir.'/'.$slug.'.php';
        if( !file_exists( $full_path ) ) return '';
        if( !empty( $args ) ) {
            extract( $args );
        }

        ob_start();
        include $full_path;

        $content = ob_get_clean();

        if( $echo ) {
            echo $content;

            return;
        }

        return $content;
    }

}

class_alias( 'TOP\Display\DisplayGlobal', 'DisplayGlobal' );
