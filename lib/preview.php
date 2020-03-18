<?php
/**
 * Preview file for our ranking field
 *
 * @package           CFRankingField
 * @author            Brian Coords
 * @copyright         2020 Brian Coords
 * @license           GPL-2.0-or-later
 */
$options       = ! empty( $field['config']['options'] ) ? $field['config']['options'] : '';
$options       = explode(PHP_EOL, $options);
?>

<div class="preview-caldera-config-group cf-ranking-preview">

	{{#unless hide_label}}<lable class="control-label">{{label}}{{#if required}} <span style="color:#ff0000;">*</span>{{/if}}</lable>{{/unless}}
	<div class="preview-caldera-config-field">
		{{#if config/options}} {{config/options}}{{else}} {{/if}} 
		<span class="help-block">{{caption}}</span>
	</div>
	
</div>
