<?php
if(!class_exists('DBargainCheckSubscriptionApi')) {
    return;
}

/**
 * 'wp_api_url' => 'https://dbargain.fahsoft.com/wp-json/dbargain/post/membership',
 */
class DBargainCheckSubscriptionApi{

    var $prefix;
    public function __construct() {
        $this->prefix = 'dbargain_rest_methods';
        $this->namespace_auth = '/dbargain/auth';
        $this->namespace_dbargain_post = '/dbargain/post';
        $this->namespace_dbargain_get = '/dbargain/get';
        add_action('rest_api_init', array( $this, 'dbargain_register_routes' ) );
    }

    public function dbargain_register_routes() {

        register_rest_route($this->namespace_dbargain_post,'/membership', array(
            // Notice how we are registering multiple endpoints the 'schema' equates to an OPTIONS request.
                array(
                    'methods'  => 'POST',
                    'callback' => array( $this, 'dbargainCheckMembership'),
                    'permission_callback' => '__return_true'
                ),
            )
        );


    }

    public function dbargainCheckMembership(WP_REST_Request $request) {

        global $wpdb;

        if(!isset($request['dbargainMerchantId']) || empty($request['dbargainMerchantId'])){
            $response['status'] = $this->dBargainApiStatus('NOT FOUND');
            $response['message'] = 'Merchant Id is not found';
            return rest_ensure_response($response);
        }

    
		//$membershipId = 'wc_order_iA9QRKrZvj3Dt';
        $membershipId = $request['dbargainMerchantId'];
        $postID = $this->get_post_id_by_meta_key_and_value('_order_key',$membershipId);
        $postType = $this->get_post_type_by_meta_key_and_value('_order_key',$membershipId);
        $apiStatus = false;

        if($postID != false && $postType!=false && $postType=='wps_subscriptions'){

            $wps_next_payment_date = get_post_meta($postID,'wps_next_payment_date',true);
            if ( ! empty( $wps_next_payment_date ) ) {
                $wps_next_payment_date = intval($wps_next_payment_date);
                $apiStatus = ($wps_next_payment_date >= time()) ? true : false;               
            }
            else {
                $apiStatus = false;
            }

        }
        else {
            $apiStatus = false;
        }

        if($apiStatus){
            $response['status'] = $this->dBargainApiStatus('OK');
            $response['message'] = 'Merchant id successfully found';
            $response['time'] = $wps_next_payment_date;
        }
        else {  
            
            $response['status'] = $this->dBargainApiStatus('NOT FOUND');
            $response['message'] = 'Merchant Id is not found';

        }

        return rest_ensure_response($response);

    }


   
    public function get_post_id_by_meta_key_and_value($key, $value) {

        global $wpdb;
        $meta = $wpdb->get_results("SELECT * FROM `".$wpdb->postmeta."` WHERE meta_key='".$wpdb->escape($key)."' AND meta_value='".$wpdb->escape($value)."'");
        if (is_array($meta) && !empty($meta) && isset($meta[0])) {
            $meta = $meta[0];
        }   
        if (is_object($meta)) {
            return $meta->post_id;
        }
        else {
            return false;
        }
    }

    public function get_post_type_by_meta_key_and_value($meta_key, $meta_value) {
        global $wpdb;
    
        $query = "
            SELECT post_id
            FROM $wpdb->postmeta
            WHERE meta_key = %s
            AND meta_value = %s
        ";
    
        $results = $wpdb->get_results($wpdb->prepare($query, $meta_key, $meta_value));
    
        if (empty($results)) {
            return false;
        }
    
        $postId = $results[0]->post_id;
        $postType = get_post_type($postId);
        return $postType;
    }

   
    public function dBargainApiStatus($key) {

        $status_arr = array(
            'OK' => 200,
            'CREATED' => 201,
            'ACCEPTED' => 202,
            'BAD REQUEST' => 400,
            'UNAUTHORIZED' => 401,
            'NOT FOUND' => 404
        );

        return $status_arr[$key];
    }

}

new DBargainCheckSubscriptionApi;