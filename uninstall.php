<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package SimpleForms
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Clear database stored data via wordpress defined functions
//    $books = get_posts(['post_type' => 'book', 'numberposts' => -1]);
//    foreach ($books as $book) {
//        wp_delete_post($book->ID, true);
//    }

// ALTERNATIVE: Access the database via SQL
// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type LIKE 'book';");
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts);");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts);");