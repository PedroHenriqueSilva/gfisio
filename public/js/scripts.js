console.log("Está funcionando");

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

  $(function() {
    $('a[data-toggle="tab"]').on('click', function(e) {
        window.localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = window.localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        window.localStorage.removeItem("activeTab");
    }
});

  $('#excluir_user_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#user_id').val(recipientId)
    })  

   
    function text(x){
      if(x == 0) document.getElementById("fever").style.display = "block";
      if(x == 1) document.getElementById("fever").style.display = "none";
      if(x == 2) document.getElementById("fallen").style.display = "block";
      if(x == 3) document.getElementById("fallen").style.display = "none"; 
      if(x == 4) document.getElementById("dizziness").style.display = "block";
      if(x == 5) document.getElementById("dizziness").style.display = "none"; 
      if(x == 6) document.getElementById("dif_walking").style.display = "block";
      if(x == 7) document.getElementById("dif_walking").style.display = "none"; 
      if(x == 8) document.getElementById("notura_pain").style.display = "block";
      if(x == 9) document.getElementById("notura_pain").style.display = "none"; 
      if(x == 10) document.getElementById("stiffness").style.display = "block";
      if(x == 11) document.getElementById("stiffness").style.display = "none"; 
      if(x == 12) document.getElementById("weight_loss").style.display = "block";
      if(x == 13) document.getElementById("weight_loss").style.display = "none";  
      if(x == 14) document.getElementById("faint").style.display = "block";
      if(x == 15) document.getElementById("faint").style.display = "none";
      if(x == 16) document.getElementById("formication").style.display = "block";
      if(x == 17) document.getElementById("formication").style.display = "none";
      if(x == 18) document.getElementById("tiredness").style.display = "block";
      if(x == 19) document.getElementById("tiredness").style.display = "none";
      if(x == 20) document.getElementById("endless_pain").style.display = "block";
      if(x == 21) document.getElementById("endless_pain").style.display = "none";
      if(x == 22) document.getElementById("urinary_dysfunction").style.display = "block";
      if(x == 23) document.getElementById("urinary_dysfunction").style.display = "none";
      if(x == 24) document.getElementById("intestinal_dysfunction").style.display = "block";
      if(x == 25) document.getElementById("intestinal_dysfunction").style.display = "none";
      if(x == 26) document.getElementById("sexual_dysfunction").style.display = "block";
      if(x == 27) document.getElementById("sexual_dysfunction").style.display = "none";

      return;
    }

    function past(x){
      if(x == 0) document.getElementById("drink_descr").style.display = "block";
      if(x == 1) document.getElementById("drink_descr").style.display = "none";
      if(x == 2) document.getElementById("smoke_descr").style.display = "block";
      if(x == 3) document.getElementById("smoke_descr").style.display = "none";
      if(x == 4) document.getElementById("diabetes_descr").style.display = "block";
      if(x == 5) document.getElementById("diabetes_descr").style.display = "none";
      if(x == 6) document.getElementById("has_descr").style.display = "block";
      if(x == 7) document.getElementById("has_descr").style.display = "none";
      if(x == 8) document.getElementById("cholesterol_descr").style.display = "block";
      if(x == 9) document.getElementById("cholesterol_descr").style.display = "none";

      if(x == 10) document.getElementById("heart_descr").style.display = "block";
      if(x == 11) document.getElementById("heart_descr").style.display = "none";
      if(x == 12) document.getElementById("pulmonary_descr").style.display = "block";
      if(x == 13) document.getElementById("pulmonary_descr").style.display = "none";
      if(x == 14) document.getElementById("renal_descr").style.display = "block";
      if(x == 15) document.getElementById("renal_descr").style.display = "none";
      if(x == 16) document.getElementById("gastrointestinal_descr").style.display = "block";
      if(x == 17) document.getElementById("gastrointestinal_descr").style.display = "none";
      if(x == 18) document.getElementById("neurological_descr").style.display = "block";
      if(x == 19) document.getElementById("neurological_descr").style.display = "none";

      if(x == 20) document.getElementById("psychological_descr").style.display = "block";
      if(x == 21) document.getElementById("psychological_descr").style.display = "none";
      if(x == 22) document.getElementById("rheumatological_descr").style.display = "block";
      if(x == 23) document.getElementById("rheumatological_descr").style.display = "none";
      if(x == 24) document.getElementById("vascular_descr").style.display = "block";
      if(x == 25) document.getElementById("vascular_descr").style.display = "none";

      if(x == 26) document.getElementById("mammary_descr").style.display = "block";
      if(x == 27) document.getElementById("mammary_descr").style.display = "none";
      if(x == 28) document.getElementById("uterus_descr").style.display = "block";
      if(x == 29) document.getElementById("uterus_descr").style.display = "none";
      if(x == 30) document.getElementById("scrotum_descr").style.display = "block";
      if(x == 31) document.getElementById("scrotum_descr").style.display = "none";

      if(x == 32) document.getElementById("thyroid_descr").style.display = "block";
      if(x == 33) document.getElementById("thyroid_descr").style.display = "none";
      if(x == 34) document.getElementById("covid19_descr").style.display = "block";
      if(x == 35) document.getElementById("covid19_descr").style.display = "none";
      if(x == 36) document.getElementById("fracture_descr").style.display = "block";
      if(x == 37) document.getElementById("fracture_descr").style.display = "none";
      if(x == 38) document.getElementById("hist_ca_descr").style.display = "block";
      if(x == 39) document.getElementById("hist_ca_descr").style.display = "none";
      if(x == 40) document.getElementById("hist_family_ca_descr").style.display = "block";
      if(x == 41) document.getElementById("hist_family_ca_descr").style.display = "none";
      if(x == 42) document.getElementById("hist_surgeries_descr").style.display = "block";
      if(x == 43) document.getElementById("hist_surgeries_descr").style.display = "none";
      
      return;
    }  

    
      
        
          
    
        
        
