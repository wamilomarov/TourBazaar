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
               '<td class="col-md-8"><input type="text" name="countries[]" placeholder="Countries" list="countries" id="countries' + x + '" onkeyup="getCountries(\'countries' + x + '\')" class="form-control" style="display: inline; width: auto;">' +
                '<input type="text" name="cities[]" placeholder="Cities" list="cities" id="cities' + x + '" onfocus="getCitiesList(\'countries' + x + '\')" onkeyup="getCities(\'cities' + x + '\')" class="form-control" style="display: inline; width: auto;">' +
                '<a href="#" class="remove_field">Remove</a></td>');
             wrapper.parentNode.insertBefore(newCity, wrapper.nextSibling);
             console.log(x);
            // $(wrapper).append(
            //     "<input type=\"text\" name=\"countries[]\" placeholder=\"Countries\" list=\"countries\" id=\"countries" + x + "\" onkeyup=\"getCountries('countries" + x + "')\" class=\"form-control\" style=\"display: inline; width: auto;\">" +
            // "<input type=\"text\" name=\"cities[]\" placeholder=\"Cities\" list=\"cities\" id=\"cities\" onfocus=\"getCitiesList('countries" + x + "')\" onkeyup=\"getCities('cities" + x + "')\" class=\"form-control\" style=\"display: inline; width: auto;\">" +
            //     "<button class=\"btn add_field_button\">Add More Fields</button>"
            // ); //add input box
        }
    });

    $('td').on('click', ".remove_field", function(e){ //user click on remove text

        e.preventDefault();
        console.log(x);
        $(this).parent().remove();
        x--;

    })
});