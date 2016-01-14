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
                'to'      => 'petercolesdc@gmail.com',
                'sender'  => 'webenquiry@sportfinancialservices.co.uk',
                'subject' => 'Message from website contact form'
            ]
        ]
    ]);
    return compact('form');
};