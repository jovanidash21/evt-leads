<?php

$challenge    = $_REQUEST['hub_challenge'];
$verify_token = $_REQUEST['hub_verify_token'];

if ( $verify_token === 'abc123' ) {
  echo $challenge;
}

$input = json_decode( file_get_contents( 'php://input' ), true );

if (
  ! empty( $input ) &&
  ! empty( $input['entry'] )
) {
  foreach ( $input['entry'] as $item ) {
    if ( ! empty( $item['changes'] ) ) {
      foreach ( $item['changes'] as $change ) {
        if ( $change['field'] === 'leadgen' ) {
          $leadgen_id   = $change['value']['leadgen_id'];
          $access_token = 'EABHeZB1EmkwgBAI0YLZAZBfBq86gv37zA1ZAGLkAN081HzR1m3PxuC1qcnhnPiXmBydeTQMti5P7UKa3NpyhCYu717PQSqLQ4ZC7TtRQLZBB3TBxZBZBpO9HpTMh8q9S1rFA0f6ClNVhz6q26dfEra4az6j1ZAWkBaxYC46Aa9WCm2e9Po5rfwZCCW';
          $facebook_api = "https://graph.facebook.com/v13.0/{$leadgen_id}/?access_token={$access_token}";

          if ( ini_get( 'allow_url_fopen' ) ) {
            $facebook_data = @file_get_contents( $facebook_api );
          } else {
            $curl    = curl_init();
            $timeout = 30;
            curl_setopt( $curl, CURLOPT_URL, $facebook_api );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
            $facebook_data = curl_exec( $curl );
            curl_close( $curl );
          }

          if ( ! empty( $facebook_data ) ) {
            $facebook_data = json_decode( $facebook_data, true, 512, JSON_BIGINT_AS_STRING );

            error_log( print_r( $facebook_data, true ) );
          }
        }
      }
    }
  }
}
