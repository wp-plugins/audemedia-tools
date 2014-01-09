<?php
function modify_contact_methods($profile_fields) {

    // Add new fields
    $profile_fields['twitter'] = 'Twitter URL';
    $profile_fields['facebook'] = 'Facebook URL';
    $profile_fields['gplus'] = 'Google+ URL';
    $profile_fields['pinterest'] = 'Pinterest URL';

    return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');
?>