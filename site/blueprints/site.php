<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
files: false
fields:
  title:
    label: Website main title
    type:  text
  contact_phone:
    label: Main contact phone number
    type: tel
  contact_email:
    label: Main contact email
    type: email
  contact_address:
    label: Registered address
    type: text
  description:
    label: Site description (for search engines)
    type:  textarea
    buttons:
  keywords:
    label: Site Keywords (for search engines)
    type:  tags
  copyright:
    label: Copyright
    type:  text