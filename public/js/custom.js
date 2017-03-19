/**
 * Created by Shamil on 19.03.2017.
 */
function getCities() {
    var input = document.getElementById('countries').value;
        if (countries.length > 1){

            console.log(countries);
            $.ajax({url: "../getCities/" + input, success: function(result){
                $("#countries_list").html(result);
            }});
        }
}

function getCitiesList() {
    var countries = document.getElementById('countries').value;
    if (countries.length > 1){

        console.log(countries);
        // $.ajax({url: "/getCities/" + country, success: function(result){
        //     $("#div1").html(result);
        // }});
    }
}

function getCountries() {
    var countries = document.getElementById('countries').value;
    if (countries.length > 1){

        console.log(countries);
        // $.ajax({url: "/getCities/" + country, success: function(result){
        //     $("#div1").html(result);
        // }});
    }
}