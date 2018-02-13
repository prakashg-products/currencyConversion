let list = [];
let cursor = null;

getList()
    .then(response => {
        list = response.data

        populateCurrencies();
    }).catch(err => {
        console.log(err)
    });

$(function () {
    $('#save').click(function () {
        saveCurrency()
            .then(response => {
                list.push(response.data);
                populateCurrencies();
            })
    })

    $("#reset").click(function () {
        resetList().then(response => {
            list = [];
            populateCurrencies();
        })
    })
});

function getList() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: window.location.origin + '/api/currencies',
            headers: jsonHeader(),
            success: response => {
                resolve(response)
            },
            error: error => {
                reject(error);
            }
        })
    })
}

function populateCurrencies() {
    let string = "";
    _.each(list, function(currency) {
        console.log(1);
        string += "<tr>";
        string += "<td>" + currency.from_currency.name + "</td>";
        string += "<td>" + currency.from_currency.code + "</td>";
        string += "<td>" + currency.to_currency.name + "</td>";
        string += "<td>" + currency.to_currency.code + "</td>";
        string += "<td>" + currency.amount + "</td>";
        string += "</tr>"
    });

    $("#tbody").html(string);
}

function saveCurrency(){
    let params = {};

    params.name = $("#currency_name").val().trim();
    if (empty(params.name)) {
        alert("Please enter a valid currency name");
        $("#currency_name").focus();
        return false;
    }

    params.code = $("#currency_code").val().trim()
    if (empty(params.code) && params.code.length !== 3) {
        alert("Please enter a valid currency Code");
        $("#currency_code").focus();
        return false;
    }

    params.wrtid = $("#wrt").val();
    if (empty(params.wrtid)) {
        alert("Please Select a valid WRT");
        $("#wrt").focus();
        return false;
    }

    params.amount = $("#amount").val();
    if (empty(params.wrtid)) {
        alert("Please enter a valid amount");
        $("#amount").focus();
        return false;
    }

    return new Promise((resolve, reject) => {
        $.ajax({
            url: window.location.origin + '/api/currencies',
            data: JSON.stringify(params),
            type: 'POST',
            headers: jsonHeader(),
            success: response => {
                resolve(response)
            },
            error: error => {
                reject(error);
            }
        })
    })
}

function resetList() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: window.location.origin + "/api/currencies/reset",
            type: 'DELETE',
            headers: jsonHeader(),
            success: resp => {
                resolve(resp);
            },
            error: err => {
                reject(err);
            }
        })
    })
}
