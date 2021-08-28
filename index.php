<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br /><br />
<div class="container" style="width:600px;">
    <select name="city" id="city" class="form-control input-lg">
        <option value="">Select City</option>
    </select>
    <br />
    <select name="District" id="District" class="form-control input-lg">
        <option value="">Select District</option>
    </select>
    <br />
    <button name="Street" id="Street" class="form-control input-lg">Get StreetName
    </button>
    <lable>Street Name is:</lable>
</div>
</body>
</html>

<script>
    $(document).ready(function(){

        load_json_data('country');

        function load_json_data(District, City)
        {
            var html_code = '';
            $.getJSON('sample.json', function(data){

                html_code += '<option value="">Select '+City+'</option>';
                $.each(data, function(key, value){
                    if(City == 'country')
                    {
                        if(value.District == '0')
                        {
                            html_code += '<option value="'+value.City+'">'+value.City+'</option>';
                        }

                    }
                    else
                    {
                        if(value.District == District)
                        {
                            html_code += '<option value="'+value.City+'">'+value.City+'</option>';
                        }
                    }
                });
                $('#'+id).html(html_code);
            });

        }

        $(document).on('change', '#city', function(){
            var country_id = $(this).val();
            if(country_id != '')
            {
                load_json_data('District', country_id);
            }
            else
            {
                $('#state').html('<option value="">Select state</option>');
                $('#city').html('<option value="">Select city</option>');
            }
        });
        $(document).on('change', '#district', function(){
            var state_id = $(this).val();
            if(state_id != '')
            {
                load_json_data('City', state_id);
            }
            else
            { 
                $('#city').html('<option value="">Select city</option>');
            }
        });
		    $(document).on('change', '#street', function(){
            var city_id = $(this).val();
            if(city_id != '')
            {
                load_json_data('Street', city_id);
            }
            else
            {
                $('#district').html('<option value="">Select District</option>');
            }
        });
    });
</script>
