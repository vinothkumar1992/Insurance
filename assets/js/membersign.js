var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
  backgroundColor: 'rgba(255, 255, 255, 0)',
  penColor: 'rgb(0, 0, 0)'
});
var saveButton = document.getElementById('save');
var cancelButton = document.getElementById('clear');

saveButton.addEventListener('click', function (event) {
  var data = signaturePad.toDataURL('image/png');

// Send data to server instead...
  //window.open(data);

 $("#sign_imag").attr({ "src": data });
  $("#mem_sign").val(data);
});

cancelButton.addEventListener('click', function (event) {
  signaturePad.clear();
});



var signaturePad1 = new SignaturePad(document.getElementById('signature-pad1'), {
  backgroundColor: 'rgba(255, 255, 255, 0)',
  penColor: 'rgb(0, 0, 0)'
});
var saveButton1 = document.getElementById('save1');
var cancelButton1= document.getElementById('clear1');

saveButton1.addEventListener('click', function (event) {
  var data1 = signaturePad1.toDataURL('image/png');

// Send data to server instead...
  //window.open(data);

 $("#sign_imag1").attr({ "src": data1 });
  $("#mem_sign1").val(data1);
});

cancelButton1.addEventListener('click', function (event) {
  signaturePad1.clear();
});
