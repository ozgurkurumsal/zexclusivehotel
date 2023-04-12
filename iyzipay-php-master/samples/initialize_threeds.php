<?php

require_once('config.php');

$name        = $_POST['rzvname'];
$roomId      = $_POST['roomId'];
$roomName    = $_POST['roomName'];
$mail        = $_POST['rzvemail'];
$adult       = $_POST['adult'];
$child       = $_POST['child'];
$phone       = $_POST['rzvphone'];
$message     = $_POST['rzvmessage'];
$startDate   = date("Y-m-d",strtotime($_POST['startDate']));
$endDate     = date("Y-m-d",strtotime($_POST['endDate']));

$CardNumber  = $_POST['rzvnumber'];
$ExpireMonth = $_POST['rzvmonth'];
$ExpireYear  = $_POST['rzvyear'];
$Cvc         = $_POST['rzvcvv'];
$PaidPrice   = $_POST['price'];
$Id          = $_POST['rezCode'];

$reservation = new Reservation();

$reservation->addReservation($roomId,$roomName,$Id,$name,'',$mail,$startDate,$endDate,$phone,'Oda Adı',$adult,$child,$PaidPrice,$message);

echo $startDate.'<br>';
echo $endDate;


#Buradan form ile gelen bilgileri alıp veritabanı sorguları yapacağız ve aşağıdaki bilgileri dolduracağız.

# create request class
$request = new \Iyzipay\Request\CreatePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($Id);
$request->setPrice($PaidPrice);
$request->setPaidPrice($PaidPrice);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setInstallment(1);
$request->setBasketId($Id);
$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setCallbackUrl("https://zexclusivehotel.com/iyzipay-php-master/samples/create_threeds_payment.php");

$paymentCard = new \Iyzipay\Model\PaymentCard();
$paymentCard->setCardHolderName("Özgür Özdemir");
$paymentCard->setCardNumber($CardNumber);
$paymentCard->setExpireMonth($ExpireMonth);
$paymentCard->setExpireYear($ExpireYear);
$paymentCard->setCvc($Cvc);
$paymentCard->setRegisterCard(0);
$request->setPaymentCard($paymentCard);

$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($Id);
$buyer->setName($name);
$buyer->setSurname($name);
$buyer->setGsmNumber($phone);
$buyer->setEmail($mail);
$buyer->setIdentityNumber("74300864791");
// $buyer->setLastLoginDate("2015-10-05 12:43:35");
// $buyer->setRegistrationDate("2013-04-21 15:12:09");
$buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
// $buyer->setIp("85.34.78.112");
$buyer->setCity("Istanbul");
$buyer->setCountry("Turkey");
// $buyer->setZipCode("34732");
$request->setBuyer($buyer);

// $shippingAddress = new \Iyzipay\Model\Address();
// $shippingAddress->setContactName("Jane Doe");
// $shippingAddress->setCity("Istanbul");
// $shippingAddress->setCountry("Turkey");
// $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
// $shippingAddress->setZipCode("34742");
// $request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("Jane Doe");
$billingAddress->setCity("Istanbul");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId($Id);
$firstBasketItem->setName("Honeymoon Suite");
$firstBasketItem->setCategory1("Oda");
// $firstBasketItem->setCategory2("Accessories");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice($PaidPrice);
$basketItems[0] = $firstBasketItem;

// print_r($basketItems);

$request->setBasketItems($basketItems);

# make request
$threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($request, Config::options());

# print result
 print_r($threedsInitialize);
//  echo $threedsInitialize->getErrorMessage();