<?php

namespace Stockraken\Response;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Response extends Controller
{
	// response status
	public static $status 	= true;

	// response message
	public static $message 	= 'Welcome stockraken';

	// response data
	public static $data 	= null;

	// response kode data
	public static $code		= 200;
    
    // Response standar stockraken
    public static function run($data = null, $code = null) {

    	self::$data = (null !== $data) ? $data : self::$data;
    	self::$code = (null !== $code) ? $code : self::$code;

    	$hasil	= array(
    		"status" 	=> self::$status,
    		"message"	=> self::$message,
    		"data"		=> self::$data
    	);

    	return response()->json($hasil, self::$code);

    }

    // Error response
    public static function errorValidator($data, $arraykah = false, $pemisah = ', ') {

        $message = array();

        if (is_array($data)) {
            
            foreach ($data as $x) {
                
                $message[] = $x;

            }

        }

        $pesan  = implode($pemisah, $message);

        $hasil  = array(
            "status"    => false,
            "message"   => ($arraykah === false) ? str_replace('.', '', $pesan) : 'Form validasi gagal!',
            "data"      => ($arraykah) ? $message : null
        );

        return response()->json($hasil, 200);

    }
}
