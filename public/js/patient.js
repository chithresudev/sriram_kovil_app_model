$(document).ready(function() {


  // Data Birth Calculation
    var date = $('#dob').val();
    if(date){
      function getAge(dateString)
      {
      var today = new Date();
      var birthDate = new Date(dateString);
      var age = today.getFullYear() - birthDate.getFullYear();
      var m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
      {
          age--;
      }
       $('#age').val(age);
    }
    var dob = date;
    console.log(getAge(dob));
    }


    $('#dob').change( function () {
        function getAge(dateString)
        {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
        {
            age--;
        }
         $('#age').val(age);
      }
      var dob = $(this).val();
      console.log(getAge(dob));
    });



// Disability No Input Mask

    $('#disability_no').inputmask("[A]{2}/[A]{3}/[9]{1,6}");

// Input function hide and show

 // Check box
    var check_box = $('#check_box');

    $('#check_box_show').hide();
    if (check_box.is(":checked")) {
      $('#check_box_show').show();
    }

     $('#check_box').click(function(){
       if ($(this).is(":checked")) {
         $('#check_box_show').show();
       }

       if (!$(this).is(":checked")) {
         $('#check_box_show').hide();
       }
     });

    // Patient Basic Info
    // Disability form

    $('#disability_no_status').hide();
    $('#disability_status').hide();

    var disability_available = $('#disability_available');
    var disability_applied = $('#disability_applied');
    var disability_call_back = $('#disability_call');

    if(disability_available.is(':checked')) {
      $('#disability_status').show();
      $('#disability_no_status').show();
    }

    if(disability_applied.is(":checked")){
      $('#disability_status').hide();
      $('#disability_no_status').hide();
    }

    if(disability_call_back.is(':checked')) {
      $('#disability_no_status').hide();
    }

    $('#disability_available:checked').click(function () {
        $('#disability_in_hand').attr('checked', false);
        $('#disability_status').show();
        $('#disability_call').attr('checked', false);
    });

    $('#disability_available').click(function () {
        $('#disability_status').show();
    });

    $('#disability_in_hand').click(function () {
      $('#disability_no_status').show();
    });

    $('#disability_call').click(function () {
      $('#disability_no_status').hide();
    });

    $('#disability_applied, #disability_notapplied').click(function () {
        $('#disability_no_status, #disability_status').hide();
    })
    ;

    // Aadhar form
    $('#aadhar_status').hide();
    $('#aadhar_no').hide();
    $('#reference_no').hide();

    var aadhar_available = $('#aadhar_available');
    var aadhar_applied = $('#aadhar_applied');
    var aadhar_call_back= $('#aadhar_call');

    if (aadhar_available.is(':checked')) {
      $('#aadhar_status').show();
      $('#aadhar_no').show();
    }

    if(aadhar_applied.is(':checked')) {
      $('#reference_no').show();
    }

    if (aadhar_call_back.is(':checked')) {
      $('#aadhar_no').hide();
    }

    // var aadhar = $('#aadhar_available:checkbox, #aadhar_in_hand:checkbox');
    // if(aadhar.is(':checked') === false){
    //   $('#aadhar_status').show();
    //   $('#aadhar_no').show();
    // }
    //
    // var reference = $('#aadhar_applied:checkbox');
    // if(reference.is(':checked') === false){
    //   $('#reference_no').hide();
    // }

    $('#aadhar_available').click(function () {
        $('#aadhar_status').show();
        $('#reference_no').hide();
    });

    $('#aadhar_in_hand').click(function () {
      $('#aadhar_no').show();
    });

    $('#aadhar_applied').click(function () {
      $('#reference_no').show();
      $('#aadhar_status, #aadhar_no').hide();
    });

    $('#aadhar_call').click(function () {
      $('#aadhar_no').hide();
    });

    $('#aadhar_notapplied').click(function () {
        $('#aadhar_status, #aadhar_no, #reference_no').hide();
    });

    // Patient Health Info
   // All Select option
    $('#patient_discon, #patient_education, #deceased_detail, #patient_job, #non_ambulant_yes').hide();
    var ambulation_status = $("#ambulation_status option:selected").val();
    var discontinued = $("#education option:selected").val();
    var occupation = $("#patient_occupation option:selected").val();
    var deceased = $("#deceased");
    var marital_status = $("#marital_status option:selected").val();

    if(ambulation_status == 3) {
      $('#non_ambulant_yes').show();
    }

    if(ambulation_status == 1 || ambulation_status == 2) {
      $('#non_ambulant_yes').hide();
    }

    if(discontinued == 'discontinued'){
      $('#patient_discon').show();
      $('#patient_education').hide();
    }

    if(discontinued == 'other') {
      $('#patient_discon').hide();
      $('#patient_education').show();
    }

    if(occupation == 'others') {
      $('#patient_job').show();
    }

    $('#gender').hide();
    if(marital_status == 'married' || marital_status == 'separated' || marital_status == 'multiple' ) {
      $('#gender').show();
    }


    if (deceased.is(":checked")) {
      $('#deceased_detail').show(200);
    }

    $('#ambulation_status').change(function() {
        var ambulation_status = $(this).val();

        if(ambulation_status == 3) {
          $('#non_ambulant_yes').show();
        }
        else {
          $('#non_ambulant_yes').hide();
          $('#non_ambulant_yes').removeClass('d-block');
        }
    });

    $('#education').change(function() {
        var education = $(this).val();
        if(education == 'discontinued') {
          $('#patient_discon').show();
          $('#patient_education').hide();
          $('#patient_education').removeClass('d-block');
        }
        else if(education == 'other') {
          $('#patient_discon').hide();
          $('#patient_education').show();
          $('#patient_discon').removeClass('d-block');
        }
        else {
          $('#patient_discon, #patient_education').hide();
          $('#patient_discon, #patient_education').removeClass('d-block');
        }
    });


    $('#patient_occupation').change(function() {
        var occupation = $(this).val();
        if(occupation == 'others') {
          $('#patient_job').show();
        }
        else {
            $('#patient_job').hide();
            $('#patient_job').removeClass('d-block');
        }
    });


    // Monthly income Calculation

    $('#month').on('keyup', function() {
      var month = $(this).val();
      $('#year').val(month * 12);
    });

    $('#year').on('keyup', function(){
      var year = $(this).val();
      $('#month').val(year / 12);
    });


    $('#deceased').click(function(){
      if ($(this).is(":checked")) {
        $('#deceased_detail').show(200);
      }
      else {
        $('#deceased_detail').hide();
          $('#deceased_detail').removeClass('d-block');
      }
    });
    $('#healthy, #not_healthy').click(function(){
      if ($(this).is(":checked")) {
        $('#deceased_detail').hide();
        $('#deceased_detail').removeClass('d-block');
      }

    });



    $('#marital_status').change(function(){
        var status = $(this).val();
        if(status == 'married' || status == 'separated' || status == 'multiple' ) {
          $('#gender').show();
        }
        else {
          $('#gender').hide();
          $('#gender').removeClass('d-block');
        }
    });


    // Sibling details
    $('#sibling_details_1, #sibling_details_2, #sibling_details_3, #sibling_details_4').hide();

    var sibling = $('#sibling_details_1, #sibling_details_2, #sibling_details_3, #sibling_details_4').val();

    $('#sibling_affected_male').on('keyup', function() {
      var field = $(this).val();
      if (!field.match(/^[\-\+]?[\d\,]*\.?[\d]*$/))
        {
          this.value = this.value.replace(/[^0-9\.]/g,'');
          $('#sibling_details_1').hide();
        }
        else if(field == ''){
            $('#sibling_details_1').hide();
        }

        else {
            $('#sibling_details_1').show();
        }
    });

    $('#sibling_expired_male').on('keyup', function() {
      var field = $(this).val();
      if (!field.match(/^[\-\+]?[\d\,]*\.?[\d]*$/))
        {
          this.value = this.value.replace(/[^0-9\.]/g,'');
          $('#sibling_details_2').hide();
        }
        else if(field == ''){
            $('#sibling_details_2').hide();
        }
        else {
            $('#sibling_details_2').show();
        }
    });

    $('#sibling_affected_female').on('keyup', function() {
      var field = $(this).val();
      if (!field.match(/^[\-\+]?[\d\,]*\.?[\d]*$/))
        {
          this.value = this.value.replace(/[^0-9\.]/g,'');
          $('#sibling_details_3').hide();
        }
        else if(field == ''){
            $('#sibling_details_3').hide();
        }
        else {
            $('#sibling_details_3').show();
        }
    });


    $('#sibling_expired_female').on('keyup', function() {
      var field = $(this).val();
      if (!field.match(/^[\-\+]?[\d\,]*\.?[\d]*$/))
        {
          this.value = this.value.replace(/[^0-9\.]/g,'');
          $('#sibling_details_4').hide();
        }
        else if(field == ''){
            $('#sibling_details_4').hide();
        }
        else {
            $('#sibling_details_4').show();
        }
    });

    if(sibling)
     {
          $('#sibling_details_1, #sibling_details_2, #sibling_details_3, #sibling_details_4').show();
    }

    // Parent info

    $('#edu_other, #job_other').hide();
    var education = $('#parent_education');
    var occupation = $('#parent_occupation');

    if(education.val() == 'other') {
      $('#edu_other').show();
    }
    if(occupation.val() == 'other') {
      $('#job_other').show();
    }

    education.change(function(){
      var education_val = $(this).val();
      if(education_val == 'other') {
      $('#edu_other').show();
     }
     else {
       $('#edu_other').hide();
       $('#edu_other').removeClass('d-block');
      }
    });

    occupation.change(function(){
       var occupation_val = $(this).val();
       if(occupation_val == 'other') {
       $('#job_other').show();
      }
    else {
      $('#job_other').hide();
      $('#job_other').removeClass('d-block');
     }
    });


    //  Medicalinvestigations

    // $('#questions_reason').hide();
    // $('#enquire_questions_7').click(function (){
    //     var checked = $('#questions_reason');
    //     alert(checked);
    //     if(checked.is(':checked')) {
    //         $('#questions_reason').show();
    //     }
    //     else {
    //         $('#questions_reason').hide();
    //     }
    //   });
      $('#select_camp, #no_attend_reason').hide();

      $('#flag_camp_status_1').click(function () {
          $('#select_camp').show();
      });
      $('#flag_camp_status_2').click(function () {
          $('#select_camp').hide();
      });

      $('#patient_attend_camp_2').click(function () {
          $('#no_attend_reason').show();
      });
      $('#patient_attend_camp_1').click(function () {
          $('#no_attend_reason').hide();
      });

    var select_camp = $('#flag_camp_status_1');

    if (select_camp.is(':checked')) {
        $('#select_camp').show();
    }
    else {
      $('#select_camp').hide();
    }

    var patient_attend_camp = $('#patient_attend_camp_2');

    if (patient_attend_camp.is(':checked')) {
        $('#no_attend_reason').show();
    }
    else {
      $('#no_attend_reason').hide();
    }

});
