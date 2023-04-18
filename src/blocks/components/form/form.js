import $ from 'jquery'

$('form').submit(function (e) {
	e.preventDefault()

	// if(!$(this).valid) {
	//     return;
	// }

	if (window.confirm('Завершаем, подтвердить отправку формы? ')) {
		$.ajax({
			type: 'POST',
			url: '../../mailer/smart.php',
			data: $(this).serialize(),
		}).done(function () {
			$(this).find('input').val('')

			$('form').trigger('reset')
		})
		alert('Спасибо! Квиз пройден')
		return false
	}
})
