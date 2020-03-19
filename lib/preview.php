<?php
/**
 * Preview file for our ranking field
 *
 * @package           CFRankingField
 * @author            Brian Coords
 * @copyright         2020 Brian Coords
 * @license           GPL-2.0-or-later
 */
?>

<div class="preview-caldera-config-group cf-ranking-preview">

	{{#unless hide_label}}<lable class="control-label">{{label}}{{#if required}} <span style="color:#ff0000;">*</span>{{/if}}</lable>{{/unless}}
	<div class="preview-caldera-config-field">
		{{#each config/options_array}}
			<li>{{option}}</li>
		{{/each}}
		<span class="help-block">{{caption}}</span>
	</div>

</div>
