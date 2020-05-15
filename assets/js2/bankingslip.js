"use strict";
// Class definition

var UploadSlip = function () {
    // Private functions
    var doupload = function () {
		
		var param = "?form_orderid="+$("#form_orderid").val()+"&form_email="+$("#form_email").val()+"&token="+$("#token").val()
		
       var url = window.location.origin+'/MAEM/CustomerForm/doupload'+param;

        // file type validation
     var action=   $('#kt_dropzone_3').dropzone({
            url:  url, // Set the url for your upload script location
            paramName: "slip", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 2, // MB
            //addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.psd",
            accept: function(file, done) {
		
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
			
        success: function(file,response) {
 		console.log(response);
if(response.sts==1)
{
 swal.fire({

                    "title": "",
                    "text": "Successfully Upload Banking Slip!",
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary",
					 "onClose": function(e) {
                        window.location.href = window.location.origin;
                    }
                });
				
}
if(response.sts==2)
{
this.removeFile(file)

          swal.fire({

                    "title": "",
                    "text": response.msg,
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });	
	

}	

if(response.sts==0)
{
this.removeFile(file)

          swal.fire({

                    "title": "",
                    "text": response.msg,
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });	
	

}	



}
		
		});
    

	
	
	}

   
   

    return {
        // public functions
        init: function() {
            doupload();
          
        }
    };
}();

KTUtil.ready(function() {
    UploadSlip.init();
});
