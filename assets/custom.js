
$(function () {

    $('.contact-form').submit(function (e) {
        e.preventDefault();
        let fomData = $(this).serialize();
        if (fomData) {
            let url = BaseUrl + 'ControlUnit/postcontactDetails';
            $.post(url, fomData, function(data, success){
                // console.log(data);
                let res =JSON.parse(data);
                showAlert(res.message, res.type);
            });


        }
    });
});