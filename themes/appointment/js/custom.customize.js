/* code from qodo.co.uk */ 
function toggleFormElements(bDisabled) { 
    var inputs = document.getElementsById("#customize-control-appointment_options-home_call_out_btn2_text"); 
    for (var i = 0; i < inputs.length; i++) { 
        inputs[i].disabled = bDisabled;
		
    }
	alert("Hello! I am an alert box!!");
}