<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth
$route['login']           = 'auth';
$route['login/proses']    = 'auth/login';
$route['logout']          = 'auth/logout';

// Dashboard
$route['dashboard']       = 'dashboard';

// Produk (admin only)
$route['produk']                    = 'produk';
$route['produk/tambah']             = 'produk/tambah';
$route['produk/simpan']             = 'produk/simpan';
$route['produk/edit/(:num)']        = 'produk/edit/$1';
$route['produk/update/(:num)']      = 'produk/update/$1';
$route['produk/hapus/(:num)']       = 'produk/hapus/$1';

// Pelanggan (admin only)
$route['pelanggan']                 = 'pelanggan';
$route['pelanggan/tambah']          = 'pelanggan/tambah';
$route['pelanggan/simpan']          = 'pelanggan/simpan';
$route['pelanggan/edit/(:num)']     = 'pelanggan/edit/$1';
$route['pelanggan/update/(:num)']   = 'pelanggan/update/$1';
$route['pelanggan/hapus/(:num)']    = 'pelanggan/hapus/$1';

// Sales Order
$route['sales_order']                       = 'sales_order';
$route['sales_order/tambah']                = 'sales_order/tambah';
$route['sales_order/simpan']                = 'sales_order/simpan';
$route['sales_order/detail/(:num)']         = 'sales_order/detail/$1';
$route['sales_order/ubah_status/(:num)']    = 'sales_order/ubah_status/$1';
$route['sales_order/hapus/(:num)']          = 'sales_order/hapus/$1';
$route['sales_order/get_produk/(:num)']     = 'sales_order/get_produk/$1';

// Laporan (admin + manager)
$route['laporan']                   = 'laporan';
$route['laporan/per_sales']         = 'laporan/per_sales';
$route['laporan/per_produk']        = 'laporan/per_produk';
$route['laporan/per_periode']       = 'laporan/per_periode';
$route['laporan/cetak_pdf']         = 'laporan/cetak_pdf';
$route['laporan/cetak_pdf/(:any)']  = 'laporan/cetak_pdf/$1';

// User Management (admin only)
$route['users']                 = 'users';
$route['users/tambah']          = 'users/tambah';
$route['users/simpan']          = 'users/simpan';
$route['users/edit/(:num)']     = 'users/edit/$1';
$route['users/update/(:num)']   = 'users/update/$1';
$route['users/hapus/(:num)']    = 'users/hapus/$1';