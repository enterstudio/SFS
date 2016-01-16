<?php if(!defined('KIRBY')) exit ?>

title: Service
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
  text:
    label: Page text
    type:  textarea
    buttons:
      - bold
      - link
      - email
  case_study:
    label: Featured case study
    type: select
    default: architecture
    options: query
    query: 
      page: about
      fetch: children
      value: '{{uid}}'
      text: '{{title}}'

  service_quote:
    label: Testimonial
    type: text
  service_citation:
    label: Testimonial citation
    type: text
    required: false
  line-seo:
    type: line
  description:
    label: Page description (for search engines)
    type:  textarea
    buttons:
  keywords:
    label: Page Keywords (for search engines)
    type:  tags