$(document).ready(function() {

// Remark Modal and store ajax
  $('#remarksmodal').on("show.bs.modal", function (e) {
        var button = $(e.relatedTarget);
        var name = button.data('name');
        var id = button.data('id');
        var remarks = button.data('remarks');
        var modal = $(this);
        var url = button.data('url');
        modal.find('.modal-title').text('Remarks : ' + name)
        modal.find('.modal-body textarea').val(remarks)

     $('#remark').click(function(){
         var call_remarks = $('textarea').val();
         $.ajax({
           type : 'post',
           data : { 'call_remarks' : call_remarks },
           url : url,
           success: function(result) {
             $('#remarksmodal').modal('hide');
             window.location.reload();
            }
           });
       });
      });


// get district via ajax
    $('#district').change(function() {
        var url = $(this).data('url');
        var redirecturl = $(this).data('redirecturl');
        var district = $(this).val();
        $.get(url + '/' + district, function(data) {
            window.location.href= redirecturl;
        });
    });

    //
    // $(".expanded-sidebar").click(function(e) {
    //       $('section').remove();
    // });


    $('#camps').click(function(){
      var venue = $('#venue').data('venue');
      var doctor = $('#doctor').data('doctor');
      var food = $('#food').data('food');
      var travel = $('#travel').data('travel');
      var accomodation = $('#accomodation').data('accomodation');
      var camp_patient = $('#camp-patient').data('patient');
      var data_camp_url = $('#camp-url').data('campurl');

      if(venue == undefined) {
        $('#venue-error').html('Please Select venue').css({'color' : '#dc3545','font-size': '13px', 'font-weight' : '600'});
      }

      else if(doctor == undefined) {
        $('#doctor-error').html('Please Select Doctor').css({'color' : '#dc3545','font-size': '13px', 'font-weight' : '600'});
      }

      else if (food == undefined) {
        $('#oraganizer-error').html(':Please Select Food Oraganizer').css({'color' : '#dc3545','font-size': '13px', 'font-weight' : '600'});
      }

      else if(travel == undefined) {
        $('#oraganizer-error').html(':Please Select Travel Oraganizer').css({'color' : '#dc3545','font-size': '13px', 'font-weight' : '600'});
      }

      else if(accomodation == undefined) {
        $('#oraganizer-error').html(':Please Select Accomodation Oraganizer').css({'color' : '#dc3545','font-size': '13px', 'font-weight' : '600'});
      }

      else if(camp_patient == 0) {
        $('#patient-error').html(':Please Select Camp patient').css({'color' : '#dc3545','font-size': '13px', 'font-weight' : '600'});
      }

      else {
        window.location.href = data_camp_url;
      }

    });

});
