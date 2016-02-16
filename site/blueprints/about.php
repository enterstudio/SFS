<?php if(!defined('KIRBY')) exit ?>

title: About
pages: true
  template: case-study
  max: 3
files: true
  max: 2
  size: 500000
  type:
    - image
  fields: 
    alt_text:
      label: Alternative text
      type: text
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
  profile_image1:
    label: Steve image
    type: select
    options: images
  profile_image2:
    label: Martin image
    type: select
    options: images
  line-seo:
    type: line
  description:
    label: Page description (for search engines)
    type:  textarea
    buttons:
  keywords:
    label: Page Keywords (for search engines)
    type:  tags