$(document).ready(function(){
  demoUpload();
  demoUpload2();
})

function demoUpload() {
	var $uploadCrop;

	function readFile(input) {
			if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
				$('.upload-demo-wrap').addClass('ready');
            	$uploadCrop.croppie('bind', {
            		url: e.target.result
            	}).then(function(){
            		console.log('jQuery bind complete');
            	});

            }

            reader.readAsDataURL(input.files[0]);
        }
        else {
	        alert("Sorry - you're browser doesn't support the FileReader API");
	    }
	}

	$uploadCrop = $('#upload-demo').croppie({
		viewport: {
			width: 160,
			height: 160,
			type: 'circle'
		},
		enableExif: true
	});

	$('#upload').on('change', function () { readFile(this); });
	$('.upload-result').on('click', function (ev) {
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {

			// popupResult({
			// 	src: resp
			// });
      //console.log(resp);

      $.ajax({
        type: 'POST',
        url: '/site/update-photo',
        data: {
          photo: resp
        },
        success: function(data){
          if(data == 'success') {
            location.href='/';
          }
          else {
            alert("Произошла ошибка при сохранении фотографии. Попробуйте снова.");
            location.href='/';
          }
        }
      });

      //location.href='/site/update-photo/?data=' + resp;

		});
	});
}


function demoUpload2() {
  var $uploadCrop;

  function readFile(input) {
      if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
        $('.upload-demo-wrapbg').addClass('ready');
              $uploadCrop.croppie('bind', {
                url: e.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });

            }

            reader.readAsDataURL(input.files[0]);
        }
        else {
          alert("Sorry - you're browser doesn't support the FileReader API");
      }
  }

  $uploadCrop = $('#upload-demobg').croppie({
    viewport: {
      width: 1400,
      height: 400,
      type: 'square'
    },
    enableExif: true
  });

  $('#uploadbg').on('change', function () { readFile(this); });
  $('.upload-resultbg').on('click', function (ev) {
    $uploadCrop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (resp) {

      // popupResult({
      //  src: resp
      // });
      //console.log(resp);

      $.ajax({
        type: 'POST',
        url: '/site/update-photobg',
        data: {
          photo: resp
        },
        success: function(data){
          if(data == 'success') {
            location.href='/';
          }
          else {
            alert("Произошла ошибка при сохранении фотографии. Попробуйте снова.");
            location.href='/';
          }
        }
      });

      //location.href='/site/update-photo/?data=' + resp;

    });
  });
}
