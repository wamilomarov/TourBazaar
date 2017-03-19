/**
 * Created by Shamil on 19.03.2017.
 */
function getCities() {
        if ($('#countries').val().length > 1){
            var country = $(this).val();
            console.log(country);
            // $.ajax({url: "/getCities/" + country, success: function(result){
            //     $("#div1").html(result);
            // }});
        }
}