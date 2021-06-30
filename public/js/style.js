jQuery(document).ready(function () {
    jQuery('select[name="ukuran"]').on('change', function () {
        var category_ID = jQuery(this).val();
        if (category_ID) {
            jQuery.ajax({
                url: '/stockkotak/change/' + category_ID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="tinggi"]').empty();
                    jQuery('#quantity').empty();
                    $('#quantity').append("...");
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
            jQuery('#quantity').empty();
            $('#quantity').append("...");
        }
    });




    jQuery('select[name="tinggi"]').on('change', function () {
        var height_ID = jQuery(this).val();
        var category_ID = jQuery('select[name="ukuran"]').val();
        console.log(category_ID);


        if (height_ID) {
            jQuery.ajax({
                url: '/stockkotak/change/' + category_ID + '/' + height_ID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('#quantity').empty();
                    $('#quantity').append("...");
                    jQuery.each(data, function (key, value) {
                        $('#update_stockkotak_form').attr('action', '/stockkotak/' + key);
                        console.log(value);
                        jQuery('#quantity').empty();
                        $('#quantity').append(value);
                    });
                }
            });
        }
        else {
            jQuery('#quantity').empty();
            $('#quantity').append("...");
        }
    });




    jQuery('.buttonupdate').on('click', function () {
        var kelas = jQuery(this).attr("class");
        kelas = kelas.replace('buttonupdate ', '');
        var kelas = kelas.split(" ");
        console.log(kelas[0]);
        var currentRow = $(this).closest("tr");


        jQuery.ajax({
            url: '/stockkotak/update/' + kelas[0] + '/' + kelas[1],
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                console.log(currentRow.find(".value").text());
                currentRow.find(".value").text(data);
                console.log(currentRow.find(".value").text());

                if(data == 0){
                    currentRow.find('.negative').prop('disabled', true);
                    currentRow.find('.negative').css("color", "gray");
                }

                if(data > 0){
                    currentRow.find('.negative').prop('disabled', false);
                    currentRow.find('.negative').css("color", "red");
                }


                // jQuery.each(data, function (key, value) {
                //     console.log(value);
                // });

            }
        }


        );

    });




});















