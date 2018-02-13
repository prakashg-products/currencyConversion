$(function () {
    $("#convert").click(function () {
        let params = {};

        params.from_currency_id = $("#from_currency").val();
        if (empty(params.from_currency_id)) {
            $("#from_currency").focus();
            alert("Please choose the from currency.");
            return false;
        }

        params.to_currency_id = $("#to_currency").val();
        if (empty(params.to_currency_id)) {
            $("#to_currency").focus();
            alert("Please choose the to currency.");
            return false;
        }

        if (params.from_currency_id === params.to_currency_id) {
            alert("From and to currencies should be different");
            return false;
        }

        params.amount = $("#amount").val();
        if (empty(params.to_currency_id)) {
            $("#amount").focus();
            alert("Please Enter the amount");
            return false;
        }


        $.ajax({
            url: window.location.origin + "/api/convert",
            type: 'POST',
            headers: jsonHeader(),
            data: JSON.stringify(params),
            success: response => {
                $(".converted").html(response.data)
            },
            error: error => {
                console.log(error);
            }
        })
    })
});