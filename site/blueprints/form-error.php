<?php if(!defined('KIRBY')) exit ?>

title: Form error
pages: false
files: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
    buttons:
      - bold
      - link
      - email
  line-seo:
    type: line
  description:
    label: Page description (for search engines)
    type:  textarea
    buttons:
  keywords:
    label: Page Keywords (for search engines)
    type:  tags