<?php
include_once 'mailchimp.php';
include_once 'stripe.php';
include_once 'infusion.php';
include_once str_replace('apis', '', __DIR__) . 'lib/countries.php';

add_action( 'wp_ajax_nopriv_donate_redirect', 'donate_redirect' );
add_action( 'wp_ajax_donate_redirect', 'donate_redirect' );

function donate_redirect() {
  echo get_option('donate_link');
  die();
}

add_action( 'wp_ajax_nopriv_mailchimp_subscribe', 'mailchimp_subscribe' );
add_action( 'wp_ajax_mailchimp_subscribe', 'mailchimp_subscribe' );

function mailchimp_subscribe() {
  $data = json_encode($_POST['data']);
  $listId = get_option('mailchimp_list_id');
  $apiKey =  get_option('mailchimp_api');
  $res = mc_subscribe($data, $listId, $apiKey);
  echo $res;
  die();
}

add_action( 'wp_ajax_nopriv_stripe_token', 'stripe_token' );
add_action( 'wp_ajax_stripe_token', 'stripe_token' );

function stripe_token() {
  $card = $_POST['data'];
  $apiKey =  get_option('stripe_key_private');
  $res = stripe_create_token( $apiKey, $card);
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_stripe_get_plan', 'get_plan' );
add_action( 'wp_ajax_stripe_get_plan', 'get_plan' );

function get_plan() {
  $card = $_POST['data'];
  $apiKey =  get_option('stripe_key_private');
  $res = stripe_get_plan($apiKey, 'donation-2');
  header('Content-type: application/json');
  echo json_encode($res);
  die();
  
}

add_action( 'wp_ajax_nopriv_stripe_charge', 'stripe_charge' );
add_action( 'wp_ajax_stripe_charge', 'stripe_charge' );

function stripe_charge() {
  $data = $_POST['data'];
  $apiKey =  get_option('stripe_key_private');
  $res = array('donation_type fail');

  if($data['donation_type'] == 'monthly') {
    $res = stripe_monthly($apiKey, $data);
  }
  
  if($data['donation_type'] == 'once') {
    $res = stripe_create_charge($apiKey, $data);
  }
  
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_countries', 'get_countries' );
add_action( 'wp_ajax_countries', 'get_countries' );

function get_countries() {
  $res = getCountries();
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_infusion_contact', 'infusion_contact' );
add_action( 'wp_ajax_infusion_contact', 'infusion_contact' );

function infusion_contact() {
  $data = $_POST['data'];
  $key = get_option('infusionsoft_key');
  $subdomain = get_option('infusionsoft_subdomain');
  $defaultTags = [800, 802, 820];
  $countryTags = infusion_get_countries_tags();
  $countryTag = array_key_exists($data['country'], $countryTags) ? [$countryTags[$data['country']]] : [];
  $tags = get_option('infusionsoft_tags') ? explode(',', get_option('infusionsoft_tags')) : [];
  $dataTags = $data['tags'] ? explode(',',  $data['tags']) : [876];
  $tags = array_merge($tags, $defaultTags, $countryTag, $dataTags);

  $infusionsoft = new Infusionsoft($subdomain, $key);
  $name = explode(" ", $data['name']);

  try {
    $res = $infusionsoft->contact( 'add', array(
      'FirstName' => $name[0],
      'LastName' => $name[1],
      'Email' => $data['email'],
      'Country' => $data['country']
    ));

    $optin = $infusionsoft->APIEmail('optIn', $data['email'], 'SingleOptIn');

    foreach($tags as $tag) {
      $infusionsoft->contact('addToGroup', $res, $tag);
    }

    header('Content-type: application/json');
    
    echo json_encode($optin);

  } catch(Exception $e) {
    echo json_encode(['error' => $e]);
  }

  die();
}


