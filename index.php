<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<center>
<div class="container">
  <div>
    <select name="District" id="District" class="form-control input-lg">
      <option value="">Select District</option>
    </select>
    <br /><br />
    <select name="City" id="City" class="form-control input-lg">
      <option value="">Select City</option>
    </select>
    <br /><br />

<select name="Street" id="Street" class="form-control input-lg">
	<option value="">Select street</option>
</select>
  </div>
</div>

<script>

var Area = [];
var html_code = '';
$.getJSON('sample.json', function(data) {
  
   var html_code = '';
    Area = data;
  $.each(Area, function(key, val) {
	html_code +=
      '<option value="' + val.District + '">' + val.District + '</option>';
  });
$('#District').html(html_code);

});

function updateDropdown(District, City, Street) {
  let html_code;
  if (!City) {
    html_code = '<option value="">Select City</option>';
    $.each(Area, function (index, value) {
      if (value.District == District) {
        html_code +=
          '<option value="' + value.City + '">' + value.City + '</option>';
      }
    });

    $('#City').html(html_code);
    $('#Street').html('<option value="">Select movies</option>');
  } else {
    html_code = '<option value="">Select movies</option>';
    $.each(Area, function (index, value) {
      if (value.District == District) {
        html_code +=
          '<option value="' + value.Street + '">' + value.Street + '</option>';
      }
    });
    $('#Street').html(html_code);
  }
}

$('#District, #City, #Street').on('change', function () {
  if (this.id == 'District') {

    $('#City').prop('selectedIndex', 0);
    $('#Street').prop('selectedIndex', 0);
  } 
  
  if (this.id == 'Street') {
    var District = $('#District').val();
    var City = $('#City').val();
    updateDropdown(District, City, null);
  } else {
    var District = $('#District').val();
    var City = $('#City').val();
    var Street = $('#Street').val();
    updateDropdown(District, City, Street);
  }
});
</script>
    <script>
      function myFunction()
      {
          document.getElementById("street").innerHTML="";
      }
    </script>
