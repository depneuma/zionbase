<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'title' => 'Title',
            'office' => 'Office',
            'name' => 'Name',
            'email' => 'Email',
            'avatar' => 'Avatar',
            'password' => 'Password',
        ],
    ],

    'blogs' => [
        'name' => 'Blogs',
        'index_title' => 'Blogs List',
        'create_title' => 'Create Blog',
        'edit_title' => 'Edit Blog',
        'show_title' => 'Show Blog',
        'inputs' => [
            'user_id' => 'Author',
            'title' => 'Title',
            'body' => 'Body',
            'image' => 'Image',
        ],
    ],

    'events' => [
        'name' => 'Events',
        'index_title' => 'Events List',
        'create_title' => 'Create Event',
        'edit_title' => 'Edit Event',
        'show_title' => 'Show Event',
        'inputs' => [
            'rsvp_one_id' => 'First RSVP',
            'rsvp_two_id' => 'Second RSVP (Optional)',
            'rsvp_three_id' => 'Thrid RSVP (Optional)',
            'cover' => 'Cover',
            'title' => 'Title',
            'description' => 'Description',
            'schedule' => 'Schedule',
            'venue' => 'Venue',
            'date_time' => 'Date Time',
        ],
    ],

    'sermons' => [
        'name' => 'Sermons',
        'index_title' => 'Sermons List',
        'create_title' => 'Create Sermon',
        'edit_title' => 'Edit Sermon',
        'show_title' => 'Show Sermon',
        'inputs' => [
            'user_id' => 'Minister',
            'photo' => 'Photo',
            'event_id' => 'Event (Optional)',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'audio' => 'Audio',
            'video' => 'Video',
            'pdf' => 'PDF',
        ],
    ],

    'settings' => [
        'name' => 'Settings',
        'index_title' => 'Settings List',
        'create_title' => 'Create Setting',
        'edit_title' => 'Edit Setting',
        'show_title' => 'Show Setting',
        'inputs' => [
            'key' => 'Key',
            'value' => 'Value',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
