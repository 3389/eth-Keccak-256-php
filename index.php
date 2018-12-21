<?php
//因为项目要求仅考虑以太坊公钥转地址功能，其余功能已经实现,下面两个文件的结果都为：0x001d3f1ef827552ae1114027bd3ecf1f086ba0f9

//第一个Keccak256php文件的调用
require 'Keccak.php';
$prototype = '6e145ccef1033dea239875dd00dfb4fee6e3348b84985c92f103444683bae07b83b5c38e5e2b0c8529d7fa3f64d46daa1ece2d9ac14cab9477d042c84c32ccd0';
//$pubk =  mb_substr($prototype, -128, 128, 'utf-8'); //remove 04,公钥如果前两位是04就去除
$keccak = new keccak1();
$prototype =$keccak->hash(pack("H*",$prototype), 256);
$addres1 = '0x'.mb_substr($prototype, -40, 40, 'utf-8');
var_dump($addres1);


//第二个Keccak256php文件的调用，第二个文件代码量少，方便移植
require_once 'Keccak256.php';
use Keccak\Keccak256;
$kec = new Keccak256();
//$bitcoinECDSA->setPrivateKey($k);
//$pubkey = substr($bitcoinECDSA->getUncompressedPubKey(),2);
$pubkey = '6e145ccef1033dea239875dd00dfb4fee6e3348b84985c92f103444683bae07b83b5c38e5e2b0c8529d7fa3f64d46daa1ece2d9ac14cab9477d042c84c32ccd0';
$address = substr($kec->hash(pack("H*",$pubkey), 256), -40);
echo "   ETH/ERC20 Address: 0x" . $address . PHP_EOL;

?>