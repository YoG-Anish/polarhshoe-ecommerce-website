<?php
/**
 * Product quantity inputs
 */

defined( 'ABSPATH' ) || exit;

/* 
 * 1. FIX: Map the variables from the $args array. 
 * This removes the "Undefined variable" errors in your editor.
 */
$input_id    = isset( $args['input_id'] ) ? $args['input_id'] : '';
$input_name  = isset( $args['input_name'] ) ? $args['input_name'] : '';
$input_value = isset( $args['input_value'] ) ? $args['input_value'] : '';
$classes     = isset( $args['classes'] ) ? $args['classes'] : array();
$type        = isset( $args['type'] ) ? $args['type'] : 'number';
$min_value   = isset( $args['min_value'] ) ? $args['min_value'] : 0;
$max_value   = isset( $args['max_value'] ) ? $args['max_value'] : '';
$step        = isset( $args['step'] ) ? $args['step'] : 1;
$readonly    = isset( $args['readonly'] ) ? $args['readonly'] : false;
$placeholder = isset( $args['placeholder'] ) ? $args['placeholder'] : '';
$autocomplete = isset( $args['autocomplete'] ) ? $args['autocomplete'] : 'on';
$inputmode   = isset( $args['inputmode'] ) ? $args['inputmode'] : 'numeric';

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );
?>

<div class="quantity">
	<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
	
    <!-- FIGMA DESIGN: MINUS BUTTON -->
    <button type="button" class="quantity-button quantity-down">-</button>

	<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
	
    <input
		type="<?php echo esc_attr( $type ); ?>"
		<?php echo $readonly ? 'readonly="readonly"' : ''; ?>
		id="<?php echo esc_attr( $input_id ); ?>"
		class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?> qty"
		name="<?php echo esc_attr( $input_name ); ?>"
		value="<?php echo esc_attr( $input_value ); ?>"
		aria-label="<?php esc_attr_e( 'Product quantity', 'woocommerce' ); ?>"
		size="4"
		min="<?php echo esc_attr( $min_value ); ?>"
		<?php if ( 0 < $max_value ) : ?>
			max="<?php echo esc_attr( $max_value ); ?>"
		<?php endif; ?>
		<?php if ( ! $readonly ) : ?>
			step="<?php echo esc_attr( $step ); ?>"
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
			autocomplete="<?php echo esc_attr( $autocomplete ); ?>"
		<?php endif; ?>
	/>

    <!-- FIGMA DESIGN: PLUS BUTTON -->
    <button type="button" class="quantity-button quantity-up">+</button>

	<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
</div>