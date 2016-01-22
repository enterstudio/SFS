<?php if(!defined('KIRBY')) exit ?>

title: Snippets
pages: false
files: true
  size: 1000000
  fields: 
    alt_text:
      label: Alternative text
      type: text
fields:
  title:
    label: Title
  info_page
    type: info
    text: >
      <p>This section collates snippets of content for the site as a whole. Snippets are partial pieces that maybe included on one or more pages. They are included here, as this allows us to keep a single point of origin for each snippet.</p>
	      
  snippet_a:
    type: headline
    label: Association / client logos
  logo_a:
    label: Logo image position 1
    type: select
    options: images
  logo_b:
    label: Logo image position 2
    type: select
    options: images
  logo_c:
    label: Logo image position 3
    type: select
    options: images
  logo_d:
    label: Logo image position 4
    type: select
    options: images
    
  snippet_b:
    type: headline
    label: Site-wide images
  img_footer:
    label: Footer image
    type: select
    options: images
