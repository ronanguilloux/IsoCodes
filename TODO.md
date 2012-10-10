TODO
----

* Add ZipCode (fre-FR) : /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/
* Various iso codes listed in http://www.credit-card.be/BankAccount/ValidationRules.htm
* Add EAN 13 Code Bar
* Add EU VAT, UK PostCode, UK Tax Code (http://www.braemoor.co.uk/software/vat.shtml)
* Add IP Address (http://www.breakingpar.com/bkp/home.nsf/0/87256B280015193F87256C87006CC664)
* IBAN Regex : [a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}
* BIC Regex : ([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)
* Canadian postcode : ^[ABCEGHJ-NPRSTVXY]{1}[0-9]{1}[ABCEGHJ-NPRSTV-Z]{1}[ ]?[0-9]{1}[ABCEGHJ-NPRSTV-Z]{1}[0-9]{1}$
* US zip code : ^[0-9]{5}(-[0-9]{4})?$
* US phone number : /^(\+\d)*\s*(\(\d{3}\)\s*)*\d{3}(-{0,1}|\s{0,1})\d{2}(-{0,1}|\s{0,1})\d{2}$/
