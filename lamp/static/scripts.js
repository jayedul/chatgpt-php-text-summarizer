window.jQuery(document).ready(function($){
	
	const btn = $('#summerizer button');
	const content = $('#summerizer textarea');
	const notice = $('#summerizer #notice');
	const output = $('#summerizer #output');

	btn.click(function(){

		const value = (content.val() || '').trim();
		
		if ( value.length < 100 ) {
			notice.html('Too short to summarize!');
			return;
		}

		notice.html('Summarizing..');
		btn.prop('disabled', true);

		$.ajax({
			url: '/summarizer.php',
			type: 'POST',
			data: {text_content: value},
			success: function(resp) {
				output.html(resp.summary_html || 'Parsing');
				notice.empty();
			},
			error: function() {
				notice.html('Summarizing failed!');
			},
			complete: function() {
				btn.prop('disabled', false);
			}
		})
	});
});