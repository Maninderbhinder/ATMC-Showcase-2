jQuery(document).ready(function($) { 

	function rara_refresh_repeater_values(){
		$(".rara-repeater-field-control-wrap").each(function(){
			
			var values = []; 
			var $this = $(this);
			
			$this.find(".rara-repeater-field-control").each(function(){
			var valueToPush = {};	

			$(this).find('[data-name]').each(function(){
				var dataName = $(this).attr('data-name');
				var dataValue = $(this).val();
				valueToPush[dataName] = dataValue;
			});

			values.push(valueToPush);
			});

			$this.next('.rara-repeater-collector').val(JSON.stringify(values)).trigger('change');
		});
	}

    $('#customize-theme-controls').on('click','.rara-repeater-field-title',function(){
        $(this).next().slideToggle();
        $(this).closest('.rara-repeater-field-control').toggleClass('expanded');
    });

    $('#customize-theme-controls').on('click', '.rara-repeater-field-close', function(){
    	$(this).closest('.rara-repeater-fields').slideUp();;
    	$(this).closest('.rara-repeater-field-control').toggleClass('expanded');
    });

    $("body").on("click",'.rara-add-control-field', function(){
        
		var $this = $(this).parent();
		if(typeof $this != 'undefined') {

            var field = $this.find(".rara-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){
                
                field.find("input[type='text'][data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });

                field.find("textarea[data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });

                field.find("select[data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);                    
                });

                field.find(".radio-labels input[type='radio']").each(function(){
                	var defaultValue = $(this).closest('.radio-labels').next('input[data-name]').attr('data-default');
                	$(this).closest('.radio-labels').next('input[data-name]').val(defaultValue);
                	
                	if($(this).val() == defaultValue){
                		$(this).prop('checked',true);
                	}else{
                		$(this).prop('checked',false);
                	}
                });

                field.find(".selector-labels label").each(function(){
                	var defaultValue = $(this).closest('.selector-labels').next('input[data-name]').attr('data-default');
                	var dataVal = $(this).attr('data-val');
                	$(this).closest('.selector-labels').next('input[data-name]').val(defaultValue);

                	if(defaultValue == dataVal){
                		$(this).addClass('selector-selected');
                	}else{
                		$(this).removeClass('selector-selected');
                	}
                });

				field.find('.range-input').each(function(){
					var $dis = $(this);
                	$dis.removeClass('ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all').empty();
					var defaultValue = parseFloat($dis.attr('data-defaultvalue'));
					$dis.siblings(".range-input-selector").val(defaultValue);
					$dis.slider({
						range: "min",
						value: parseFloat($dis.attr('data-defaultvalue')),
						min: parseFloat($dis.attr('data-min')),
						max: parseFloat($dis.attr('data-max')),
						step: parseFloat($dis.attr('data-step')),
						slide: function( event, ui ) {
							$dis.siblings(".range-input-selector").val(ui.value );
							rara_refresh_repeater_values();
						}
					});
				});

				field.find('.onoffswitch').each(function(){
					var defaultValue = $(this).next('input[data-name]').attr('data-default');
					$(this).next('input[data-name]').val(defaultValue);
					if(defaultValue == 'on'){
						$(this).addClass('switch-on');
					}else{
						$(this).removeClass('switch-on');
					}
				});

				field.find('.rara-color-picker').each(function(){
					$(this).wpColorPicker({
						change: function(event, ui){
							setTimeout(function(){
							rara_refresh_repeater_values();
							}, 100);
						}
					}).parents('.rara-type-colorpicker').find('.wp-color-result').first().remove();
				});

				field.find(".attachment-media-view").each(function(){
					var defaultValue = $(this).find('input[data-name]').attr('data-default');
					$(this).find('input[data-name]').val(defaultValue);
					if(defaultValue){
						$(this).find(".thumbnail-image").html('<img src="'+defaultValue+'"/>').prev('.placeholder').addClass('hidden');
					}else{
						$(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');	
					}
				});
                
                field.find(".rara-icon-list").each(function(){
					var defaultValue = $(this).next('input[data-name]').attr('data-default');
					$(this).next('input[data-name]').val(defaultValue);
					$(this).prev('.rara-selected-icon').children('i').attr('class','').addClass(defaultValue);
					
					$(this).find('li').each(function(){
						var icon_class = $(this).find('i').attr('class');
						if(defaultValue == icon_class ){
							$(this).addClass('icon-active');
						}else{
							$(this).removeClass('icon-active');
						}
					});
				});

				field.find(".rara-multi-category-list").each(function(){
                	var defaultValue = $(this).next('input[data-name]').attr('data-default');
                	$(this).next('input[data-name]').val(defaultValue);
                	
                	$(this).find('input[type="checkbox"]').each(function(){
	                	if($(this).val() == defaultValue){
	                		$(this).prop('checked',true);
	                	}else{
	                		$(this).prop('checked',false);
	                	}
                	});
                });

				field.find('.rara-fields').show();

				$this.find('.rara-repeater-field-control-wrap').append(field);
                
                $('.metro-magazine-pro-catblock2').hide("fast");//Added By Sudin
                
                field.addClass('expanded').find('.rara-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                rara_refresh_repeater_values();
            }

		}
		return false;
	 });
	
	$("#customize-theme-controls").on("click", ".rara-repeater-field-remove",function(){
		if( typeof	$(this).parent() != 'undefined'){
			$(this).closest('.rara-repeater-field-control').slideUp('normal', function(){
				$(this).remove();
				rara_refresh_repeater_values();
			});
			
		}
		return false;
	});

	$("#customize-theme-controls").on('keyup change', '[data-name]',function(){
		 rara_refresh_repeater_values();
		 return false;
	});

	$("#customize-theme-controls").on('change', 'input[type="checkbox"][data-name]',function(){
		if($(this).is(":checked")){
			$(this).val('yes');
		}else{
			$(this).val('no');
		}
		rara_refresh_repeater_values();
		return false;
	});

	/*Drag and drop to change order*/
	$(".rara-repeater-field-control-wrap").sortable({
		orientation: "vertical",
		update: function( event, ui ) {
			rara_refresh_repeater_values();
		}
	});

	// Set all variables to be used in scope
	var frame;

	// ADD IMAGE LINK
	$('.customize-control-rara-repeater').on( 'click', '.rara-upload-button', function( event ){
	event.preventDefault();

	var imgContainer = $(this).closest('.rara-fields-wrap').find( '.thumbnail-image'),
	placeholder = $(this).closest('.rara-fields-wrap').find( '.placeholder'),
	imgIdInput = $(this).siblings('.upload-id');

	// Create a new media frame
	frame = wp.media({
		title: 'Select or Upload Image',
		button: {
		text: 'Use Image'
		},
		multiple: false  // Set to true to allow multiple files to be selected
	});

	// When an image is selected in the media frame...
	frame.on( 'select', function() {

	// Get media attachment details from the frame state
	var attachment = frame.state().get('selection').first().toJSON();

	// Send the attachment URL to our custom image input field.
	imgContainer.html( '<img src="'+attachment.url+'" style="max-width:100%;"/>' );
	placeholder.addClass('hidden');

	// Send the attachment id to our hidden input
	imgIdInput.val( attachment.url ).trigger('change');

	});

	// Finally, open the modal on click
	frame.open();
	});


	// DELETE IMAGE LINK
	$('.customize-control-rara-repeater').on( 'click', '.rara-delete-button', function( event ){

	event.preventDefault();
	var imgContainer = $(this).closest('.rara-fields-wrap').find( '.thumbnail-image'),
	placeholder = $(this).closest('.rara-fields-wrap').find( '.placeholder'),
	imgIdInput = $(this).siblings('.upload-id');

	// Clear out the preview image
	imgContainer.find('img').remove();
	placeholder.removeClass('hidden');

	// Delete the image id from the hidden input
	imgIdInput.val( '' ).trigger('change');

	});

	$('.rara-color-picker').wpColorPicker({
		change: function(event, ui){
			setTimeout(function(){
			rara_refresh_repeater_values()
		}, 100);
		}
	});

	$('body').on('click','.selector-labels label', function(){
		var $this = $(this);
		var value = $this.attr('data-val');
		$this.siblings().removeClass('selector-selected');
		$this.addClass('selector-selected');
		$this.closest('.selector-labels').next('input').val(value).trigger('change');
	});

	$('body').on('change','.rara-type-radio input[type="radio"]', function(){
		var $this = $(this);
		$this.parent('label').siblings('label').find('input[type="radio"]').prop('checked',false);
		var value = $this.closest('.radio-labels').find('input[type="radio"]:checked').val();
		$this.closest('.radio-labels').next('input').val(value).trigger('change');
	});

	$('body').on('click', '.onoffswitch', function(){
		var $this = $(this);
		if($this.hasClass('switch-on')){
			$(this).removeClass('switch-on');
			$this.next('input').val('off').trigger('change')
		}else{
			$(this).addClass('switch-on');
			$this.next('input').val('on').trigger('change')
		}
	});

	$('.range-input').each(function(){
		var $this = $(this);
		$this.slider({
			range: "min",
			value: parseFloat($this.attr('data-value')),
			min: parseFloat($this.attr('data-min')),
			max: parseFloat($this.attr('data-max')),
			step: parseFloat($this.attr('data-step')),
			slide: function( event, ui ) {
				$this.siblings(".range-input-selector").val(ui.value );
				rara_refresh_repeater_values();
			}
		});
	});

	$('body').on('click', '.rara-icon-list li', function(){
		var icon_class = $(this).find('i').attr('class');
		$(this).addClass('icon-active').siblings().removeClass('icon-active');
		$(this).parent('.rara-icon-list').prev('.rara-selected-icon').children('i').attr('class','').addClass(icon_class);
		$(this).parent('.rara-icon-list').next('input').val(icon_class).trigger('change');
		rara_refresh_repeater_values();
	});

	$('body').on('click', '.rara-selected-icon', function(){
		$(this).next().slideToggle();
	});

	//MultiCheck box Control JS
    $( 'body' ).on( 'change', '.rara-type-multicategory input[type="checkbox"]' , function() {

        var checkbox_values = $( this ).parents( '.rara-type-multicategory' ).find( 'input[type="checkbox"]:checked' ).map(function(){
            return $( this ).val();
        }).get().join( ',' );

        $( this ).parents( '.rara-type-multicategory' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        rara_refresh_repeater_values();
    });
    
});