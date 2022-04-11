"use strict";

// Class definition
let wizardRadioGlobalCount = 0;

var KTWizard1 = function () {
	// Base elements
	var wizardEl;
	var formEl;
	var validator;
	var wizard;
	
	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		wizard = new KTWizard('kt_wizard_v1', {
			startStep: 1
		});

		// Validation before going to next page
		wizard.on('beforeNext', function(wizardObj) {
			// if (wizardObj.currentStep === 2) {
			// 	if ($('#judul-laporan').val() == '' || $('#file-ms-word').val() == '' || $('#file-pdf').val() == '') {
			// 		wizardObj.stop();
			// 	}
			// }

			var iz_checked = true;
			let countChecked = 0;
			$('.rd-check').each(function(){
				iz_checked = iz_checked && $(this).is(':checked');
				if ($(this).is(':checked') == true) {
					countChecked++;
				}
			});

			if (wizardObj.currentStep === 3 && countChecked < wizardRadioGlobalCount) {
				wizardObj.stop();
			}

			// for (let k = 0; k < wizardRadioGlobalCount; k++) {
			// 	console.log('this.value radio:>> ', $('input[type=radio]').val());
			// }

			let dataRadioSangatRendah = 0;
			let dataRadioRendah = 0;
			let dataRadioTinggi = 0;
			let dataRadioSangatTinggi = 0;
			let dataRadioTotalScore = 0;

			$(':radio:checked').each(function(){
				console.log('$(this) :>> ', $(this));
				console.log('$(this).val() :>> ', $(this).val());
				// console.log('$(this).val() :>> ', $(this).nextSibling.data);
				console.log('$(this).val() :>> ', $(this).attr('dataRadioName'));

				dataRadioTotalScore += parseInt($(this).val());
				if ($(this).attr('dataRadioName') == 'sangat_rendah') {
					dataRadioSangatRendah++;
				} else if ($(this).attr('dataRadioName') == 'rendah') {
					dataRadioRendah++;
				} else if ($(this).attr('dataRadioName') == 'tinggi') {
					dataRadioTinggi++;
				} else {
					dataRadioSangatTinggi++;
				}
			});

			console.log('dataRadioSangatRendah :>> ', dataRadioSangatRendah);
			console.log('dataRadioRendah :>> ', dataRadioRendah);
			console.log('dataRadioTinggi :>> ', dataRadioTinggi);
			console.log('dataRadioSangatTinggi :>> ', dataRadioSangatTinggi);
			
			console.log('dataRadioTotalScore :>> ', dataRadioTotalScore);

			$('#dr_sangat_rendah').val(dataRadioSangatRendah);
			$('#dr_rendah').val(dataRadioRendah);
			$('#dr_tinggi').val(dataRadioTinggi);
			$('#dr_sangat_tinggi').val(dataRadioSangatTinggi);

			$('#dr_total_score').val(dataRadioTotalScore);

			$('#jk_sangat_rendah').text('(' + dataRadioSangatRendah + ')');
			$('#jk_rendah').text('(' + dataRadioRendah + ')');
			$('#jk_tinggi').text('(' + dataRadioTinggi + ')');
			$('#jk_sangat_tinggi').text('(' + dataRadioSangatTinggi + ')');
			
		})

		// Change event
		wizard.on('change', function(wizard) {
			if (wizard.currentStep === 5) {
				$('#btn-submit-dokumen-review').show();
			} else {
				$('#btn-submit-dokumen-review').hide();
			}

			if ($('#select-kegiatan').val() != null) {
				
				console.log('object :>> ', $('#select-kegiatan').val());
			}
			// KTUtil.scrollTop();	
		});
	}	
	$('#btn-submit-dokumen-review').hide();
	$('#dokumen-btn-selanjutnya').hide();
	var initValidation = function() {
		validator = formEl.validate({
			// Validate only visible fields
			ignore: ":hidden",

			// Validation rules
			rules: {	
				//= Step 1
				address1: {
					required: true 
				},
				postcode: {
					required: true
				},	   
				city: {
					required: true
				},	 
				state: {
					required: true
				},	 
				country: {
					required: true
				},	 

				//= Step 2
				package: {
					required: true
				},
				weight: {
					required: true
				},	
				width: {
					required: true
				},
				height: {
					required: true
				},	
				length: {
					required: true
				},			   

				//= Step 3
				delivery: {
					required: true
				},
				packaging: {
					required: true
				},	
				preferreddelivery: {
					required: true
				},	

				//= Step 4
				locaddress1: {
					required: true 
				},
				locpostcode: {
					required: true
				},	   
				loccity: {
					required: true
				},	 
				locstate: {
					required: true
				},	 
				loccountry: {
					required: true
				},	
			},
			
			// Display error  
			invalidHandler: function(event, validator) {	 
				KTUtil.scrollTop();

				swal.fire({
					"title": "", 
					"text": "There are some errors in your submission. Please correct them.", 
					"type": "error",
					"confirmButtonClass": "btn btn-secondary"
				});
			},

			// Submit valid form
			submitHandler: function (form) {
				
			}
		});   
	}

	var initSubmit = function() {
		var btn = formEl.find('[data-ktwizard-type="action-submit"]');

		btn.on('click', function(e) {
			e.preventDefault();

			if (validator.form()) {
				// See: src\js\framework\base\app.js
				KTApp.progress(btn);
				//KTApp.block(formEl);

				// See: http://malsup.com/jquery/form/#ajaxSubmit
				formEl.ajaxSubmit({
					success: function() {
						KTApp.unprogress(btn);
						//KTApp.unblock(formEl);

						swal.fire({
							"title": "", 
							"text": "The application has been successfully submitted!", 
							"type": "success",
							"confirmButtonClass": "btn btn-secondary"
						});
					}
				});
			}
		});
	}

	return {
		// public functions
		init: function() {
			wizardEl = KTUtil.get('kt_wizard_v1');
			formEl = $('#kt_form');

			initWizard(); 
			initValidation();
			initSubmit();
		}
	};
}();

jQuery(document).ready(function() {	
	KTWizard1.init();
});