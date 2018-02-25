<?php

class Chilly_Walker extends Walker_Nav_Menu {

    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $accesskey = $item->description;
        $permalink = $item->url;
        $output .= '<li class="' .  implode(" ", $item->classes) . '">';

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '"' ;

            if( $accesskey != '' ) {
                $output .= ' accesskey="' . $accesskey . '" ';
            }

            $output .=  '>';

        } else {
            $output .= '<span>';
        }

        $output .= $title;

        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }


}
?>
