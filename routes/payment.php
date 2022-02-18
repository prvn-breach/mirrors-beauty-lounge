<?php
Route::any('/get-payment-view', 'PaymentController@getPaymentView')->name('getPaymentView');
Route::any('/get-secure-3d', 'PaymentController@getSecureD')->name('getSecureD');

?>