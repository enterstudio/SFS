<?php

	return function($site, $pages, $page) {
    $form = uniform('contact-form', [
        'required' => [
            'name'  => '',
            '_from' => 'email'
        ],
        'actions' => [
            [
                '_action' => 'email',
                'to'      => (string) $page->email(),
                'sender'  => 'hello@sportfinancialservices.co.uk',
                'subject' => $site->title()->html() . ' - message from the contact form'
            ]
        ]
    ]);
    return compact('form');
};