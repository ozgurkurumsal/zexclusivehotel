"use strict"; // Start of use strict

if ($('.single-form-box .checkin').length) {

	var fullmonth_array = $.datepicker._defaults.monthNames;	

	// trigger datepicker
	$('.single-form-box .checkin').datepicker();
	$('.single-form-box .checkout').datepicker();

	// trigger for div
	$('.single-form-box.checkin-box').on('click', function () {
		$('.single-form-box .checkin').datepicker('show');		
	});
	$('.single-form-box.checkout-box').on('click', function () {
		$('.single-form-box .checkout').datepicker('show');
	});

	// process data 
	

	$('.single-form-box .checkin').on('change', function () {
		var selectedMonthName = fullmonth_array[$(this).datepicker('getDate').getMonth()];

		var checkinDate = $('.single-form-box .checkin').val();
		var checkinDateSplited = checkinDate.split("/");	
		$('.single-form-box.checkin-box').find('span.count').html(checkinDateSplited[1]);
		$('.single-form-box.checkin-box').find('span.date').html(selectedMonthName + ' ' + checkinDateSplited[2]);	
	});

	$('.single-form-box .checkout').on('change', function () {		
		var selectedMonthName = fullmonth_array[$(this).datepicker('getDate').getMonth()];
		var checkoutDeate = $('.single-form-box .checkout').val();
		var checkoutDeateSplited = checkoutDeate.split("/");
		$('.single-form-box.checkout-box').find('span.count').html(checkoutDeateSplited[1]);
		$('.single-form-box.checkout-box').find('span.date').html(selectedMonthName + ' ' + checkoutDeateSplited[2]);
	});
	
	// defining values
	var guestNumber = 1;
	$('.single-form-box.guest-box .form-text span.count').text('0'+guestNumber);
	
	// updating on click
	$('.single-form-box.guest-box .angle i.fa-angle-up').on('click', function () {		

		guestNumber++;
		if (guestNumber < 10) {
			guestNumber = ('0'+guestNumber);
		}
		// through to html
		$('.single-form-box.guest-box .form-text span.count').text(guestNumber);
	});

	$('.single-form-box.guest-box .angle i.fa-angle-down').on('click', function () {
		if (guestNumber >= 1) {
	        guestNumber--;
	    }
	    if (guestNumber < 10 && guestNumber >= 1) {
			guestNumber = ('0'+guestNumber);
		}	    
		
		// through to html
		$('.single-form-box.guest-box .form-text span.count').text(guestNumber);
	});
	
}

if ($('.banner-booking-form .checkin').length) {

	// trigger datepicker
	$('.banner-booking-form .checkin-input').datepicker();
	$('.banner-booking-form .checkout-input').datepicker();

	// trigger for div
	$('.form-box.checkin .fa-calendar').on('click', function () {
		$('.banner-booking-form .checkin-input').datepicker('show');
	});
	$('.form-box.checkout .fa-calendar').on('click', function () {
		$('.banner-booking-form .checkout-input').datepicker('show');
	});
}

if ($('.booking-form-contact-style .checkin').length) {

	// trigger datepicker
	$('.booking-form-contact-style .checkin-input').datepicker();
	$('.booking-form-contact-style .checkout-input').datepicker();

	// trigger for div
	$('.form-box.checkin .fa-calendar').on('click', function () {
		$('.booking-form-contact-style .checkin-input').datepicker('show');
	});
	$('.form-box.checkout .fa-calendar').on('click', function () {
		$('.booking-form-contact-style .checkout-input').datepicker('show');
	});
}

if ($('.booking-page-form-wrapper .inline-datepicker').length) {

	// trigger datepicker
	$('.booking-page-form-wrapper .inline-datepicker').datepicker({
		inline: true
	});
}