function limpiar_div(div)
{
    $(`#${div}`).html("");
}

function currencyFormat(num) {
    return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

function validate_null(val) {
    return val == null ? 0 : val;
}

function cerrar_modal(modal)
{
    $(`#${modal}`).modal('toggle');
}

function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
}

function test()
{
    alert("test");
}

