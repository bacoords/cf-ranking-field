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
?>

<?php echo $wrapper_before; ?>
	<?php echo $field_label; ?>
	<?php echo $field_before; ?>
		<ol class="cf-ranking-field-options">
			<?php foreach ( $options as $key => $option ) : ?>
				<li class="cf-ranking-field-option">
					<label for="">
						<input type="hidden" id="<?php echo esc_attr( $field_base_id . '_' . $key ); ?>" name="<?php echo esc_attr( $field_structure['name'] ); ?>[]" value="<?php echo esc_attr( $key ); ?>">
						<?php echo $option; ?>
					</label>
				</li>
			<?php endforeach; ?>
		</ol>
		<?php echo $field_caption; ?>
	<?php echo $field_after; ?>
<?php echo $wrapper_after; ?>
