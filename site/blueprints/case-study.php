<?php if(!defined('KIRBY')) exit ?>

title: Case study
pages: false
files: true
  max: 5
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
  info_page
    type: info
    text: >
      <p>This page outlines a case study for an individual club or organisation. It seeks to detail the process you undertook, and tell the story.</p>
  page_image:
    label: Page image
    type: select
    options: images
  client_logo:
    label: Organisation logo
    type: select
    options: images
  text_1:
    label: Overview text
    type:  textarea
    buttons:
      - bold
      - link
      - email
  text_2:
    label: What SFS did
    type:  textarea
    buttons:
      - bold
      - link
      - email
  text_3:
    label: The results
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