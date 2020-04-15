<?php
/**
 * Charitable Donation Hooks.
 *
 * Action/filter hooks used for Charitable donations.
 *
 * @package   Charitable/Functions/Donations
 * @author    Eric Daams
 * @copyright Copyright (c) 2020, Studio 164a
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since     1.0.0
 * @version   1.6.34
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Start a donation.
 *
 * In default Charitable, this happens when the donation form is loaded. The
 * donation is not saved to the database yet; it just exists in the user's
 * session.
 *
 * @see Charitable_Donation_Processor::add_donation_to_session
 */
add_action( 'charitable_start_donation', array( 'Charitable_Donation_Processor', 'add_donation_to_session' ) );

/**
 * Make a donation.
 *
 * This is when a donation is saved to the database.
 *
 * @see Charitable_Donation_Processor::make_donation
 */
add_action( 'charitable_make_donation', array( 'Charitable_Donation_Processor', 'process_donation_form_submission' ) );

/**
 * AJAX hook to process a donation.
 *
 * @see Charitable_Donation_Processor::ajax_process_donation_form_submission
 */
add_action( 'wp_ajax_make_donation', array( 'Charitable_Donation_Processor', 'ajax_process_donation_form_submission' ) );
add_action( 'wp_ajax_nopriv_make_donation', array( 'Charitable_Donation_Processor', 'ajax_process_donation_form_submission' ) );

/**
 * Make a streamlined donation.
 *
 * This hook is fired when a form generated by Charitable_Donation_Amount_Form
 * is submitted. By default, it just includes the amount to be donated and
 * the campaign.
 *
 * @see Charitable_Donation_Processor::make_donation_streamlined
 */
add_action( 'charitable_make_donation_streamlined', array( 'Charitable_Donation_Processor', 'make_donation_streamlined' ) );

/**
 * Donation update.
 *
 * @see charitable_flush_campaigns_donation_cache
 */
add_action( 'save_post_' . Charitable::DONATION_POST_TYPE, 'charitable_flush_campaigns_donation_cache' );

/**
 * Sanitize donation meta.
 *
 * @see charitable_sanitize_donation_meta
 */
add_filter( 'charitable_sanitize_donation_meta', 'charitable_sanitize_donation_meta', 10, 2 );

/**
 * Delete a donation.
 *
 * @see Charitable_Campaign_Donations_DB::delete_donation()
 */
add_action( 'deleted_post', array( 'Charitable_Campaign_Donations_DB', 'delete_donation_records' ) );

/**
 * Post donation hook.
 *
 * @see charitable_is_after_donation()
 */
add_action( 'init', 'charitable_is_after_donation', 20 );

/**
 * Cancel donation.
 *
 * @see charitable_cancel_donation()
 */
add_action( 'template_redirect', 'charitable_cancel_donation' );

/**
 * Handle PayPal gateway payments.
 *
 * @see Charitable_Gateway_Paypal::validate_donation
 * @see Charitable_Gateway_Paypal::process_donation
 * @see Charitable_Gateway_Paypal::process_ipn
 * @see Charitable_Gateway_Paypal::process_web_accept
 */
add_filter( 'charitable_validate_donation_form_submission_gateway', array( 'Charitable_Gateway_Paypal', 'validate_donation' ), 10, 3 );
add_filter( 'charitable_process_donation_paypal', array( 'Charitable_Gateway_Paypal', 'process_donation' ), 10, 3 );
add_action( 'charitable_process_ipn_paypal', array( 'Charitable_Gateway_Paypal', 'process_ipn' ) );
add_action( 'charitable_paypal_web_accept', array( 'Charitable_Gateway_Paypal', 'process_web_accept' ), 10, 2 );

/**
 * Handle PayPal refund.
 *
 * @see Charitable_Gateway_Paypal::process_refund
 */
add_action( 'charitable_process_refund_paypal', array( 'Charitable_Gateway_Paypal', 'process_refund' ) );

/**
 * Load charitable-donation-form.js before donation form.
 *
 * @see charitable_load_donation_form_script()
 */
add_action( 'charitable_donation_form_before', 'charitable_load_donation_form_script' );

/**
 * Refresh a donation in cache after its status is updated.
 *
 * @see charitable_update_cached_donation()
 */
add_action( 'charitable_donation_status_changed', 'charitable_update_cached_donation' );
add_action( 'charitable_recurring_donation_status_changed', 'charitable_update_cached_donation' );