<?php


namespace App\Http\Coinpayments;

use App\Http\Controllers\Controller;
use App\Http\Coinpayments\CoinpaymentsCurlRequest;

class CoinpaymentsAPI extends Controller
{
    private $private_key = '';
    private $public_key = '';
    private $request_handler;
    private $format = '';

    public function __construct($private_key, $public_key, $format)
    {

        // Set the default format to json if a value was not passed
        if (empty($format)) {
            $format = 'json';
        }

        // Set keys and format passed to class
        $this->private_key = $private_key;
        $this->public_key = $public_key;
        $this->format = $format;

        // Throw an error if the keys are not both passed
        try {
            if (empty($this->private_key) || empty($this->public_key)) {
                throw new Exception("Your private and public keys are not both set!");
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

        // Initiate a cURL request object
        $this->request_handler = new CoinpaymentsCurlRequest($this->private_key, $this->public_key, $format);
    }

    public function CreateSimpleTransaction($amount, $currency, $buyer_email, $buyer_name,$item_name,$item_number)
    {
        $fields = [
            'amount' => $amount,
            'currency1' => $currency,
            'currency2' => $currency,
            'buyer_email' => $buyer_email,
            'buyer_name' => $buyer_name,
            'item_name' => $item_name,
            'item_number' => $item_number
        ];
        return $this->request_handler->execute('create_transaction', $fields);
    }

    public function SearchAllTransaction($txid, $full)
    {
        $fields = [
            'txid' => $txid,
            'full' => $full
        ];

        return $this->request_handler->execute('get_tx_info_multi', $fields);
    }
}
