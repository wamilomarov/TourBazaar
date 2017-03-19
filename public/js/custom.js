/**
 * Created by Shamil on 19.03.2017.
 */
function getCitiesList(country_id, city_id) {
    var country = document.getElementById(country_id).value;

        $.ajax({url: "http://localhost:8000/getCitiesList/" + country, success: function(result){
            console.log(result);
            $("#list_" + city_id +"").empty();
            $("#list_" + city_id +"").append(result);
        }});
}

function getCountriesList(id) {
    var input = document.getElementById(id).value;
    if (input.length > 1){

        $.ajax({url: "http://localhost:8000/getCountriesList/" + input, success: function(result){
            $("#list_" + id +"").empty();
            $("#list_" + id +"").append(result);
        }});
    }
}

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = document.getElementById('places'); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button CLASS

    var x = 1; //initial text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var newCity = document.createElement('tr');
           $(newCity).append('<td class="col-md-4">Places of visit</td>' +
               '<td class="col-md-8">' +
               '<input type="text" name="countries[]" placeholder="Countries" list="list_countries' + x + '" id="countries' + x + '" onkeyup="getCountriesList(\'countries' + x + '\')" class="form-control" style="display: inline; width: auto;">' +
                '<input type="text" name="cities[]" placeholder="Cities" list="list_cities' + x + '" id="cities' + x + '" onfocus="getCitiesList(\'countries' + x + '\', \'cities' + x + '\')" class="form-control" style="display: inline; width: auto;">' +
                '<button class="btn remove_field">Remove</button></td>');
             wrapper.parentNode.insertBefore(newCity, wrapper.nextSibling);

             $('body').append('<datalist id="list_countries' + x + '"></datalist>');
            $('body').append('<datalist id="list_cities' + x + '"></datalist>');

            // $(wrapper).append(
            //     "<input type=\"text\" name=\"countries[]\" placeholder=\"Countries\" list=\"countries\" id=\"countries" + x + "\" onkeyup=\"getCountries('countries" + x + "')\" class=\"form-control\" style=\"display: inline; width: auto;\">" +
            // "<input type=\"text\" name=\"cities[]\" placeholder=\"Cities\" list=\"cities\" id=\"cities\" onfocus=\"getCitiesList('countries" + x + "')\" onkeyup=\"getCities('cities" + x + "')\" class=\"form-control\" style=\"display: inline; width: auto;\">" +
            //     "<button class=\"btn add_field_button\">Add More Fields</button>"
            // ); //add input box
        }
        else {
            window.alert('Maximum number of places is reached');
        }
    });

    $('table').on('click', ".remove_field", function(e){ //user click on remove text

        e.preventDefault();
        $(this).parent().parent().remove();
        x--;

    })
});