
(function($) {

	CFRankingField = function( el ) {

		this.el = $(el);

		if ( ! this.el.hasClass( 'ui-sortable') ) {
			this.init();
		}

		return this;
	}

	// Init the sortable for this field.
	CFRankingField.prototype.init = function() {
		var self = this;

		self.el.sortable({
			placeholder: "cf-ranking-field-option-placeholder",
			update: function(){
				self.refreshSelects();
			}
		});

		self.addSelectWatcher();

	}

	// Refresh the select values to match position.
	CFRankingField.prototype.refreshSelects = function() {
		var self = this;

		self.el.find('.cf-ranking-field-option').each(function( index ){
			$(this).find('select').val( index + 1 );
		});
	}

	// If a select changes, update.
	CFRankingField.prototype.addSelectWatcher = function() {
		var self = this;

		self.el.find('.cf-ranking-field-option select').on( 'change', function(){
			var newPos = $(this).val(),
				option = $(this).parents('.cf-ranking-field-option');

			console.log( newPos, option );

			if ( 1 == newPos ) {
				// Insert in the front.
				option.prependTo( self.el );
			} else {
				// Insert after.
				var prevPosEl = self.el.find('.cf-ranking-field-option:nth-of-type(' + newPos + ')');
				option.insertAfter( prevPosEl );
			}

			// Refresh the element.
			self.el.sortable('refresh');
			self.refreshSelects();
			
		});
	}


	// An overall creator to init any fields.
	CFRankingFieldCreator = function() {
		$('.cf-ranking-field-options').each( function(){
			new CFRankingField( $(this) );
		});
	}

})( jQuery );
