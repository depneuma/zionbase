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
            'name' => 'Name',
            'email' => 'Email',
            'avatar' => 'Avatar',
            'password' => 'Password',
        ],
    ],

    'events' => [
        'name' => 'Events',
        'index_title' => 'Events List',
        'create_title' => 'Create Event',
        'edit_title' => 'Edit Event',
        'show_title' => 'Show Event',
        'inputs' => [
            'rsvp_three_id' => 'Rsvp Three Id',
            'rsvp_two_id' => 'Rsvp Two Id',
            'cover' => 'Cover',
            'rsvp_one_id' => 'First RSVP',
            'title' => 'Title',
            'description' => 'Description',
            'venue' => 'Venue',
            'schedule' => 'Schedule',
            'time' => 'Time',
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
            'image' => 'Image',
            'title' => 'Title',
            'body' => 'Body',
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
            'event_id' => 'Event (Optional)',
            'cover' => 'Cover',
            'audio' => 'Audio',
            'video' => 'Video',
            'pdf' => 'Pdf',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
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