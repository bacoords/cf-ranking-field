<?php
/**
 * Field file for our ranking field
 *
 * @package           CFRankingField
 * @author            Brian Coords
 * @copyright         2020 Brian Coords
 * @license           GPL-2.0-or-later
 */

$options = ! empty( $field['config']['options'] ) ? $field['config']['options'] : '';
$options = cf_ranking_field_create_options_array( $options );

// Grab base ID.
$field_base_id = Caldera_Forms_Field_Util::get_base_id( $field, null, $form );

$j = 1;
$total_options = count( $options );
?>

<?php echo $wrapper_before; ?>
	<?php echo $field_label; ?>
	<?php echo $field_before; ?>
		<div id="<?php echo esc_attr( 'cf-ranking-field-options-' . $field_base_id ); ?>" class="cf-ranking-field-options">
			<?php foreach ( $options as $key => $option ) : ?>
				<div class="cf-ranking-field-option">
					<select name="<?php echo esc_attr( $field_base_id . '_' . $key . '_' . 'int' ); ?>" id="<?php echo esc_attr( $field_base_id . '_' . $key . '_' . 'int' ); ?>" >
						<?php for ( $i = 1; $i <= $total_options; $i++ ) { ?>
							<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $i, $j ); ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
					<label for="">
						<input type="hidden" id="<?php echo esc_attr( $field_base_id . '_' . $key ); ?>" name="<?php echo esc_attr( $field_structure['name'] ); ?>[]" value="<?php echo esc_attr( $key ); ?>">
						<?php echo $option; ?>
					</label>
				</div>
				<?php $j++; ?>
			<?php endforeach; ?>
		</div>
		<?php echo $field_caption; ?>
	<?php echo $field_after; ?>
<?php echo $wrapper_after; ?>


<?php ob_start(); ?>

	<script>

		(function($) {

			$(document).ready(function($){

				$( document ).on( 'cf.form.init', function( e, obj ){

					new CFRankingFieldCreator();

				});

			});

		})( jQuery );

	</script>

	<?php

	$script_template = ob_get_clean();

Caldera_Forms_Render_Util::add_inline_data( $script_template, $form );
