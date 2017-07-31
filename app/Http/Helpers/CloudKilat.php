<?php

namespace App\Http\Helpers;

class CloudKilat
{
	public $secretKey;
	public $accessKey;
	public $bucket;

	public $_s3;

	public function __construct()
	{
		$this->accessKey  = env('CK_ACCESS_KEY');
		$this->secretKey  = env('CK_SECRET_KEY');
		$this->bucket 	  = env('CK_BUCKET');
		$this->_s3 		  = new S3($this->accessKey, $this->secretKey);
	}

	public function getSignature($string)
	{
		return $this->_s3->__getSignature($string);
	}

	public function getPolicy($folder, $filename)
	{
		$path 			= $folder.$filename;
		return $this->_s3->getAccessControlPolicy( $this->bucket, $path );
	}

	public function store($pathFile, $folder, $filename)
	{
		$path 					=	$folder.$filename;
		try{
			$this->_s3->putObject( S3::inputFile( $pathFile, false ), $this->bucket, $path, S3::ACL_PUBLIC_READ );

		} catch(\Excetion $e)
		{
			return false;
		}

		return [
			'status' => 1,
			'url'	 => S3_DOMAIN.$path
		];
	}

	public function info($folder, $filename)
	{
		$path 					= $folder.$filename;
		try{
			$info = $this->_s3->getObjectInfo( $this->bucket, $path );
		}  catch(\Exception $e)
		{
			return false;
		}

		return $info;
	}

	public function delete($folder, $filename)
	{
		$path 					=	$folder.$filename;
		try{
			$this->_s3->deleteObject( $this->bucket, $path );
		} catch(\Exception $e)
		{
			return false;
		}

		return true;
	}

	public function list()
	{
		try{
			return $this->_s3->getBucket( $this->bucket );
		} catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

}
