<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
files: true
  max: 5
  size: 1000000
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
  case_study:
    label: Featured case study
    type: select
    default: architecture
    options: query
    query: 
      page: about
      fetch: children
  
  section_hero:
    label: Hero area
    type: headline
  info_hero
    type: info
    text: >
      <p>Hero areas define the top potion of the page underneath the navigation. It requires:</p>
      <ol>
         <li>An image, ideally sized at <b>##x##px</b>. (You should upload into the files section to the left, and then reference the image using the select field below)</li>
         <li>A short description no longer than <b>xx words</b></li>
      </ol>
  hero_image:
    label: Hero image
    type: select
    options: images
  hero_text:
    label: Hero text
    type: textarea
    size: small
    buttons: false
    required: true
    
  section_services:
    label: Services snippet
    type: headline
  info_services
    type: info
    text: >
      <p>This area gives a very brief overview of your services on the homepage. It requires:</p>
      <ol>
         <li>A short description no longer than <b>xx words</b></li>
         <li>A testimonial no longer than <b>xx words</b>, excluding citation</li>
      </ol>
  services_text:
    label: Services text
    type: textarea
    size: small
    buttons: false
    required: true
  services_quote:
    label: Quotation
    type: text
    required: true
  services_citation:
    label: Citation
    type: text
    required: false
    
  section_about:
    label: About snippet
    type: headline
  info_about
    type: info
    text: >
      <p>This area gives a very brief overview of who you are. It requires:</p>
      <ol>
         <li>A short description no longer than <b>xx words</b></li>
         <li>An image, ideally sized at <b>##x##px</b>. (You should upload into the files section to the left, and then reference the image using the select field below)</li>
      </ol>
  section1_image:
    label: About image
    type: select
    options: images
    required: false
  about_text:
    label: About text
    type: textarea
    size: small
    buttons: false
    required: true
  about_case_study:
    label: Featured case study
    type: select
    default: architecture
    options: query
    query: 
      page: about
      fetch: children
      value: '{{uid}}'
      text: '{{title}}'