<script type="text/javascript">
	$().ready(function () {
		$("#email").focusout(function(){
			mail = $(this).val();
			// console.log(mail);
			$.get("<?php echo base_url();?>/contacts/validate_email/"+mail, function(data){
				if (data==0) {
					$("#error_div").html("<div style='color:red;'><?=lang('label.contact_enter_valid_email')?> </div>");
					$("#btnSubmit").attr("disabled","true");
				} else {
					$("#error_div").html("");
					$("#btnSubmit").removeAttr("disabled");
				}
			});

			$("form").submit(function(event){
				event.preventDefault();
				//Values from the form received
				name 	= $("#name").val();
				email 	= $("#email").val();
				phone 	= $("#phone").val();
				subject = $("#subject").val();
				message = $("#message").val();
				//Setting the loader
				$("#loading").html("<div class='loader'></div>");
				//Posting the contact details provided
				var posting = $.post( "<?php echo base_url();?>contacts/submit",
								{
									cname	: name,
									cemail	: email,
									cphone	: phone,
									csubject: subject,
									cmessage: message 
								});
				posting.done(function( data ) {
					if (data==0) {
						// Error occured the email was not sent
						setTimeout(function(){
						  $("#loading").html("<div style='color:red;' style='height:36px;'><?=lang('label.contact_error_mail_not_sent')?> </div>");
						}, 2000);
						// console.log("Error occured, the email was not sent");
					} else {
						// Email sent very well
						setTimeout(function(){
						  $("#loading").html("<div style='color:green;' style='height:36px;'><?=lang('label.contact_mail_sent')?></div>");
						}, 2000);
						// console.log("Email sent successfully");
					}
				});
			});
		});
	});
</script>
