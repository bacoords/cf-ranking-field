<?php
/**
 * Config file for our ranking field
 *
 * @package           CFRankingField
 * @author            Brian Coords
 * @copyright         2020 Brian Coords
 * @license           GPL-2.0-or-later
 */

?>

<div class="caldera-config-group">
	<label for="{{_id}}_options">
		<?php esc_html_e( 'Options', 'cf-ranking-field' ); ?>
	</label>
	<div class="caldera-config-field">
		<textarea id="{{_id}}_options" class="block-input field-config" name="{{_name}}[options]">{{options}}</textarea>
	</div>
</div>
