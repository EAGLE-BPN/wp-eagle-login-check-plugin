<?php

/*
  Plugin Name: Eagle Login Check
  Plugin URI: http://www.fedece.com/eagle-login-check
  Description: This plugin implements a login check for FMA server
  Author: Michele Del Giudice
  Author URI: http://www.fedece.com
  Version: 1.0
  License: GPL2
  Copyright 2014  Michele Del Giudice  (email : michele@fedece.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

function elc_process_login_request() {
    $creds = array();
    $creds['user_login'] = $_REQUEST['username'];
    $creds['user_password'] = $_REQUEST['password'];
    $creds['remember'] = false;
    $user = wp_signon($creds, false);
    if (is_wp_error($user)){
          echo 0;
    }
    else{
        echo 1;
    }
    exit();
}

add_action('wp_ajax_elc_process_login_request', 'elc_process_login_request');
add_action('wp_ajax_nopriv_elc_process_login_request', 'elc_process_login_request');
?>