jQuery(document).ready(function () {
    jQuery('select[name="ukuran"]').on('change', function () {
        var update_ukuran_ID = jQuery(this).val();
        if (update_ukuran_ID) {
            jQuery.ajax({
                url: '/stockkotak/change/' + update_ukuran_ID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="tinggi"]').empty();
                    jQuery('#update_jumlah').empty();
                    $('#update_stockkotak_form').attr('action', '');
                    $('select[name="tinggi"]').append('<option selected disabled>-----choose-----</option>');
                    jQuery.each(data, function (key, value) {
                        $('select[name="tinggi"]').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            });
        }
        else {
            $('select[name="tinggi"]').empty();
            jQuery('#update_jumlah').empty();
        }
    });




    jQuery('select[name="tinggi"]').on('change', function () {
        var update_tinggi_ID = jQuery(this).val();
        var update_ukuran_ID = jQuery('select[name="ukuran"]').val();
        console.log(update_ukuran_ID);


        if (update_tinggi_ID) {
            jQuery.ajax({
                url: '/stockkotak/change/' + update_ukuran_ID + '/' + update_tinggi_ID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('#update_jumlah').empty();
                    jQuery.each(data, function (key, value) {
                        $('#update_stockkotak_form').attr('action', '/stockkotak/' + key);
                        $('#update_jumlah').append(value);
                    });
                }
            });
        }
        else {
            jQuery('#update_jumlah').empty();
        }
    });
});















