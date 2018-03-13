var Login = function () {

	var handleLogin = function () {

		$('.login-form').validate({
			errorElement : 'span', //default input error message container
			errorClass : 'help-block', // default input error message class
			focusInvalid : false, // do not focus the last invalid input
			rules : {
				username : {
					required : true,
					maxlength : 15,
					minlength : 5
				},
				password : {
					required : true,
					maxlength : 25,
					minlength : 5
				},
				remember : {
					required : false
				}
			},

			messages : { // 重写验证提示信息
				username : {
					required : "请输入用户名",
					maxlength : "用户名的长度不能大于 {0} ",
					minlength : "用户名的长度不能小于 {0} "
				},
				password : {
					required : "请输入密码",
					maxlength : "密码的长度不能大于 {0}",
					minlength : "密码的长度不能小于 {0}"
				}
			},

			invalidHandler : function (event, validator) { //display error alert on form submit
				// console.log(validator);
				if ( validator.errorMap.password ) {
					$('#errorMessage').html(validator.errorMap.password)
				}
				if ( validator.errorMap.username ) {
					$('#errorMessage').html(validator.errorMap.username)
				}
				$('.alert-danger', $('.login-form')).show();
			},

			highlight : function (element) { // hightlight error inputs
				$(element)
					.closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			success : function (label) {
				label.closest('.form-group').removeClass('has-error');
				label.remove();
			},

			errorPlacement : function (error, element) {
				error.insertAfter(element.closest('.input-icon'));
			},

			submitHandler : function (form) {
				// form.submit(); // form validation success, call ajax form submit
				/**
				 * form.action 链接地址
				 * $('#' + form.id).serialize() 通过form id 获取form表单的数据
				 */
				$.post(form.action, $('#' + form.id).serialize(), function (result) {
					//layer 提示
					layer.open({
						content : result.message,
						btn : ['关闭'],
						yes : function (index, layero) {
							layer.close(index);
							if ( result.status == 200 ) {
								self.location = (result.url);
							}
						}
						, cancel : function () {
							//右上角关闭回调
						}
					});
				}, 'json');
			}
		});

		$('.login-form input').keypress(function (e) {
			if ( e.which == 13 ) {
				if ( $('.login-form').validate().form() ) {
					$('.login-form').submit(); //form validation success, call ajax form submit
				}
				return false;
			}
		});

		$('.forget-form input').keypress(function (e) {
			if ( e.which == 13 ) {
				if ( $('.forget-form').validate().form() ) {
					$('.forget-form').submit();
				}
				return false;
			}
		});

		$('#forget-password').click(function () {
			$('.login-form').hide();
			$('.forget-form').show();
		});

		$('#back-btn').click(function () {
			$('.login-form').show();
			$('.forget-form').hide();
		});
	}

	return {
		//main function to initiate the module
		init : function () {

			handleLogin();

			// init background slide images
			$('.login-bg').backstretch([
					"../public/image/login/bg1.jpg",
					"../public/image/login/bg2.jpg",
					"../public/image/login/bg3.jpg"
				], {
					fade : 1000,
					duration : 8000
				}
			);

			$('.forget-form').hide();

		}

	};

}();

jQuery(document).ready(function () {
	Login.init();
});