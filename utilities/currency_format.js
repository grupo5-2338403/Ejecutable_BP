function currency_format(number){
    var currencyString = new Intl.NumberFormat(['ban', 'id']).format(number);
    return "$" + currencyString;
}