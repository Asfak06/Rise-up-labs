@extends('layout')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
<form id="form" class="form" action="{{ route('query') }}" method="POST" >
   @csrf
   <div class="form-group form-inline">
      <select id="field1" name="field1" class="form-control field_selection" required>
        <option selected value="">Choose field</option>
        <option value="first_name">First name</option>
        <option value="birth_day">Birth day</option>
        <option value="email">email</option>
      </select>
      <div></div>
      <div></div>
	  <span class="del btn btn-danger mx-1">X</span>
   </div>
 <div class="form-group form-inline">
  <select name="logic1" class="form-control logic" style="width:170px;" required>
    <option selected value="">Choose AND/OR</option>
    <option value="and">AND</option>
    <option value="or">OR</option>
  </select>
  <span class="del btn btn-danger mx-1">X</span>
 </div>
   <div class="form-group form-inline">
      <select id="field2" name="field2" class="form-control field_selection" required>
        <option selected value="">Choose field</option>
        <option value="first_name">First name</option>
        <option value="birth_day">Birth day</option>
        <option value="email">email</option>
      </select>
      <div></div>
      <div></div>
   	  <span class="del btn btn-danger mx-1">X</span>
   </div>
 <div class="form-group form-inline">
  <select name="logic2" class="form-control logic" style="width:170px;" required>
    <option selected value="">Choose AND/OR</option>
    <option value="and">AND</option>
    <option value="or">OR</option>
  </select>
  <span class="del btn btn-danger mx-1">X</span>
 </div>
	<div class="form-group form-inline">
	  <select id="field3" name="field3" class="form-control field_selection" required>
	    <option selected value="">Choose field</option>
	    <option value="first_name">First name</option>
	    <option value="birth_day">Birth day</option>
	    <option value="email">email</option>
	  </select>
	  <div></div>
	  <div></div>
	  <span class="del btn btn-danger mx-1">X</span>
	</div>
    <div class="d-block mt-3">
     <input type="submit" class="btn btn-success" value="submit">    	
    </div>
</form>


 

@endsection

   

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>

$(document).on("change", ".field_selection", function() {
    if ($(this).val() === 'first_name') {
       if($(this).attr('id')==='field1'){
         $(this).next().html('<select name="name_logic1" class="text_selection form-control mx-2" required><option selected value="">Choose logic</option><option value="contains">contains</option><option value="is">is</option> <option value="is_not">is_not</option> <option value="starts_with">starts_with</option> <option value="ends_with">ends_with</option> </select><input name="name1" type="text" class="form-control" placeholder="text input" required />');
       }else if ($(this).attr('id')==='field2') {
         $(this).next().html('<select name="name_logic2" class="text_selection form-control mx-2" required><option selected value="">Choose logic</option><option value="contains">contains</option><option value="is">is</option> <option value="is_not">is_not</option> <option value="starts_with">starts_with</option> <option value="ends_with">ends_with</option> </select><input name="name2" type="text" class="form-control" placeholder="text input" required />');         
       }else if ($(this).attr('id')==='field3') {
          $(this).next().html('<select name="name_logic3" class="text_selection form-control mx-2" required ><option selected value="">Choose logic</option><option value="contains">contains</option><option value="is">is</option> <option value="is_not">is_not</option> <option value="starts_with">starts_with</option> <option value="ends_with">ends_with</option> </select><input name="name3" type="text" class="form-control" placeholder="text input" required />');  
       }
       $(this).next().next().html('');
    }else if ($(this).val() === 'birth_day') {
      if($(this).attr('id')==='field1'){
       $(this).next().html('<select name="date_logic1" class="date_selection mx-2 form-control" required > <option selected value="">Choose logic</option> <option value="between">between</option> <option value="before">before</option> <option value="on">on</option> <option value="after">after</option> </select>');        
      }else if ($(this).attr('id')==='field2') {
      $(this).next().html('<select name="date_logic2" class="date_selection mx-2 form-control" required > <option selected value="">Choose logic</option> <option value="between">between</option> <option value="before">before</option> <option value="on">on</option> <option value="after">after</option> </select>');           
      }else if ($(this).attr('id')==='field3') {
      $(this).next().html('<select name="date_logic3" class="date_selection mx-2 form-control" required > <option selected value="">Choose logic</option> <option value="between">between</option> <option value="before">before</option> <option value="on">on</option> <option value="after">after</option> </select>');           
      }
    }else if ($(this).val() === 'email') {
      if($(this).attr('id')==='field1'){
      $(this).next().html('<select name="email_logic1" class="text_selection form-control mx-2" required ><option selected value="">Choose logic</option><option value="contains">contains</option><option value="is">is</option> <option value="is_not">is_not</option> <option value="starts_with">starts_with</option> <option value="ends_with">ends_with</option> </select><input name="email1" type="text" class="form-control" placeholder="email input" required />');         
      }else if ($(this).attr('id')==='field2') {
      $(this).next().html('<select name="email_logic2" class="text_selection form-control mx-2" required ><option selected value="">Choose logic</option><option value="contains">contains</option><option value="is">is</option> <option value="is_not">is_not</option> <option value="starts_with">starts_with</option> <option value="ends_with">ends_with</option> </select><input name="email2" type="text" class="form-control" placeholder="email input" required />'); 
      }else if ($(this).attr('id')==='field3') {
      $(this).next().html('<select name="email_logic3" class="text_selection form-control mx-2" required ><option selected value="">Choose logic</option><option value="contains">contains</option><option value="is">is</option> <option value="is_not">is_not</option> <option value="starts_with">starts_with</option> <option value="ends_with">ends_with</option> </select><input name="email3" type="text" class="form-control" placeholder="email input" required />'); 
      }      
    }

});
$(document).on("change", ".date_selection", function() {
  if ($(this).val() === 'between') {
      if($(this).attr('name') === 'date_logic1'){
       $(this).parent().next().html('<input name="date1" type="text" class="dates form-control" required />&<input name="end_date1" type="text" class="dates form-control" required />');         
      }else if ($(this).attr('name') === 'date_logic2') {
       $(this).parent().next().html('<input name="date2" type="text" class="dates form-control" required />&<input name="end_date2" type="text" class="dates form-control" required />');          
      }else if ($(this).attr('name') === 'date_logic3') {
       $(this).parent().next().html('<input name="date3" type="text" class="dates form-control" required />&<input name="end_date3" type="text" class="dates form-control" required />');          
      }

  }else {
    if($(this).attr('name') === 'date_logic1'){
      $(this).parent().next().html('<input name="date1" type="text" class="dates form-control" required />');      
    }else if ($(this).attr('name') === 'date_logic2') {
      $(this).parent().next().html('<input name="date2" type="text" class="dates form-control" required />');      
    }else if ($(this).attr('name') === 'date_logic3') {
      $(this).parent().next().html('<input name="date3" type="text" class="dates form-control" required />');      
    }

  }
	flatpickr('.dates', {
	  enableTime: true,
	  enableSeconds: true
	})

});

$(document).on("click",".del", function() {
  // $(this).parent().addClass('d-none');
  $(this).parent().remove();
});
  </script>
@endsection