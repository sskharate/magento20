<?php

namespace Smart2Pay\GlobalPay\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\TestFramework\Event\Magento;
use Smart2Pay\GlobalPay\Model\Smart2Pay;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
    {
        $installer = $setup;

        $installer->startSetup();

        $insert_data = [

        [1, 'Bank Transfer', 'banktransfer', 'Bank Transfer description', 'bank_transfer_logo_v6.png', 1, 1],
        [2, 'iDEAL', 'ideal', 'iDEAL description', 'ideal.png', 1, 1],
        [3, 'MrCash', 'mrcash', 'MrCash description', 'mrcash.png', 1, 1],
        [4, 'Giropay', 'giropay', 'Giropay description', 'giropay.png', 1, 1],
        [5, 'EPS', 'eps', 'EPS description', 'eps-e-payment-standard.png', 1, 1],
        [8, 'UseMyFunds', 'umb', 'UseMyFunds description', 'umb.png', 1, 1],
        [9, 'Sofort Banking', 'dp24', 'Sofort Banking description', 'dp24_sofort.png', 0, 1],
        [12, 'Przelewy24', 'p24', 'Przelewy24 description', 'p24.png', 1, 1],
        [13, 'OneCard', 'onecard', 'OneCard description', 'onecard.png', 1, 1],
        [14, 'CashU', 'cashu', 'CashU description', 'cashu.png', 1, 1],
        [18, 'POLi', 'poli', 'POLi description', 'poli.png', 0, 1],
        [19, 'DineroMail', 'dineromail', 'DineroMail description', 'dineromail.png', 0, 1],
        [20, 'Multibanco SIBS', 'sibs', 'Multibanco SIBS description', 'sibs_mb.png', 1, 1],
        [22, 'Moneta Wallet', 'moneta', 'Moneta Wallet description', 'moneta.png', 1, 1],
        [23, 'Paysera', 'paysera', 'Paysera description', 'paysera.gif', 1, 1],
        [24, 'Alipay', 'alipay', 'Alipay description', 'alipay.png', 1, 1],
        [25, 'Abaqoos', 'abaqoos', 'Abaqoos description', 'abaqoos.png', 1, 1],
        [27, 'ePlatby for eKonto', 'ebanka', 'eBanka description', 'eKonto.png', 1, 1],
        [28, 'Ukash', 'ukash', 'Ukash description', 'ukash.png', 1, 1],
        [29, 'Trustly', 'trustly', 'Trustly description', 'trustly.png', 1, 1],
        [32, 'Debito Banco do Brasil', 'debitobdb', 'Debito Banco do Brasil description', 'banco_do_brasil.gif', 1, 1],
        [33, 'CuentaDigital', 'cuentadigital', 'CuentaDigital description', 'cuentadigital.png', 1, 0],
        [34, 'CardsBrazil', 'cardsbrl', 'CardsBrazil description', 'cards_brl.gif', 0, 1],
        [35, 'PaysBuy', 'paysbuy', 'PaysBuy description', 'paysbuy.png', 0, 1],
        [36, 'Mazooma', 'mazooma', 'Mazooma description', 'mazooma.png', 0, 0],
        [37, 'eNETS Debit', 'enets', 'eNETS Debit description', 'enets.png', 1, 1],
        [40, 'Paysafecard', 'paysafecard', 'Paysafecard description', 'paysafecard.png', 1, 1],
        [42, 'PayPal', 'paypal', 'PayPal description', 'paypal.png', 1, 0],
        [43, 'PagTotal', 'pagtotal', 'PagTotal description', 'pagtotal.png', 0, 0],
        [44, 'Payeasy', 'payeasy', 'Payeasy description', 'payeasy.png', 1, 1],
        [46, 'MercadoPago', 'mercadopago', 'MercadoPago description', 'mercadopago.png', 0, 1],
        [47, 'Mozca', 'mozca', 'Mozca description', 'mozca.png', 0, 0],
        [49, 'ToditoCash', 'toditocash', 'ToditoCash description', 'todito_cash.png', 1, 1],
        [58, 'PayWithMyBank', 'pwmb', 'PayWithMyBank description', 'pwmb.png', 1, 1],
        [62, 'Tenpay', 'tenpay', 'Tenpay description', 'tenpay.png', 1, 1],
        [63, 'TrustPay', 'trustpay', 'TrustPay description', 'trustpay.png', 1, 1],
        [64, 'MangirKart', 'mangirkart', 'MangirKart description', 'mangir_cart.gif', 1, 1],
        [65, 'Finish Banks', 'paytrail', 'Paytrail description', 'paytrail.gif', 1, 1],
        [66, 'MTCPay', 'mtcpay', 'MTCPay description', 'mtcpay.png', 1, 1],
        [67, 'DragonPay', 'dragonpay', 'DragonPay description', 'dragon_pay.png', 1, 1],
        [69, 'Credit Card', 's2pcards', 'S2PCards Description', 's2p_cards.gif', 0, 1],
        [72, 'PagoEfectivo', 'pagoefectivo', 'PagoEfectivo Description', 'pago_efectivo.gif', 1, 1],
        [73, 'MyBank', 'mybank', 'MyBank Description', 'mybank.png', 1, 1],
        [74, 'Yandex.Money', 'yandexmoney', 'YandexMoney description', 'yandex_money.png', 1, 1],
        [75, 'Klarna Invoice', 'klarnainvoice', 'KlarnaInvoice description', 'klarna.gif', 1, 1],
        [76, 'Bitcoin', 'bitcoin', 'Bitcoin description', 'bitcoin.png', 1, 1],
        [77, 'VoguePay', 'voguepay', 'VoguePay Description', 'voguepay.gif', 1, 1],
        [78, 'Skrill', 'skrill', 'Skrill Description', 'skrill.jpg', 1, 1],
        [79, 'Pay by mobile', 'paybymobile', 'Pay by mobile Description', 'pay_by_mobile_v1.gif', 1, 1],
        [81, 'WebMoney Transfer', 'webmoneytransfer', 'WebMoney Transfer Description', 'webmoney.gif', 1, 1],
        [1000, 'Boleto', 'paganet', 'Boleto description', 'boleto_bancario.png', 1, 1],
        [1001, 'Debito', 'paganet', 'Debito description', 'debito_bradesco.png', 1, 0],
        [1002, 'Transferencia', 'paganet', 'Transferencia description', 'bradesco_transferencia.png', 1, 1],
        [1003, 'QIWI Wallet', 'qiwi', 'QIWI Wallet description', 'qiwi_wallet.png', 1, 1],
        [1004, 'Beeline', 'qiwi', 'Beeline description', 'beeline.png', 1, 1],
        [1005, 'Megafon', 'qiwi', 'Megafon description', 'megafon.png', 1, 1],
        [1006, 'MTS', 'qiwi', 'MTS description', 'mts.gif', 1, 1],
        [1007, 'WebMoney', 'moneta', 'WebMoney description', 'webmoney.png', 1, 0],
        [1008, 'Yandex', 'moneta', 'Yandex description', 'yandex.png', 1, 0],
        [1009, 'Alliance Online', 'asiapay', 'Alliance Online description', 'alliance_online.gif', 1, 0],
        [1010, 'AmBank', 'asiapay', 'AmBank description', 'ambank_group.png', 1, 1],
        [1011, 'CIMB Clicks', 'asiapay', 'CIMB Clicks description', 'cimb_clicks.png', 1, 1],
        [1012, 'FPX', 'asiapay', 'FPX description', 'fpx.png', 1, 1],
        [1013, 'Hong Leong Bank Transfer', 'asiapay', 'Hong Leong Bank Transfer description', 'hong_leong.png', 1, 1],
        [1014, 'Maybank2U', 'asiapay', 'Maybank2U description', 'maybank2u.png', 1, 1],
        [1015, 'Meps Cash', 'asiapay', 'Meps Cash description', 'meps_cash.png', 1, 1],
        [1016, 'Mobile Money', 'asiapay', 'Mobile Money description', 'mobile_money.png', 1, 1],
        [1017, 'RHB', 'asiapay', 'RHB description', 'rhb.png', 1, 1],
        [1018, 'Webcash', 'asiapay', 'Webcash description', 'web_cash.gif', 1, 0],
        [1019, 'Credit Cards Colombia', 'pagosonline', 'Credit Cards Colombia description', 'cards_colombia.gif', 1, 1],
        [1020, 'PSE', 'pagosonline', 'PSE description', 'pse.png', 1, 1],
        [1021, 'ACH Debit', 'pagosonline', 'ACH Debit description', 'ach.png', 1, 1],
        [1022, 'Via Baloto', 'pagosonline', 'Via Baloto description', 'payment_via_baloto.png', 1, 1],
        [1023, 'Referenced Payment', 'pagosonline', 'Referenced Payment description', 'payment_references.png', 1, 1],
        [1024, 'Mandiri', 'asiapay', 'Mandiri description', 'mandiri.png', 1, 1],
        [1025, 'XL Tunai', 'asiapay', 'XL Tunai description', 'xltunai.png', 1, 1],
        [1026, 'Bancomer Pago referenciado', 'dineromaildirect', 'Bancomer Pago referenciado description', 'bancomer.png', 1, 1],
        [1027, 'Santander Pago referenciado', 'dineromaildirect', 'Santander Pago referenciado description', 'santander.gif', 1, 1],
        [1028, 'ScotiaBank Pago referenciado', 'dineromaildirect', 'ScotiaBank Pago referenciado description', 'scotiabank.gif', 1, 1],
        [1029, '7-Eleven Pago en efectivo', 'dineromaildirect', '7-Eleven Pago en efectivo description', '7-Eleven.gif', 1, 1],
        [1030, 'Oxxo Pago en efectivo', 'dineromaildirect', 'Oxxo Pago en efectivo description', 'oxxo.gif', 1, 1],
        [1031, 'IXE Pago referenciado', 'dineromaildirect', 'IXE Pago referenciado description', 'IXe.gif', 1, 1],
        [1033, 'Cards Thailand', 'paysbuy', 'Cards Thailand description', 'cards_brl.gif', 1, 0],
        [1034, 'PayPal Thailand', 'paysbuy', 'PayPalThailand description', 'paypal.png', 1, 0],
        [1035, 'AMEXThailand', 'paysbuy', 'AMEXThailand description', 'american_express.png', 1, 0],
        [1036, 'Cash Options Thailand', 'paysbuy', 'Cash Options Thailand Description', 'counter-service-thailand_paysbuy-cash.png', 1, 1],
        [1037, 'Online Banking Thailand', 'paysbuy', 'OnlineBankingThailand description', 'online_banking_thailanda.png', 1, 1],
        [1038, 'PaysBuy Wallet', 'paysbuy', 'PaysBuy Wallet description', 'paysbuy.png', 1, 1],
        [1039, 'Pagos en efectivo Chile', 'dineromaildirect', 'Pagos en efectivo Chile description', 'pagos_en_efectivo_servipag_bci_chile.png', 1, 1],
        [1040, 'Pagos en efectivo Argentina', 'dineromaildirect', 'Pagos en efectivo Argentina description', 'argentina_banks.png', 1, 0],
        [1041, 'OP-Pohjola', 'paytrail', 'OP-Pohjola description', 'op-pohjola.png', 1, 1],
        [1042, 'Nordea', 'paytrail', 'Nordea description', 'nordea.png', 1, 1],
        [1043, 'Danske bank', 'paytrail', 'Danske description', 'danske_bank.png', 1, 1],
        [1044, 'Cash-in', 'yandexmoney', 'Cash-in description', 'cashinyandex.gif', 1, 1],
        [1045, 'Cards Russia', 'yandexmoney', 'Cards Russia description', 's2p_cards.gif', 1, 1],
        [1048, 'BankTransfer Japan', 'degica', 'BankTransfer Japan description', 'degica_bank_transfer.gif', 1, 1],
        [1046, 'Konbini', 'degica', 'Konbini description', 'degica_kombini.png', 1, 1],
        [1047, 'Cards Japan', 'cardsjapan', 'Cards Japan Description', 'degica_cards.gif', 1, 1],
        [1049, 'PayEasy Japan', 'payeasyjapan', 'PayEasy Japan Description', 'degica_payeasy.gif', 1, 1],
        [1050, 'WebMoney Japan', 'webmoneyjapan', 'WebMoney Japan Description', 'degica_webmoney.gif', 1, 1],
        [1051, 'Globe GCash', 'dragonpay', 'Globe GCash description', 'gcashlogo.jpg', 1, 1],
        [1052, 'Klarna Checkout', 'klarnacheckout', 'Klarna Checkout Description', 'klarna_checkout.gif', 1, 1],
        [1053, 'Credit Cards Indonesia', 'creditcardsindonesia', 'Credit Cards Indonesia Description', '1053_credit_cards.gif', 1, 1],
        [1054, 'BII VA', 'biiva', 'BII VA Description', '1054_BII-VA.gif', 1, 1],
        [1055, 'Kartuku', 'kartuku', 'Kartuku Description', '1055_Kartuku.gif', 1, 1],
        [1056, 'CIMB Clicks', 'cimbclicks', 'CIMBClicks Description', '1056_Cimb_Clicks.gif', 1, 1],
        [1057, 'Mandiri e-Cash', 'mandiriecass', 'Mandiri e-Cash Description', '1057_Mandiri_ecash.gif', 1, 1],
        [1058, 'IB Muamalat', 'ibmuamalat', 'IB Muamalat Description', '1058_IB_Muamalat.gif', 1, 1],
        [1059, 'T-Cash', 'tcash', 'T-Cash Description', '1059_T-cash.gif', 1, 1],
        [1060, 'Indosat Dompetku', 'indosatdompetku', 'Indosat Dompetku Description', '1060_Indosat_Dompetku.gif', 1, 1],
        [1061, 'Mandiri ATM Automatic', 'mandiriatmautomatic', 'Mandiri ATM Automatic Description', '1061_Mandiri_atm_automatic.gif', 1, 1],
        [1062, 'Pay4ME', 'pay4me', 'Pay4ME Description', '1062_pay4me.gif', 1, 1],
        [1063, 'Danamon Online Banking', 'danamononlinebanking', 'Danamon Online Banking Description', '1063_Danamon.gif', 1, 1 ],

        ];

        $installer->getConnection()->insertArray( $installer->getTable( 's2p_gp_methods' ),
                                                  ['method_id','display_name','provider_value','description','logo_url','guaranteed','active'],
                                                  $insert_data );

        $insert_data = [

        [1, 'AD', 'Andorra'],
        [2, 'AE', 'United Arab Emirates'],
        [3, 'AF', 'Afghanistan'],
        [4, 'AG', 'Antigua and Barbuda'],
        [5, 'AI', 'Anguilla'],
        [6, 'AL', 'Albania'],
        [7, 'AM', 'Armenia'],
        [8, 'AN', 'Netherlands Antilles'],
        [9, 'AO', 'Angola'],
        [10, 'AQ', 'Antarctica'],
        [11, 'AR', 'Argentina'],
        [12, 'AS', 'American Samoa'],
        [13, 'AT', 'Austria'],
        [14, 'AU', 'Australia'],
        [15, 'AW', 'Aruba'],
        [16, 'AZ', 'Azerbaijan'],
        [17, 'BA', 'Bosnia & Herzegowina'],
        [18, 'BB', 'Barbados'],
        [19, 'BD', 'Bangladesh'],
        [20, 'BE', 'Belgium'],
        [21, 'BF', 'Burkina Faso'],
        [22, 'BG', 'Bulgaria'],
        [23, 'BH', 'Bahrain'],
        [24, 'BI', 'Burundi'],
        [25, 'BJ', 'Benin'],
        [26, 'BM', 'Bermuda'],
        [27, 'BN', 'Brunei Darussalam'],
        [28, 'BO', 'Bolivia'],
        [29, 'BR', 'Brazil'],
        [30, 'BS', 'Bahamas'],
        [31, 'BT', 'Bhutan'],
        [32, 'BV', 'Bouvet Island'],
        [33, 'BW', 'Botswana'],
        [34, 'BY', 'Belarus (formerly known as Byelorussia)'],
        [35, 'BZ', 'Belize'],
        [36, 'CA', 'Canada'],
        [37, 'CC', 'Cocos (Keeling) Islands'],
        [38, 'CD', 'Congo, Democratic Republic of the (formerly Zalre)'],
        [39, 'CF', 'Central African Republic'],
        [40, 'CG', 'Congo'],
        [41, 'CH', 'Switzerland'],
        [42, 'CI', 'Ivory Coast (Cote d\'Ivoire)'],
        [43, 'CK', 'Cook Islands'],
        [44, 'CL', 'Chile'],
        [45, 'CM', 'Cameroon'],
        [46, 'CN', 'China'],
        [47, 'CO', 'Colombia'],
        [48, 'CR', 'Costa Rica'],
        [50, 'CU', 'Cuba'],
        [51, 'CV', 'Cape Verde'],
        [52, 'CX', 'Christmas Island'],
        [53, 'CY', 'Cyprus'],
        [54, 'CZ', 'Czech Republic'],
        [55, 'DE', 'Germany'],
        [56, 'DJ', 'Djibouti'],
        [57, 'DK', 'Denmark'],
        [58, 'DM', 'Dominica'],
        [59, 'DO', 'Dominican Republic'],
        [60, 'DZ', 'Algeria'],
        [61, 'EC', 'Ecuador'],
        [62, 'EE', 'Estonia'],
        [63, 'EG', 'Egypt'],
        [64, 'EH', 'Western Sahara'],
        [65, 'ER', 'Eritrea'],
        [66, 'ES', 'Spain'],
        [67, 'ET', 'Ethiopia'],
        [68, 'FI', 'Finland'],
        [69, 'FJ', 'Fiji Islands'],
        [70, 'FK', 'Falkland Islands (Malvinas)'],
        [71, 'FM', 'Micronesia, Federated States of'],
        [72, 'FO', 'Faroe Islands'],
        [73, 'FR', 'France'],
        [74, 'FX', 'France, Metropolitan'],
        [75, 'GA', 'Gabon'],
        [76, 'GB', 'United Kingdom'],
        [77, 'GD', 'Grenada'],
        [78, 'GE', 'Georgia'],
        [79, 'GF', 'French Guiana'],
        [80, 'GH', 'Ghana'],
        [81, 'GI', 'Gibraltar'],
        [82, 'GL', 'Greenland'],
        [83, 'GM', 'Gambia'],
        [84, 'GN', 'Guinea'],
        [85, 'GP', 'Guadeloupe'],
        [86, 'GQ', 'Equatorial Guinea'],
        [87, 'GR', 'Greece'],
        [88, 'GS', 'South Georgia and the South Sandwich Islands'],
        [89, 'GT', 'Guatemala'],
        [90, 'GU', 'Guam'],
        [91, 'GW', 'Guinea-Bissau'],
        [92, 'GY', 'Guyana'],
        [93, 'HK', 'Hong Kong'],
        [94, 'HM', 'Heard and McDonald Islands'],
        [95, 'HN', 'Honduras'],
        [96, 'HR', 'Croatia (local name: Hrvatska)'],
        [97, 'HT', 'Haiti'],
        [98, 'HU', 'Hungary'],
        [99, 'ID', 'Indonesia'],
        [100, 'IE', 'Ireland'],
        [101, 'IL', 'Israel'],
        [102, 'IN', 'India'],
        [103, 'IO', 'British Indian Ocean Territory'],
        [104, 'IQ', 'Iraq'],
        [105, 'IR', 'Iran, Islamic Republic of'],
        [106, 'IS', 'Iceland'],
        [107, 'IT', 'Italy'],
        [108, 'JM', 'Jamaica'],
        [109, 'JO', 'Jordan'],
        [110, 'JP', 'Japan'],
        [111, 'KE', 'Kenya'],
        [112, 'KG', 'Kyrgyzstan'],
        [113, 'KH', 'Cambodia (formerly Kampuchea)'],
        [114, 'KI', 'Kiribati'],
        [115, 'KM', 'Comoros'],
        [116, 'KN', 'Saint Kitts (Christopher) and Nevis'],
        [117, 'KP', 'Korea, Democratic People\'s Republic of (North Korea)'],
        [118, 'KR', 'Korea, Republic of (South Korea)'],
        [119, 'KW', 'Kuwait'],
        [120, 'KY', 'Cayman Islands'],
        [121, 'KZ', 'Kazakhstan'],
        [122, 'LA', 'Lao People\'s Democratic Republic (formerly Laos)'],
        [123, 'LB', 'Lebanon'],
        [124, 'LC', 'Saint Lucia'],
        [125, 'LI', 'Liechtenstein'],
        [126, 'LK', 'Sri Lanka'],
        [127, 'LR', 'Liberia'],
        [128, 'LS', 'Lesotho'],
        [129, 'LT', 'Lithuania'],
        [130, 'LU', 'Luxembourg'],
        [131, 'LV', 'Latvia'],
        [132, 'LY', 'Libyan Arab Jamahiriya'],
        [133, 'MA', 'Morocco'],
        [134, 'MC', 'Monaco'],
        [135, 'MD', 'Moldova, Republic of'],
        [136, 'MG', 'Madagascar'],
        [137, 'MH', 'Marshall Islands'],
        [138, 'MK', 'Macedonia, the Former Yugoslav Republic of'],
        [139, 'ML', 'Mali'],
        [140, 'MM', 'Myanmar (formerly Burma)'],
        [141, 'MN', 'Mongolia'],
        [142, 'MO', 'Macao (also spelled Macau)'],
        [143, 'MP', 'Northern Mariana Islands'],
        [144, 'MQ', 'Martinique'],
        [145, 'MR', 'Mauritania'],
        [146, 'MS', 'Montserrat'],
        [147, 'MT', 'Malta'],
        [148, 'MU', 'Mauritius'],
        [149, 'MV', 'Maldives'],
        [150, 'MW', 'Malawi'],
        [151, 'MX', 'Mexico'],
        [152, 'MY', 'Malaysia'],
        [153, 'MZ', 'Mozambique'],
        [154, 'NA', 'Namibia'],
        [155, 'NC', 'New Caledonia'],
        [156, 'NE', 'Niger'],
        [157, 'NF', 'Norfolk Island'],
        [158, 'NG', 'Nigeria'],
        [159, 'NI', 'Nicaragua'],
        [160, 'NL', 'Netherlands'],
        [161, 'NO', 'Norway'],
        [162, 'NP', 'Nepal'],
        [163, 'NR', 'Nauru'],
        [164, 'NU', 'Niue'],
        [165, 'NZ', 'New Zealand'],
        [166, 'OM', 'Oman'],
        [167, 'PA', 'Panama'],
        [168, 'PE', 'Peru'],
        [169, 'PF', 'French Polynesia'],
        [170, 'PG', 'Papua New Guinea'],
        [171, 'PH', 'Philippines'],
        [172, 'PK', 'Pakistan'],
        [173, 'PL', 'Poland'],
        [174, 'PM', 'St Pierre and Miquelon'],
        [175, 'PN', 'Pitcairn Island'],
        [176, 'PR', 'Puerto Rico'],
        [177, 'PT', 'Portugal'],
        [178, 'PW', 'Palau'],
        [179, 'PY', 'Paraguay'],
        [180, 'QA', 'Qatar'],
        [181, 'RE', 'Réunion'],
        [182, 'RO', 'Romania'],
        [183, 'RU', 'Russian Federation'],
        [184, 'RW', 'Rwanda'],
        [185, 'SA', 'Saudi Arabia'],
        [186, 'SB', 'Solomon Islands'],
        [187, 'SC', 'Seychelles'],
        [188, 'SD', 'Sudan'],
        [189, 'SE', 'Sweden'],
        [190, 'SG', 'Singapore'],
        [191, 'SH', 'St Helena'],
        [192, 'SI', 'Slovenia'],
        [193, 'SJ', 'Svalbard and Jan Mayen Islands'],
        [194, 'SK', 'Slovakia'],
        [195, 'SL', 'Sierra Leone'],
        [196, 'SM', 'San Marino'],
        [197, 'SN', 'Senegal'],
        [198, 'SO', 'Somalia'],
        [199, 'SR', 'Suriname'],
        [200, 'ST', 'Sco Tom'],
        [201, 'SU', 'Union of Soviet Socialist Republics'],
        [202, 'SV', 'El Salvador'],
        [203, 'SY', 'Syrian Arab Republic'],
        [204, 'SZ', 'Swaziland'],
        [205, 'TC', 'Turks and Caicos Islands'],
        [206, 'TD', 'Chad'],
        [207, 'TF', 'French Southern and Antarctic Territories'],
        [208, 'TG', 'Togo'],
        [209, 'TH', 'Thailand'],
        [210, 'TJ', 'Tajikistan'],
        [211, 'TK', 'Tokelau'],
        [212, 'TM', 'Turkmenistan'],
        [213, 'TN', 'Tunisia'],
        [214, 'TO', 'Tonga'],
        [215, 'TP', 'East Timor'],
        [216, 'TR', 'Turkey'],
        [217, 'TT', 'Trinidad and Tobago'],
        [218, 'TV', 'Tuvalu'],
        [219, 'TW', 'Taiwan, Province of China'],
        [220, 'TZ', 'Tanzania, United Republic of'],
        [221, 'UA', 'Ukraine'],
        [222, 'UG', 'Uganda'],
        [223, 'UM', 'United States Minor Outlying Islands'],
        [224, 'US', 'United States of America'],
        [225, 'UY', 'Uruguay'],
        [226, 'UZ', 'Uzbekistan'],
        [227, 'VA', 'Holy See (Vatican City State)'],
        [228, 'VC', 'Saint Vincent and the Grenadines'],
        [229, 'VE', 'Venezuela'],
        [230, 'VG', 'Virgin Islands (British)'],
        [231, 'VI', 'Virgin Islands (US)'],
        [232, 'VN', 'Viet Nam'],
        [233, 'VU', 'Vanautu'],
        [234, 'WF', 'Wallis and Futuna Islands'],
        [235, 'WS', 'Samoa'],
        [236, 'XO', 'West Africa'],
        [237, 'YE', 'Yemen'],
        [238, 'YT', 'Mayotte'],
        [239, 'ZA', 'South Africa'],
        [240, 'ZM', 'Zambia'],
        [241, 'ZW', 'Zimbabwe'],
        [242, 'PS', 'Palestinian Territory'],
        [243, 'RS', 'Serbia'],
        [244, 'ME', 'Montenegro'],

        ];

        $installer->getConnection()->insertArray( $installer->getTable( 's2p_gp_countries' ),
                                                  ['country_id','code','name'],
                                                  $insert_data );


        $insert_data = [

        [1,76,99],
        [2,13,1],
        [2,14,2],
        [2,76,99],
        [2,81,99],
        [3,76,99],
        [4,76,99],
        [5,76,99],
        [6,76,99],
        [7,76,99],
        [7,22,99],
        [7,74,99],
        [7,81,99],
        [7,1003,99],
        [8,76,99],
        [9,76,99],
        [10,76,99],
        [11,76,99],
        [11,40,99],
        [11,69,99],
        [12,76,99],
        [13,5,1],
        [13,40,2],
        [13,9,3],
        [13,28,4],
        [13,1,5],
        [13,23,6],
        [13,69,7],
        [13,76,99],
        [13,75,99],
        [13,78,99],
        [13,1052,99],
        [14,18,1],
        [14,28,2],
        [14,69,3],
        [14,76,99],
        [14,40,99],
        [14,78,99],
        [15,76,99],
        [16,76,99],
        [16,74,99],
        [16,81,99],
        [16,1003,99],
        [17,69,2],
        [17,76,99],
        [17,78,99],
        [18,76,99],
        [19,76,99],
        [20,3,1],
        [20,40,2],
        [20,1,3],
        [20,9,4],
        [20,28,5],
        [20,69,6],
        [20,76,99],
        [20,73,99],
        [20,78,99],
        [21,76,99],
        [22,1,1],
        [22,63,2],
        [22,69,3],
        [22,76,99],
        [22,40,99],
        [22,78,99],
        [22,81,99],
        [23,13,1],
        [23,14,2],
        [23,76,99],
        [24,76,99],
        [25,76,99],
        [26,76,99],
        [27,76,99],
        [28,76,99],
        [29,46,1],
        [29,32,2],
        [29,34,2],
        [29,1000,3],
        [29,1002,4],
        [29,28,6],
        [29,19,8],
        [29,76,99],
        [30,76,99],
        [31,76,99],
        [32,76,99],
        [33,76,99],
        [34,76,99],
        [34,74,1],
        [34,22,2],
        [34,1003,3],
        [34,23,5],
        [34,81,99],
        [35,76,99],
        [36,8,1],
        [36,71,2],
        [36,28,3],
        [36,69,4],
        [36,76,99],
        [36,40,99],
        [36,78,99],
        [37,76,99],
        [38,76,99],
        [39,76,99],
        [40,76,99],
        [41,1,1],
        [41,40,2],
        [41,9,3],
        [41,69,4],
        [41,76,99],
        [41,78,99],
        [42,76,99],
        [43,76,99],
        [44,19,1],
        [44,76,99],
        [44,46,99],
        [44,1039,99],
        [45,76,99],
        [46,24,1],
        [46,62,2],
        [46,28,3],
        [46,76,99],
        [46,81,99],
        [47,1019,2],
        [47,1020,3],
        [47,1021,4],
        [47,1022,5],
        [47,1023,6],
        [47,76,99],
        [47,46,99],
        [48,76,99],
        [50,76,99],
        [51,76,99],
        [52,76,99],
        [53,40,1],
        [53,28,2],
        [53,69,3],
        [53,13,4],
        [53,14,5],
        [53,76,99],
        [53,78,99],
        [54,27,1],
        [54,63,2],
        [54,1,3],
        [54,40,4],
        [54,28,5],
        [54,69,7],
        [54,76,99],
        [54,78,99],
        [54,81,99],
        [55,4,1],
        [55,9,2],
        [55,40,3],
        [55,28,4],
        [55,23,5],
        [55,1,6],
        [55,14,6],
        [55,76,99],
        [55,69,7],
        [55,75,99],
        [55,78,99],
        [55,79,99],
        [55,1052,99],
        [56,76,99],
        [57,29,1],
        [57,1,2],
        [57,40,3],
        [57,28,4],
        [57,69,5],
        [57,76,99],
        [57,75,99],
        [57,78,99],
        [57,1052,99],
        [58,76,99],
        [59,76,99],
        [60,14,1],
        [60,76,99],
        [61,76,99],
        [62,23,1],
        [62,29,2],
        [62,63,3],
        [62,28,4],
        [62,1,5],
        [62,69,6],
        [62,76,99],
        [62,78,99],
        [62,1003,99],
        [62,81,99],
        [63,13,1],
        [63,14,2],
        [63,76,99],
        [64,76,99],
        [65,76,99],
        [66,29,1],
        [66,1,2],
        [66,28,3],
        [66,40,3],
        [66,14,4],
        [66,9,5],
        [66,69,7],
        [66,76,99],
        [66,78,99],
        [67,76,99],
        [68,65,1],
        [68,40,2],
        [68,69,3],
        [68,29,4],
        [68,28,5],
        [68,1,6],
        [68,1041,7],
        [68,1042,8],
        [68,1043,9],
        [68,76,99],
        [68,75,99],
        [68,78,99],
        [68,1052,99],
        [69,76,99],
        [70,76,99],
        [71,76,99],
        [72,76,99],
        [73,1,1],
        [73,40,2],
        [73,14,3],
        [73,28,4],
        [73,73,5],
        [73,9,6],
        [73,69,7],
        [73,76,99],
        [73,78,99],
        [74,76,99],
        [75,76,99],
        [76,9,1],
        [76,1,2],
        [76,40,3],
        [76,28,4],
        [76,23,5],
        [76,14,6],
        [76,69,8],
        [76,76,99],
        [76,78,99],
        [76,1003,99],
        [77,76,99],
        [78,76,99],
        [78,74,99],
        [78,1003,99],
        [79,76,99],
        [80,14,1],
        [80,76,99],
        [81,76,99],
        [82,76,99],
        [83,76,99],
        [84,76,99],
        [85,76,99],
        [86,76,99],
        [87,40,1],
        [87,28,2],
        [87,69,3],
        [87,76,99],
        [87,78,99],
        [88,76,99],
        [89,76,99],
        [90,76,99],
        [91,76,99],
        [92,76,99],
        [93,76,99],
        [94,76,99],
        [95,76,99],
        [96,63,1],
        [96,69,2],
        [96,76,99],
        [96,40,99],
        [96,78,99],
        [97,76,99],
        [98,25,1],
        [98,28,2],
        [98,63,3],
        [98,1,4],
        [98,9,4],
        [98,40,5],
        [98,69,6],
        [98,76,99],
        [98,78,99],
        [99,1024,1],
        [99,1025,2],
        [99,76,99],
        [99,1053,99],
        [99,1054,99],
        [99,1055,99],
        [99,1056,99],
        [99,1057,99],
        [99,1058,99],
        [99,1059,99],
        [99,1060,99],
        [99,1061,99],
        [99,1062,99],
        [99,1063,99],
        [100,40,1],
        [100,1,2],
        [100,28,2],
        [100,14,3],
        [100,69,4],
        [100,76,99],
        [100,78,99],
        [101,13,1],
        [101,14,2],
        [101,69,3],
        [101,76,99],
        [101,78,99],
        [101,1003,99],
        [101,81,99],
        [102,76,99],
        [102,1003,99],
        [103,76,99],
        [104,13,1],
        [104,14,2],
        [104,76,99],
        [105,76,99],
        [106,76,99],
        [107,40,1],
        [107,73,2],
        [107,1,3],
        [107,28,4],
        [107,9,5],
        [107,14,6],
        [107,69,8],
        [107,76,99],
        [107,78,99],
        [108,76,99],
        [109,13,1],
        [109,14,2],
        [109,76,99],
        [110,76,99],
        [110,1048,99],
        [110,1046,99],
        [110,1047,99],
        [110,1049,99],
        [110,1050,99],
        [110,1003,99],
        [111,76,99],
        [112,76,99],
        [112,22,99],
        [112,74,99],
        [112,81,99],
        [112,1003,99],
        [113,76,99],
        [114,76,99],
        [115,76,99],
        [116,76,99],
        [117,76,99],
        [118,76,99],
        [118,1003,99],
        [119,13,1],
        [119,14,2],
        [119,76,99],
        [120,76,99],
        [121,1003,1],
        [121,76,99],
        [121,22,99],
        [121,74,99],
        [121,81,99],
        [122,76,99],
        [123,13,1],
        [123,14,2],
        [123,76,99],
        [124,76,99],
        [125,76,99],
        [126,76,99],
        [127,76,99],
        [128,76,99],
        [129,23,1],
        [129,1,3],
        [129,69,4],
        [129,76,99],
        [129,40,99],
        [129,78,99],
        [129,1003,99],
        [129,81,99],
        [130,1,1],
        [130,40,2],
        [130,73,3],
        [130,69,4],
        [130,76,99],
        [130,78,99],
        [131,23,1],
        [131,63,2],
        [131,28,3],
        [131,40,5],
        [131,69,6],
        [131,76,99],
        [131,78,99],
        [131,81,99],
        [131,1003,99],
        [132,76,99],
        [133,76,99],
        [134,76,99],
        [135,76,99],
        [135,22,99],
        [135,74,99],
        [135,81,99],
        [135,1003,99],
        [136,76,99],
        [137,76,99],
        [138,76,99],
        [139,76,99],
        [140,76,99],
        [141,76,99],
        [142,76,99],
        [143,76,99],
        [144,76,99],
        [145,76,99],
        [146,76,99],
        [147,76,99],
        [147,40,99],
        [148,76,99],
        [149,76,99],
        [150,76,99],
        [151,49,1],
        [151,46,2],
        [151,19,3],
        [151,40,4],
        [151,1026,5],
        [151,1027,6],
        [151,1028,7],
        [151,1029,8],
        [151,1030,9],
        [151,28,10],
        [151,1031,10],
        [151,76,99],
        [152,1010,2],
        [152,1011,3],
        [152,1012,4],
        [152,1013,5],
        [152,1014,6],
        [152,1015,7],
        [152,1016,8],
        [152,1017,9],
        [152,76,99],
        [153,76,99],
        [154,76,99],
        [155,76,99],
        [156,76,99],
        [157,76,99],
        [158,14,1],
        [158,76,99],
        [158,77,99],
        [159,76,99],
        [160,2,1],
        [160,9,2],
        [160,40,3],
        [160,28,4],
        [160,1,5],
        [160,69,7],
        [160,76,99],
        [160,75,99],
        [160,78,99],
        [160,1052,99],
        [161,1,1],
        [161,40,3],
        [161,28,4],
        [161,69,5],
        [161,76,99],
        [161,75,99],
        [161,78,99],
        [161,1052,99],
        [162,76,99],
        [163,76,99],
        [164,76,99],
        [165,18,2],
        [165,28,2],
        [165,76,99],
        [165,40,99],
        [166,13,1],
        [166,14,2],
        [166,76,99],
        [167,76,99],
        [167,1003,99],
        [168,40,1],
        [168,76,99],
        [168,72,99],
        [169,76,99],
        [170,76,99],
        [171,44,1],
        [171,67,2],
        [171,76,99],
        [171,1051,99],
        [172,76,99],
        [173,12,1],
        [173,1,2],
        [173,40,3],
        [173,28,4],
        [173,14,8],
        [173,76,99],
        [174,76,99],
        [175,76,99],
        [176,76,99],
        [177,20,1],
        [177,40,2],
        [177,28,3],
        [177,14,4],
        [177,1,5],
        [177,69,6],
        [177,76,99],
        [177,78,99],
        [178,76,99],
        [179,76,99],
        [180,13,1],
        [180,14,2],
        [180,76,99],
        [181,76,99],
        [182,40,1],
        [182,1,2],
        [182,63,3],
        [182,28,4],
        [182,69,5],
        [182,76,99],
        [182,78,99],
        [182,79,99],
        [183,74,1],
        [183,1003,2],
        [183,22,3],
        [183,1044,5],
        [183,1045,6],
        [183,1004,7],
        [183,1005,8],
        [183,1006,9],
        [183,28,11],
        [183,76,99],
        [183,81,99],
        [184,76,99],
        [185,13,1],
        [185,14,2],
        [185,76,99],
        [186,76,99],
        [187,76,99],
        [188,14,1],
        [188,76,99],
        [189,29,1],
        [189,1,2],
        [189,40,3],
        [189,28,4],
        [189,69,5],
        [189,76,99],
        [189,75,99],
        [189,78,99],
        [189,1052,99],
        [190,37,1],
        [190,76,99],
        [191,76,99],
        [192,63,1],
        [192,40,2],
        [192,28,3],
        [192,14,4],
        [192,69,5],
        [192,76,99],
        [192,78,99],
        [193,76,99],
        [194,1,1],
        [194,63,2],
        [194,40,3],
        [194,69,6],
        [194,76,99],
        [194,78,99],
        [195,76,99],
        [196,76,99],
        [197,76,99],
        [198,76,99],
        [199,76,99],
        [200,76,99],
        [201,76,99],
        [202,76,99],
        [203,76,99],
        [204,76,99],
        [205,76,99],
        [206,76,99],
        [207,76,99],
        [208,76,99],
        [209,35,1],
        [209,1038,2],
        [209,1036,3],
        [209,1037,4],
        [209,76,99],
        [209,1003,99],
        [210,76,99],
        [210,22,99],
        [210,74,99],
        [210,81,99],
        [210,1003,99],
        [211,76,99],
        [212,76,99],
        [212,74,99],
        [212,81,99],
        [213,13,1],
        [213,14,2],
        [213,76,99],
        [214,76,99],
        [215,76,99],
        [216,1,1],
        [216,66,2],
        [216,64,3],
        [216,13,6],
        [216,14,7],
        [216,28,8],
        [216,69,9],
        [216,76,99],
        [216,78,99],
        [216,1003,99],
        [216,81,99],
        [217,76,99],
        [218,76,99],
        [219,76,99],
        [220,76,99],
        [221,74,1],
        [221,22,2],
        [221,1003,3],
        [221,28,6],
        [221,76,99],
        [221,81,99],
        [222,76,99],
        [223,76,99],
        [224,69,1],
        [224,58,2],
        [224,40,3],
        [224,76,99],
        [224,78,99],
        [224,1003,99],
        [225,76,99],
        [225,40,99],
        [226,76,99],
        [226,74,99],
        [226,1003,99],
        [226,81,99],
        [227,76,99],
        [228,76,99],
        [229,76,99],
        [230,76,99],
        [231,76,99],
        [232,76,99],
        [232,1003,99],
        [232,81,99],
        [233,76,99],
        [234,76,99],
        [235,76,99],
        [236,76,99],
        [237,76,99],
        [238,76,99],
        [239,28,1],
        [239,76,99],
        [240,76,99],
        [241,76,99],
        [242,13,1],
        [242,14,1],
        [242,76,99],
        [243,69,2],
        [243,76,99],
        [243,78,99],
        [244,69,2],
        [244,76,99],
        [244,78,99],

        ];

        $installer->getConnection()->insertArray( $installer->getTable( 's2p_gp_countries_methods' ),
                                                  ['country_id','method_id','priority'],
                                                  $insert_data );

        /**
         * Install order statuses from config
         */
        $data = [];
        $statuses = [
            Smart2Pay::STATUS_NEW => __('Smart2Pay New Order'),
            Smart2Pay::STATUS_SUCCESS => __('Smart2Pay Success'),
            Smart2Pay::STATUS_CANCELED => __('Smart2Pay Canceled'),
            Smart2Pay::STATUS_FAILED => __('Smart2Pay Failed'),
            Smart2Pay::STATUS_EXPIRED => __('Smart2Pay Expired'),
        ];

        foreach ($statuses as $code => $info) {
            $data[] = ['status' => $code, 'label' => $info];
        }

        $installer->getConnection()->insertArray(
            $installer->getTable('sales_order_status'),
            ['status', 'label'],
            $data
        );


        /**
         * Install order states from config
         */
        $data = [];
        $states = [
            'new' => [
                'statuses' => [ Smart2Pay::STATUS_NEW ],
            ],
            'processing' => [
                'statuses' => [ Smart2Pay::STATUS_SUCCESS ],
            ],
            'canceled' => [
                'statuses' => [ Smart2Pay::STATUS_CANCELED, Smart2Pay::STATUS_FAILED, Smart2Pay::STATUS_EXPIRED ],
            ],
        ];

        foreach ($states as $code => $info) {
            if (isset($info['statuses'])) {
                foreach ($info['statuses'] as $status) {
                    $data[] = [
                        'status' => $status,
                        'state' => $code,
                        'is_default' => 0,
                        'visible_on_front' => 1,
                    ];
                }
            }
        }
        $installer->getConnection()->insertArray(
            $installer->getTable('sales_order_status_state'),
            ['status', 'state', 'is_default', 'visible_on_front'],
            $data
        );

        $installer->endSetup();
    }
}
