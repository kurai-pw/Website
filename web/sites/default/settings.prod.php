<?php

$settings['reverse_proxy'] = TRUE;
$settings['reverse_proxy_addresses'] = ['new.kurai.pw'];
$settings['reverse_proxy_host_header'] = 'X_FORWARDED_HOST';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

$settings['entity_update_batch_size'] = 50;
$settings['entity_update_backup'] = TRUE;
$settings['migrate_node_migrate_type_classic'] = FALSE;

$settings['trusted_host_patterns'] = [
  // Live host patterns.
  '^new.kurai\.pw$',
  // Local host patterns.
  '^usasprayme\.ddev\.site$'
];

$base_url = 'https://new.kurai.pw/';
