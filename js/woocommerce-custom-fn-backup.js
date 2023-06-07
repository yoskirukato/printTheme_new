// Включить радио кнопку изначально
jQuery(function() {
    var $radios = jQuery('input:radio[name="organisation"]');
    if($radios.is(':checked') === false) {
        $radios.filter('[value="private_person"]').prop('checked', true);
    }
	
	var $radios2 = jQuery('input:radio[name="organisations"]');
    if($radios2.is(':checked') === false) {
        $radios2.filter('[value="private_person"]').prop('checked', true);
    }
});

// Скрытие реквизитов
jQuery(document).ready(function($){
	 var xmlHttp = new XMLHttpRequest();
	 
	//$('.woocommerce-organisation-fields__field-wrapper').hide();

	$("input[name=organisations]:radio").click(function () {
		var type = $('input[name=organisations]:checked').val();

		var $radios = $('input:radio[name=organisation]');
		$radios.filter('[value="'+type+'"]').prop('checked', true).click().change();
	}); 
	
	$("input[name=organisation]:radio").click(function () {
		if ($('input[name=organisation]:checked').val() == "private_person") {
			$('.woocommerce-organisation-fields__field-wrapper').hide();
			$('.woocommerce-organisation-fields__field-wrapper').find('input').val('').change();
			if ($('#createaccount').length){
				$('#createaccount').prop('checked', false).change();
			} 
		} else if ($('input[name=organisation]:checked').val() == "company") {
			$('.woocommerce-organisation-fields__field-wrapper').show();
			
			if ($('#createaccount').length){
				$('#createaccount').prop('checked', true).change();
			} 
		}
	});
	
	$('.organisation-search').on('click', 'button', function(){
		var inn = $('.organisation-search').find('.organisation-search--input').val(),
			btn = $(this),
			url = 'https://ahunter.ru/site/fetch/company?output=json;query=';
		
		
		$('.woocommerce-organisation-fields__field-wrapper').find('.woocommerce-error').detach();
		if (inn.length) {
			btn.addClass('loader');
			$('.organisation-search .form-row').removeClass('validate-required woocommerce-invalid woocommerce-invalid-required-field');
			
			$.getJSON( url + inn, function(data){
				btn.removeClass('loader');
				if (data.company) {
					
					var company = data.company,
						company_inn = company.main.inn,
						company_kpp = company.main.kpp,
						company_name = company.main.short_name || company.main.full_name,
						company_address = company.address.canonic,
						company_type = ( company.individual ? 'ИП' : '' ) || company.opf.full;
						
						$('#organisation_inn').val(company_inn);
						$('#organisation_kpp').val(company_kpp);
						$('#organisation_name').val(company_name);
						$('#organisation_address').val(company_address);
						$('#organisation_type').val(company_type);
						
						$('.woocommerce-organisation-fields__field-wrapper').find('.validate-required').removeClass('woocommerce-invalid');
						
				}else{
					$('<ul class="woocommerce-error" role="alert"><li><strong>Информация не найдена</strong></li></ul>').insertAfter('.organisation-search');
				}
				
			});
			
		}else{
			$('.organisation-search .form-row').addClass('validate-required woocommerce-invalid woocommerce-invalid-required-field');
		}
	});
	
	$('.remove-product-img').on('click', function(){
		var self = $(this),
			product_id = self.data('product_id');
			
			xmlHttp.abort();
                    xmlHttp = $.ajax({
                        url: woocommerce_custom.url,
                        type: 'post',
                        dataType: 'json',
                        data: {
							action: 'delete_adv_photo',
							product_id: product_id
						},
                        beforeSend: function() {
                          $('.custom-image-wrap').find('.loader').removeClass('hidden');
                        },
                        complete: function() {
                         
                        },
                        success: function(res) {
							if (res.success){
								$('.custom-image-wrap').addClass('hidden');
								$('.custom-image-wrap').find('.loader').addClass('hidden');
								$('.custom-image-btns').find('.remove-product-img').addClass('hidden');
								$('.custom-image-btns').find('.photo-upload').text('Загрузить');
								alert(res.data.messages);
							} 
							
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
	});
	
	$('.show_more_desc').on('click', function(e){
		e.preventDefault();
		$(this).parent().detach();
		$('.description-inner').show();
	});
	$('.photo-upload').on('click', function() {
            var self = $(this),
				product_id = self.data('product_id');

            $('#form-upload').remove();

            $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" accept=".jpeg, .jpg, .png"  /><input type="hidden" name="action" value="upload_adv_photo"><input type="hidden" name="product_id" value="'+product_id+'"></form>');

            $('#form-upload input[name=\'file\']').trigger('click');

            if (typeof timer != 'undefined') {
                clearInterval(timer);
            }

            timer = setInterval(function() {
                if ($('#form-upload input[name=\'file\']').val() != '') {
                    clearInterval(timer);

                    xmlHttp.abort();
                    xmlHttp = $.ajax({
                        url: woocommerce_custom.url,
                        type: 'post',
                        dataType: 'json',
                        data: new FormData($('#form-upload')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                           $('.custom-image-wrap').removeClass('hidden');
						   $('.custom-image-wrap').find('.loader').removeClass('hidden');
                        },
                        complete: function() {
                          $('.custom-image-wrap').find('.loader').addClass('hidden');
                          $('.custom-image-btns').find('.remove-product-img').removeClass('hidden');
						  self.text('Изменить');
                        },
                        success: function(res) {
                            var messages = res.data.messages,
                                image = res.data.image;

                            $('.text-danger').remove();

                            if (image) {
								alert(messages);
								
                                $('.adv_photo').attr('src', image).removeClass('hidden');
                            }

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                }
            }, 500);
        });
});